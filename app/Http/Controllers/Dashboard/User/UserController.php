<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Domain\User\Datatables\UserDatatable;
use App\Domain\User\Models\User;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.user.users';

    protected string $datatable = UserDatatable::class;

    protected string $model = User::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
