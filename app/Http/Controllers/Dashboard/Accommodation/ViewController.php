<?php

namespace App\Http\Controllers\Dashboard\Accommodation;

use App\Domain\Accommodation\Datatables\ViewDatatable;
use App\Domain\Accommodation\Models\View;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class ViewController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.accommodation.views';

    protected string $datatable = ViewDatatable::class;

    protected string $model = View::class;

    protected function rules()
    {
        return [
            'type'=>'required|string',
            'name'=>'required|string',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
