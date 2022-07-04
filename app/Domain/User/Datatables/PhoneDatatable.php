<?php

namespace App\Domain\User\Datatables;

use App\Domain\User\Models\Phone;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class PhoneDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Phone::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
