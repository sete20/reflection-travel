<?php

namespace App\Http\Controllers\Dashboard\Day;

use App\Domain\Core\Models\City;
use App\Domain\Coretour\Models\Airport;
use App\Domain\CoreTour\Models\IncludeModel;
use App\Domain\Day\Datatables\DayDatatable;
use App\Domain\Day\Models\Day;
use App\Domain\Step\Models\Step;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class DayController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.day.days';

    protected string $datatable = DayDatatable::class;

    protected string $model = Day::class;

    protected function rules()
    {
        return [
            'name' => 'required',
            'title' => '',
            'city_id' => 'required|exists:cities,id',
            'breakfast_id' => 'nullable|exists:includes,id',
            'lunch_id' => 'nullable|exists:includes,id',
            'dinner_id' => 'nullable|exists:includes,id',
            'airport_id' => 'nullable|exists:airports,id',
            'includes.*' => 'exists:includes,id',
            'excludes.*' => 'exists:excludes,id',
            'has_guide' => 'sometimes|nullable',
        ];
    }

    public function store()
    {
        $validated = $this->validationAction();

        $model = ($this->model)::create($validated);
        if(request('steps')){
            foreach (request('steps') as $step_id){
                $model->steps()->create([
                    'step_id' =>$step_id,
                ]);
            }
        }

        return $this->successfulRequest();
    }

    public function update($id)
    {
        $model = ($this->model)::findOrFail($id);
        $validated = $this->validationAction();

        $model->update($validated);
        if(request('steps')){
            $model->steps()->delete();
            foreach (request('steps') as $step_id){
                $model->steps()->create([
                    'step_id' =>$step_id,
                ]);
            }
        }

        return $this->successfulRequest();
    }

    protected function formData(?Model $model = null): array
    {

        return [
            'cities' =>toMap(City::get()),
            'steps' =>toMap(Step::get(),'id','name','title'),
            'airports' =>toMap(Airport::get()),
            'breakfasts' =>toMap(IncludeModel::where('class', 'breakfast')->get()),
            'lunch' =>toMap(IncludeModel::where('class', 'lunch')->get()),
            'dinners' =>toMap(IncludeModel::where('class', 'dinner')->get()),
        ];
    }
}
