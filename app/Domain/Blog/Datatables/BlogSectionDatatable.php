<?php

namespace App\Domain\Blog\Datatables;

use App\Domain\Blog\Models\BlogSection;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class BlogSectionDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return BlogSection::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
        ];
    }
}
