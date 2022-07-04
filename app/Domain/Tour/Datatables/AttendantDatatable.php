<?php

namespace App\Domain\Tour\Datatables;

use App\Domain\Tour\Models\Attendant;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class AttendantDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Attendant::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
