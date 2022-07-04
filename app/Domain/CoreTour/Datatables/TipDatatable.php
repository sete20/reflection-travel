<?php

namespace App\Domain\Coretour\Datatables;

use App\Domain\Coretour\Models\Tip;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class TipDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Tip::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
        ];
    }
}
