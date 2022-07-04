<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\Coretour\Datatables\FaqlinkDatatable;
use App\Domain\Coretour\Models\Faqlink;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class FaqlinkController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.coretour.faqlinks';

    protected string $datatable = FaqlinkDatatable::class;

    protected string $model = Faqlink::class;

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
