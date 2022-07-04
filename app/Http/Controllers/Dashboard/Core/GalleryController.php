<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Domain\Core\Datatables\GalleryDatatable;
use App\Domain\Core\Models\Gallery;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class GalleryController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core.galleries';

    protected string $datatable = GalleryDatatable::class;

    protected string $model = Gallery::class;

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
