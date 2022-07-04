<?php

namespace App\Domain\Tour\Datatables;

use App\Domain\Tour\Models\Tour;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class TourDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Tour::query()->orderByDesc('id');
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('description')->title(__('Description')),
        ];
    }
}
