<?php

namespace App\Domain\Tour\Datatables;

use App\Domain\Tour\Models\Meal;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class MealDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Meal::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
