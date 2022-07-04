<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Models\Email;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class EmailDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Email::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
