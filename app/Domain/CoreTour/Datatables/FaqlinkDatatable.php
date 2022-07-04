<?php

namespace App\Domain\Coretour\Datatables;

use App\Domain\Coretour\Models\Faqlink;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class FaqlinkDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Faqlink::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
