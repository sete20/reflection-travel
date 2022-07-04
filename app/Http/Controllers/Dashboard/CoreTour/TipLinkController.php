<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\Coretour\Datatables\TipLinkDatatable;
use App\Domain\Coretour\Models\TipLink;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class TipLinkController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.tip-links';

    protected string $datatable = TipLinkDatatable::class;

    protected string $model = TipLink::class;

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
