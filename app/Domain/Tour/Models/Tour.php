<?php

namespace App\Domain\Tour\Models;

use App\Domain\Accommodation\Models\Accommodation;
use App\Domain\Core\Models\Category;
use App\Domain\Core\Models\City;
use App\Domain\Coretour\Models\Airport;
use App\Domain\Coretour\Models\Faq;
use App\Domain\Itinerary\Models\Itinerary;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $guarded = [];
    private $price = 0;

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function CityFrom()
    {
        return $this->belongsTo(City::class, 'start_from_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function CityTo()
    {
        return $this->belongsTo(City::class, 'start_to_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function TourDays()
    {
        return $this->itinerary?->days()->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accommodations()
    {
        return $this->belongsToMany(Accommodation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faqs()
    {
        return $this->belongsToMany(Faq::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itinerary()
    {
        return $this->belongsTo(Itinerary::class);
    }

    public function scopeTopTours($q)
    {
        return $q->inRandomOrder()->limit(6);
    }


    /**
     * @param $numberTourists
     * @param $input
     * @return int[]|mixed|object
     */
    public function getTransportCars($numberTourists, $input = ['coach' => 0, 'coster' => 0, 'hiace' => 0, 'limousine' => 0])
    {
        if (is_array($input)) $input = (object)$input;
        if ($numberTourists >= 50) {
            $input->coach++;
            return $this->getTransportCars($numberTourists - 50, $input);

        }
        match (true) {
            ($numberTourists >= 21) => $input->coach++,
            ($numberTourists >= 10) => $input->coster++,
            ($numberTourists >= 3) => $input->hiace++,
            ($numberTourists >= 1) => $input->limousine++,
            default => 0,
        };
        return $input;
    }

    /**
     * @param $numberTourists
     * @param $input
     * @return int[]|mixed|object
     */
    public function getAccommodationType($numberTourists, $input = ['single' => 0, 'double' => 0, 'trible' => 0])
    {
        if (is_array($input)) $input = (object)$input;
        if ($numberTourists >= 3) {
            $input->trible++;
            return $this->getAccommodationType($numberTourists - 3, $input);

        }
        match (true) {
            ($numberTourists == 1) => $input->single++,
            ($numberTourists == 2) => $input->double++,
            ($numberTourists >= 3) => $input->trible++,
            default => 0,
        };
        return $input;
    }

    /**
     * @param $numberTourists
     * @return float|int
     */
    public function transportCalculate($numberTourists = 1)
    {
        if ($this->itinerary) {
            $transports = $this->itinerary?->days()->whereHas('steps')->get()->map(function ($item) use ($numberTourists) {
                return $item->steps()->get()->map(function ($step) use ($numberTourists) {
                    $transport = $step->step?->transport;

                    $carType = $this->getTransportCars($numberTourists);
                    $limousine_price = $transport?->limousine_price * $carType->limousine;
                    $hiace_price = $transport?->hiace_price * $carType->hiace;
                    $coaster_price = $transport?->coaster_price * $carType->coster;
                    $coach_price = $transport?->coach_price * $carType->coach;

                    return $limousine_price + $hiace_price + $coaster_price + $coach_price;
                });
            })->flatten()->values()->toArray();
            $this->price += array_sum($transports);
        }

        return $this;
    }

    public function accommodationsCalculate($numberTourists = 1,$view_id=null){

        $accommodations = $this->accommodations()->get()->map(function ($item) use($numberTourists,$view_id){

           return  $item->prices()->where('season','summer')->where('view_id',null)->when($view_id,function ($view,$view_id){
                $view->where('view_id',$view_id);
            })->get()->map(function ($item) use ($numberTourists){

                $accommodationType = $this->getAccommodationType($numberTourists);

                $singlePrice = $item->single * $accommodationType->single;
                $doublePrice = $item->double * $accommodationType->double;
                $triblePrice = $item->trible * $accommodationType->trible;

                return $singlePrice + $doublePrice + $triblePrice;
            });

        })->flatten()->values()->toArray();

        $this->price += array_sum($accommodations);
        return $this;
    }


    /**
     * @param $adultNumber
     * @param $childNumber
     * @param $infantNumber
     * @return $this
     */
    public function airportCalculate($adultNumber = 1, $childNumber = 0, $infantNumber = 0)
    {

        if ($this->itinerary) {
            $airports = $this->itinerary?->days()->where('airport_id','!=',null)->get()->map(function ($item) use (
                $adultNumber, $childNumber,
                $infantNumber
            ) {

                $airport = $item->airport;
                $adult_price = $airport?->adult_price * $adultNumber;
                $child_price = $airport?->child_price * $childNumber;
                $infant_price = $airport?->infant_price * $infantNumber;
                return $adult_price + $child_price + $infant_price;
            })->flatten()->values()->all();
            $this->price += array_sum($airports);
        }

        return $this;
    }

    /**
     * @param $numberTourists
     * @return float|int
     */
    public function permitsCalculate($numberTourists = 1)
    {
        if ($this->itinerary) {
            $transports = $this->itinerary?->days()->whereHas('steps')->get()->map(function ($item) use ($numberTourists) {
                return $item->steps()->get()->map(function ($step) use ($numberTourists) {
                    $permit = $step->step?->permit;

                    $carType = $this->getTransportCars($numberTourists);
                    $limousine_price = $permit?->limousine_price * $carType->limousine;
                    $hiace_price = $permit?->hiace_price * $carType->hiace;
                    $coaster_price = $permit?->coaster_price * $carType->coster;
                    $coach_price = $permit?->coach_price * $carType->coach;

                    return $limousine_price + $hiace_price + $coaster_price + $coach_price;
                });
            })->flatten()->values()->toArray();
            $this->price += array_sum($transports);
        }

        return $this;
    }



    public function mealsCalculate($adultNumber = 1, $childNumber = 0, $infantNumber = 0)
    {

        if ($this->itinerary) {
            $meals = $this->itinerary?->days()->whereHas('steps')->get()->map(function ($item) use (
                $adultNumber, $childNumber,
                $infantNumber
            ) {
                return $item->steps()->get()->map(function ($step) use (
                    $adultNumber, $childNumber, $infantNumber
                ) {
                    return $step->step?->includes()->whereHas('include', function ($inc) {
                        $inc->where('class', '!=', 'other');
                    })->get()->map(function ($item) use ($adultNumber, $childNumber, $infantNumber
                    ) {
                        if ($item->include?->type != 'free') {
                            if ($item->include?->type == 'per_pax') {
                                $meal = $item->include;
                                $adult_price = $meal?->adult_fee * $adultNumber;
                                $child_price = $meal?->child_fee * $childNumber;
                                $infant_price = $meal?->infant_fee * $infantNumber;
                                return $adult_price + $child_price + $infant_price;
                            } else {
                                return (float) $item->include?->fee;
                            }

                        }

                    });
                });
            })->flatten()->values()->all();
            $this->price += array_sum($meals);
        }

        return $this;
    }

    public function placesCalculate($adultNumber = 1, $childNumber = 0, $infantNumber = 0)
    {

        if ($this->itinerary) {
            $places = $this->itinerary?->days()->whereHas('steps')->get()->map(function ($item) use (
                $adultNumber,
                $childNumber, $infantNumber
            ) {
                return $item->steps()->get()->map(function ($step) use ($adultNumber, $childNumber, $infantNumber) {
                    return $step->step()->where('place_id', '!=', 'null')->get()->map(function ($item) use (
                        $adultNumber,
                        $childNumber, $infantNumber
                    ) {
                        $place = $item->place;
                        $adult_price = $place?->adult_fee * $adultNumber;
                        $child_price = $place?->child_fee * $childNumber;
                        $infant_price = $place?->infant_fee * $infantNumber;

                        return $adult_price + $child_price + $infant_price;
                    });
                });
            })->flatten()->values()->toArray();
            $this->price += array_sum($places);
        }

        return $this;
    }

    public function guideCalculate()
    {
        if ($this->itinerary) {
            $guideFees = $this->itinerary?->days()->where('has_guide', 1)->where('city_id', '!=', null)->get()->map(function ($item) {
                $guideFee = $item->city->GuideFee();
                if (isset($guideFee[app()->getLocale()])) {
                    return $guideFee[app()->getLocale()];
                }
            })->flatten()->values()->toArray();
            $this->price += array_sum($guideFees);
        }
        return $this;
    }

    public function attendantCalculate()
    {
        if ($this->itinerary) {
            $attendants = $this->itinerary?->days()->whereHas('steps')->get()->map(function ($item) {
                return $item->steps()->get()->map(function ($step) {
                    return $attendant = $step->step?->attendant?->fee;
                });
            })->flatten()->values()->toArray();
            $this->price += array_sum($attendants);
        }
        return $this;
    }
    /**
     * @param $tax
     * @return int
     */
    public function AddTax($tax = 0)
    {
        if($tax){
            $taxable = $this->price * $tax / 100;
        }
        $this->price += $taxable;
        return $this;
    }
    /**
     * @param $tax
     * @return int
     */
    public function getFinalPrice()
    {
        return $this->price;
    }
}
