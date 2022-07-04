<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\Coretour\Datatables\TipDatatable;
use App\Domain\Coretour\Models\Tip;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class TipController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.tips';

    protected string $datatable = TipDatatable::class;

    protected string $model = Tip::class;

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
