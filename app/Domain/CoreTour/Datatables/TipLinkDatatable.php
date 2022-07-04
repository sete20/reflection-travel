<?php

namespace App\Domain\Coretour\Datatables;

use App\Domain\Coretour\Models\TipLink;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class TipLinkDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return TipLink::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
