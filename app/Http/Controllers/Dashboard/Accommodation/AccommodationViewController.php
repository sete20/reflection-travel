<?php

namespace App\Http\Controllers\Dashboard\Accommodation;

use App\Domain\Accommodation\Datatables\AccommodationViewDatatable;
use App\Domain\Accommodation\Models\AccommodationView;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class AccommodationViewController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.accommodation.accommodation-views';

    protected string $datatable = AccommodationViewDatatable::class;

    protected string $model = AccommodationView::class;

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
