<?php

namespace App\Http\Controllers\Dashboard\Core\Administration;

use App\Domain\Core\Datatables\Administration\RolesDatatable;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithCrud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use WithCrud;

    protected string $path = 'dashboard.core.administration.roles';

    protected string $model = Role::class;

    protected string $datatable = RolesDatatable::class;

    protected function formData(?Model $model = null): array
    {
        return [
            'permissions' => toMap(Permission::get(['id', 'name'])),
        ];
    }

    protected function rules()
    {
        return [
            'name'        => 'required|string|max:191',
            'permissions' => 'required|array',
        ];
    }

    protected function storeAction(array $validated)
    {
        $permissions = Arr::pull($validated, 'permissions');
        $validated['guard_name'] = 'web';
        $role = Role::create($validated);
        $role->syncPermissions($permissions);
    }

    protected function updateAction(array $validated, Model $model)
    {
        $model->syncPermissions(Arr::pull($validated, 'permissions', []));
        $model->update($validated);
    }
}
