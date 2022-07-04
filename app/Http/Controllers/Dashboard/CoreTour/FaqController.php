<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\Coretour\Datatables\FaqDatatable;
use App\Domain\Coretour\Models\Faq;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class FaqController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.faqs';

    protected string $datatable = FaqDatatable::class;

    protected string $model = Faq::class;

    protected function rules()
    {
        return [
            'question' => 'required',
            'answer'  => 'required',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
