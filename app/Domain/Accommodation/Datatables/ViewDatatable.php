<?php

namespace App\Domain\Accommodation\Datatables;

use App\Domain\Accommodation\Models\View;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ViewDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return View::query()->orderBy('id', 'desc');
    }

    protected function getColumns(): array
    {
        return [
            Column::make('type')->title(__('Type')),
            Column::make('name')->title(__('Name')),
        ];
    }
}
