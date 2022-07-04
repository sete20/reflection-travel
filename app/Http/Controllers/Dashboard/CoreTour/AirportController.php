<?php

namespace App\Http\Controllers\Dashboard\Coretour;

use App\Domain\Core\Models\City;
use App\Domain\Coretour\Datatables\AirportDatatable;
use App\Domain\Coretour\Models\Airport;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class AirportController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.airports';

    protected string $datatable = AirportDatatable::class;

    protected string $model = Airport::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'title'=>'sometimes|nullable|string',
            'child_price'=>'required|string',
            'adult_price'=>'required|string',
            'infant_price'=>'required|string',
            'take_off_hour' => 'required|date_format:H:i',
            'arrival_time' => 'required|date_format:H:i|after:take_off_hour',
            'pickup_city_id' => 'required|integer|exists:cities,id',
            'drop_off_city_id' => 'required|integer|exists:cities,id',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'cities'=> toMap(City::cursor()),
        ];
    }
}
