<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\Core\Models\City;
use App\Domain\CoreTour\Datatables\AttendantDatatable;
use App\Domain\CoreTour\Models\Attendant;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class AttendantController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.attendants';

    protected string $datatable = AttendantDatatable::class;

    protected string $model = Attendant::class;

    protected function rules()
    {
        return [
            'name' => 'required',
            'title' => '',
            'fee' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'city_id' => 'sometimes|nullable|integer|exists:cities,id',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'cities'=>toMap(City::cursor()),
        ];
    }
}
