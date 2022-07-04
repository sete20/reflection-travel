<?php

namespace App\Domain\CoreTour\Datatables;

use App\Domain\CoreTour\Models\Highlightlink;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class HighlightlinkDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Highlightlink::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
