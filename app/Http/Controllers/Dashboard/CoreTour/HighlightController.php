<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\CoreTour\Datatables\HighlightDatatable;
use App\Domain\CoreTour\Models\Highlight;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class HighlightController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.highlights';

    protected string $datatable = HighlightDatatable::class;

    protected string $model = Highlight::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
