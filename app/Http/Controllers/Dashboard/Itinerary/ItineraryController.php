<?php

namespace App\Http\Controllers\Dashboard\Itinerary;

use App\Domain\Itinerary\Datatables\ItineraryDatatable;
use App\Domain\Itinerary\Models\Itinerary;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ItineraryController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.itinerary.itineraries';

    protected string $datatable = ItineraryDatatable::class;

    protected string $model = Itinerary::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'days'=>'required|array',
        ];
    }

    public function store()
    {
        $validated = $this->validationAction();
        $model = ($this->model)::create([
            'name'=>$validated['name'],
        ]);
        if(request('days')){
            $model->days()->attach(request('days'));
        }
        if(request('weekDays')){

            foreach (request('weekDays') as $weekDay){
                $model->weekDays()->create([
                    'week' =>$weekDay,
                ]);
            }
        }

        return $this->successfulRequest();
    }

    public function update($id)
    {
        $model = ($this->model)::findOrFail($id);
        $validated = $this->validationAction();
        $updateModel = $this->updateAction([
            'name'=>$validated['name'],
        ], $model);

        if(request('days')){
            $model->days()->detach($model->days);
            $model->days()->attach(request('days'));
        }

        if(request('weekDays')){
            $model->weekDays()->delete();
            foreach (request('weekDays') as $weekDay){
                $model->weekDays()->create([
                    'week' =>$weekDay,
                ]);
            }
        }

        return $this->successfulRequest();
    }

    protected function formData(?Model $model = null): array
    {

        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];

        return [
            'weekDays'=> $weekMap,
        ];
    }
}
