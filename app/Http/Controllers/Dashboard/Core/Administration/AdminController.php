<?php

namespace App\Http\Controllers\Dashboard\Core\Administration;

use App\Domain\Core\Datatables\Administration\AdminsDatatable;
use App\Domain\Core\Enums\RolesEnum;
use App\Domain\User\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Administration\AdminRequest;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core.administration.admins';

    protected string $datatable = AdminsDatatable::class;

    protected string $model = User::class;

    protected function storeAction(array $validated)
    {
        $roles = Arr::pull($validated, 'roles', []);
        $roles[] = RolesEnum::admin()->value;

        $model = $this->queryBuilder()->create($validated);
        $model->syncRoles($roles);
    }

    protected function updateAction(array $validated, Model $model)
    {
        $roles = Arr::pull($validated, 'roles', []);
        $roles[] = RolesEnum::admin()->value;

        $model->update($validated);
        $model->syncRoles($roles);
    }

    protected function validationAction(): array
    {
        return app(AdminRequest::class)->validated();
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'selected' => $model?->getRoleNames(),
            'roles'    => toMap(Role::where('guard_name', 'web')
                                    ->whereNotIn('name', RolesEnum::toArray())
                                    ->get(['id', 'name']), 'name'),

        ];
    }
}
