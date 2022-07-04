<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Domain\User\Datatables\PhoneDatatable;
use App\Domain\User\Models\Phone;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class PhoneController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.user.phones';

    protected string $datatable = PhoneDatatable::class;

    protected string $model = Phone::class;

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
