<?php

namespace App\Domain\Coretour\Datatables;

use App\Domain\Coretour\Models\Airport;
use App\Support\Datatables\BaseDatatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class AirportDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Airport::query();
    }

    protected function getCustomColumns(): array
    {
        return [
            'pickup_city_id' => function ($model) {
                return $model->pickUpcity?->name;
            },
            'drop_off_city_id' => function ($model) {
                return $model->dropOffCity?->name;
            },
            'take_off_hour' => function ($model) {
                return Carbon::parse($model->take_off_hour)->format('h:i a');
            },
            'arrival_time' => function ($model) {
                return Carbon::parse($model->take_off_hour)->format('h:i a');
            },
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('title')->title(__('Title')),
            Column::make('pickup_city_id')->title(__('Pickup City')),
            Column::make('drop_off_city_id')->title(__('Drop Off City')),
            Column::make('take_off_hour')->title(__('Take Off Hour')),
            Column::make('arrival_time')->title(__('Arrival Time')),
            Column::make('child_price')->title(__('Child Price')),
            Column::make('adult_price')->title(__('adult Price')),
            Column::make('infant_price')->title(__('infant Price')),

        ];
    }
}
