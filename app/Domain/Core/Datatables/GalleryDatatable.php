<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Models\Gallery;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class GalleryDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Gallery::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
        ];
    }
}
