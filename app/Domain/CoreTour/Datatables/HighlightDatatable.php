<?php

namespace App\Domain\CoreTour\Datatables;

use App\Domain\CoreTour\Models\Highlight;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class HighlightDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Highlight::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
        ];
    }
}
