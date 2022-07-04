<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\Core\Models\City;
use App\Domain\CoreTour\Datatables\ExcludeDatatable;
use App\Domain\CoreTour\Models\Exclude;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class ExcludeController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.excludes';

    protected string $datatable = ExcludeDatatable::class;

    protected string $model = Exclude::class;

    protected function rules()
    {
        return [
            'name' => 'required',
            'title' => '',
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
