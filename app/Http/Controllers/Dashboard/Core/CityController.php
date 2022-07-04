<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Domain\Core\Datatables\CityDatatable;
use App\Domain\Core\Models\City;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class CityController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core.cities';

    protected string $datatable = CityDatatable::class;

    protected string $model = City::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'tourguide_fee'=>'required|array',
            'tourguide_fee.*'=>'required|string',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
