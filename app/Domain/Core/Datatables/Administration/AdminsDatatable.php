<?php

namespace App\Domain\Core\Datatables\Administration;

use App\Domain\User\Models\User;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class AdminsDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return User::role('admin')->latest();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('id')->title(__('Id')),
            Column::make('name')->title(__('Name')),
            Column::make('email')->title(__('Email')),
        ];
    }
}
