<?php

namespace App\Domain\User\Datatables;

use App\Domain\User\Models\User;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class UserDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return User::query()->isUsers();
    }

    protected function getCustomColumns(): array
    {
        return [
            'roles' => function ($model) {
                $outputRoles = '';

                foreach ($model->roles as $role){
                    $outputRoles .= "<span class='badge badge-info ml-2'>{$role->name}</span>";
                }

                return $outputRoles;
            },
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('email')->title(__('Email')),
            Column::make('roles')->title(__('Roles')),
        ];
    }
}
