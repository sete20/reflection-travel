<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Models\Category;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class CategoryDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Category::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
        ];
    }
}
