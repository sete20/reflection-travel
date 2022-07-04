<?php

namespace App\Http\Controllers\FrontEnd\Tour;

use App\Domain\Tour\Models\Tour;
use App\Http\Controllers\Controller;
use Response;

class TourController extends Controller {
    /**
     * Display the specified Page.
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke() {

        $tours = Tour::cursor();

        return view('frontend.tour.index', compact('tours'));
    }

    public function show($id,$title){
        $tour = Tour::findOrFail($id);

        $places = $tour->itinerary?->days()->whereHas('steps')->get()->map(function ($item) {
            return $item->steps()->get()->map(function ($step)  {
                return $step->step()->where('place_id','!=','null')->get()->map(function($item){
                   return $item->place;
                });
            });
        })->flatten()->values()->all();

        $includes = $tour->itinerary?->days()->whereHas('steps')->get()->map(function ($item) {
            return $item->steps()->get()->map(function($step){
                return $step->step?->includes()->whereHas('include',function($inc){
                    $inc->where('class','other');
                })->get()->map(function($item){
                    return $item->include;
                });
            });
        })->unique('id')->flatten()->values()->all();

        $excludes = $tour->itinerary?->days()->whereHas('steps')->get()->map(function ($item) {
            return $item->steps()->get()->map(function($step){
                return $step->step?->excludes()->get()->map(function($item){
                    return $item->exclude;
                });
            });
        })->unique('id')->flatten()->values()->all();

        $lunch = $tour->itinerary?->days()->whereHas('steps')->get()->map(function ($item) {
            return $item->steps()->get()->map(function($step){
                return $step->step?->includes()->whereHas('include',function($inc){
                    $inc->where('class','=','lunch');
                })->get()->map(function($item){
                    return $item->include;
                });
            });
        })->unique('id')->flatten()->values()->count();

        $breakfast = $tour->itinerary?->days()->whereHas('steps')->get()->map(function ($item) {
            return $item->steps()->get()->map(function($step){
                return $step->step?->includes()->whereHas('include',function($inc){
                    $inc->where('class','=','breakfast');
                })->get()->map(function($item){
                    return $item->include;
                });
            });
        })->unique('id')->flatten()->values()->count();

        $dinner = $tour->itinerary?->days()->whereHas('steps')->get()->map(function ($item) {
            return $item->steps()->get()->map(function($step){
                return $step->step?->includes()->whereHas('include',function($inc){
                    $inc->where('class','=','dinner');
                })->get()->map(function($item){
                    return $item->include;
                });
            });
        })->unique('id')->flatten()->values()->count();

        $defaultPrice = $tour->transportCalculate()->placesCalculate()
            ->guideCalculate()->attendantCalculate()->accommodationsCalculate()->mealsCalculate()->airportCalculate()->AddTax(10)->getFinalPrice();


        return view('frontend.tour.show',
            compact('tour','places',
                'includes','dinner','lunch','breakfast','excludes','defaultPrice'));
    }
}
