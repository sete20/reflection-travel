<?php

namespace App\Http\Controllers\Dashboard\Coretour;

use App\Domain\Core\Models\City;
use App\Domain\Coretour\Datatables\MealDatatable;
use App\Domain\CoreTour\Models\IncludeModel;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class MealController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.meals';

    protected string $datatable = MealDatatable::class;

    protected string $model = IncludeModel::class;

    protected function rules()
    {
        return [
            'name' => 'required',
            'title' => '',
            'type' => 'required|in:free,per_tour,per_pax',
            'class' => 'required|in:breakfast,lunch,dinner',
            'fee' => 'required_if:type,per_group',
            'adult_fee' => 'required_if:type,per_pax',
            'child_fee' => 'required_if:type,per_pax',
            'infant_fee' => 'required_if:type,per_pax',
        ];
    }

    public function store()
    {
        $validated = $this->validationAction();
        if(request()->type == 'free'){
            $validated['fee'] = 0;
            $validated['adult_fee'] = 0;
            $validated['child_fee'] = 0;
            $validated['infant_fee'] = 0;
        }elseif(request()->type == 'per_tour'){
            $validated['adult_fee'] = 0;
            $validated['child_fee'] = 0;
            $validated['infant_fee'] = 0;
        }elseif(request()->type == 'per_pax'){
            $validated['fee'] = 0;
        }
        ($this->model)::create($validated);

        return $this->successfulRequest();
    }

    public function update($id)
    {
        $model = ($this->model)::findOrFail($id);
        $validated = $this->validationAction();
        if(request()->type == 'free'){
            $validated['fee'] = 0;
            $validated['adult_fee'] = 0;
            $validated['child_fee'] = 0;
            $validated['infant_fee'] = 0;
        }elseif(request()->type == 'per_tour'){
            $validated['adult_fee'] = 0;
            $validated['child_fee'] = 0;
            $validated['infant_fee'] = 0;
        }elseif(request()->type == 'per_pax'){
            $validated['fee'] = 0;
        }
        $this->updateAction($validated, $model);

        return $this->successfulRequest();
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'cities'=> toMap(City::get()),
        ];
    }
}
