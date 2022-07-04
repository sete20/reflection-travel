<?php

namespace App\Http\Controllers\Dashboard\Step;

use App\Domain\Core\Models\City;
use App\Domain\Coretour\Models\Airport;
use App\Domain\CoreTour\Models\Attendant;
use App\Domain\CoreTour\Models\Exclude;
use App\Domain\CoreTour\Models\IncludeModel;
use App\Domain\Coretour\Models\Permit;
use App\Domain\Coretour\Models\Place;
use App\Domain\Coretour\Models\Transport;
use App\Domain\Step\Datatables\StepDatatable;
use App\Domain\Step\Models\Step;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class StepController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.step.steps';

    protected string $datatable = StepDatatable::class;

    protected string $model = Step::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'title'=>'sometimes|nullable|string',
            'body'=>'required|string',
            'duration'=>'required|string',
            'duration_type'=>'required',
            'duration_approximate'=>'required',
            'place_id'=>'sometimes|nullable|integer|exists:places,id',
            'transport_id'=>'sometimes|nullable|integer|exists:transports,id',
            'airport_id'=>'sometimes|nullable|integer|exists:airports,id',
            'attendant_id'=>'sometimes|nullable|integer|exists:attendants,id',
            'permit_id'=>'sometimes|nullable|integer|exists:permits,id',
            'city_id'=>'required|integer|exists:cities,id',
        ];
    }

    public function store()
    {
        $validated = $this->validationAction();

        $model = ($this->model)::create($validated);
        if(request('includes')){
            foreach (request('includes') as $include_id){
                $model->includes()->create([
                    'include_id'=>$include_id,
                ]);
            }
        }
        if(request('excludes')){
            foreach (request('excludes') as $exclude_id){
                $model->excludes()->create([
                    'exclude_id' =>$exclude_id,
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
        if(request('includes')){
            $model->includes()->delete();
            foreach (request('includes') as $include_id){
                $model->includes()->create([
                    'include_id' =>$include_id,
                ]);
            }
        }
        if(request('excludes')){
            $model->excludes()->delete();
            foreach (request('excludes') as $exclude_id){
                $model->excludes()->create([
                    'exclude_id' =>$exclude_id,
                ]);
            }
        }

        return $this->successfulRequest();
    }

    protected function formData(?Model $model = null): array
    {

        return [
            'places' =>toMap(Place::get()),
            'transports' =>toMap(Transport::get()),
            'airports' =>toMap(Airport::get()),
            'attendants' =>toMap(Attendant::get()),
            'permits' =>toMap(Permit::get()),
            'cities' =>toMap(City::get()),
            'includes' =>toMap(IncludeModel::get()),
            'excludes' =>toMap(Exclude::get()),
        ];
    }
}
