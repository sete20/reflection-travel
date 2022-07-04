<?php

namespace App\Domain\Coretour\Datatables;

use App\Domain\Coretour\Models\Permit;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class PermitDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Permit::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('name')),
        ];
    }
}
