<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\CoreTour\Datatables\HighlightlinkDatatable;
use App\Domain\CoreTour\Models\Highlightlink;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class HighlightlinkController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.highlightlinks';

    protected string $datatable = HighlightlinkDatatable::class;

    protected string $model = Highlightlink::class;

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
