<?php

namespace App\Http\Controllers\Dashboard\Itinerary;

use App\Domain\Itinerary\Datatables\ItineraryWeekDatatable;
use App\Domain\Itinerary\Models\ItineraryWeek;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class ItineraryWeekController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.itinerary.itinerary-weeks';

    protected string $datatable = ItineraryWeekDatatable::class;

    protected string $model = ItineraryWeek::class;

    protected function rules()
    {
        return [

        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
