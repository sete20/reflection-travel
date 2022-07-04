<?php

namespace App\Domain\Core\Datatables\Administration;

use App\Domain\Core\Enums\RolesEnum;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Column;

class RolesDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Role::where('guard_name', 'web')
                   ->whereNotIn('name', RolesEnum::toArray())
                   ->withCount('permissions');
    }

    protected function getColumns(): array
    {
        return array_merge([
            Column::make('name')->title(__('Name')),
            Column::make('permissions_count')->title(__('Permissions Count'))
                  ->searchable(false)
                  ->orderable(false),
        ], parent::getColumns());
    }
}
