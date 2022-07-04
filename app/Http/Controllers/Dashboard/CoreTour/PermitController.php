<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\Core\Models\City;
use App\Domain\Coretour\Datatables\PermitDatatable;
use App\Domain\Coretour\Models\Permit;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class PermitController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.permits';

    protected string $datatable = PermitDatatable::class;

    protected string $model = Permit::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'title'=>'sometimes|nullable|string',
            'limousine_price'=>'required|string',
            'hiace_price'=>'required|string',
            'coaster_price'=>'required|string',
            'coach_price'=>'required|string',
            'city_id' => 'required|integer|exists:cities,id',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'cities'=>toMap(City::cursor()),
        ];
    }
}
