<?php

namespace App\Domain\Itinerary\Datatables;

use App\Domain\Itinerary\Models\Itinerary;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ItineraryDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Itinerary::query();
    }

    protected function getCustomColumns(): array
    {
        return [
            'days' => function ($model) {
                $outputDays = '';
                foreach ($model->days as $day){
                    $outputDays .= "<span class='badge badge-info ml-2'>{$day->name}</span>";
                }

                return $outputDays;
            },
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('days')->title(__('Days')),
        ];
    }
}
