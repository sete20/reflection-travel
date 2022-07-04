<?php

namespace App\Http\Controllers\Dashboard\Tour;

use App\Domain\Tour\Datatables\AttendantDatatable;
use App\Domain\Tour\Models\Attendant;
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

    protected string $path = 'dashboard.tour.attendants';

    protected string $datatable = AttendantDatatable::class;

    protected string $model = Attendant::class;

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
