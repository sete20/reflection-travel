<?php

namespace App\Domain\Accommodation\Datatables;

use App\Domain\Accommodation\Models\AccommodationView;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class AccommodationViewDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return AccommodationView::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
