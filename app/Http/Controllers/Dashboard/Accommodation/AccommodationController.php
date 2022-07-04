<?php

namespace App\Http\Controllers\Dashboard\Accommodation;

use App\Domain\Accommodation\Datatables\AccommodationDatatable;
use App\Domain\Accommodation\Models\Accommodation;
use App\Domain\Accommodation\Models\AccommodationPrice;
use App\Domain\Accommodation\Models\View;
use App\Domain\Core\Models\City;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class AccommodationController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.accommodation.accommodations';

    protected string $datatable = AccommodationDatatable::class;

    protected string $model = Accommodation::class;

    protected function rules()
    {
        $validations = [
            'name' => 'required|string',
            'address' => 'required|string',
            'city_id' => 'required|integer|exists:cities,id',
            'reservation_email' => 'sometimes|nullable|string',
            'reservation_phone' => 'sometimes|nullable|string',
            'reception_phone' => 'sometimes|nullable|string',
            'bank_name' => 'sometimes|nullable|string',
            'bank_account_number' => 'sometimes|nullable|string',
            'accounting_phone' => 'sometimes|nullable|string',
            'tourguide_night_fee' => 'sometimes|nullable',
            'note' => 'sometimes|nullable|string',
            'views' => 'sometimes|nullable|array',
            'views.*' => 'sometimes|nullable|exists:views,id',
        ];
        if(request()->method('post')){
            $validations['type'] = 'required|in:'.implode(',', config('enum.accommodation_types'));
        }

        return $validations;
    }

    public function store()
    {

        $validated = $this->validationAction();
        $request = request()->except('views');
        $model = ($this->model)::create($request);

        foreach (config('enum.seasons') as $season) {
            AccommodationPrice::create([
                'season' => $season,
                'accommodation_id' => $model->id,
            ]);
        }
        if(isset($validated['views']) && is_array($validated['views'])){
            foreach ($validated['views'] as $view_id) {
                foreach (config('enum.seasons') as $season) {
                    AccommodationPrice::create([
                        'season' => $season,
                        'accommodation_id' => $model->id,
                        'view_id' => $view_id,
                    ]);
                }
            }
        }

        return  $this->successfulRequest();
    }

    public function update($id)
    {

        $model = ($this->model)::findOrFail($id);
        $validated = $this->validationAction();

        $request = request()->except('views');
        $model->update($request);

        if(isset($validated['views']) && is_array($validated['views'])){
            $skip_ids = $model->viewsIn($validated['views']);
            $model->deleteViewPrices($skip_ids);
            foreach ($validated['views'] as $view_id) {
                if(! in_array($view_id, $skip_ids)){
                    foreach (config('enum.seasons') as $season) {
                        AccommodationPrice::insert([
                            ['season' => $season, 'accommodation_id' => $model->id, 'view_id' => $view_id],
                        ]);
                    }
                }
            }
        }else{
            $model->deleteViewPrices([]);
        }

        return $this->successfulRequest();
    }

    protected function formData(?Model $model = null): array
    {

        return [
            'cities'=> toMap(City::get()),
            'views'=> match(true){
                (request()->type == 'hotel') => toMap(View::where('type', 'hotel')->get()),
                (request()->type == 'cruise') => toMap(View::where('type', 'cruise')->get()),
                default => toMap(View::get()),
            },
        ];
    }
}
