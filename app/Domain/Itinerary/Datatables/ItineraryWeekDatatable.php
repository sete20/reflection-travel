<?php

namespace App\Domain\Itinerary\Datatables;

use App\Domain\Itinerary\Models\ItineraryWeek;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ItineraryWeekDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return ItineraryWeek::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('')->title(__('')),
        ];
    }
}
