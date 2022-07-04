<?php

namespace App\Domain\Blog\Datatables;

use App\Domain\Blog\Models\BlogLink;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class BlogLinkDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return BlogLink::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
