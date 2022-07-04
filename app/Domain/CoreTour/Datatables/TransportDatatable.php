<?php

namespace App\Domain\Coretour\Datatables;

use App\Domain\Coretour\Models\Transport;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class TransportDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Transport::query();
    }

    protected function getCustomColumns(): array
    {
        return [
            'city_id' => function ($model) {
                return $model->city?->name;
            },
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('title')->title(__('Title')),
            Column::make('city_id')->title(__('City')),
            Column::make('limousine_price')->title(__('Limousine price')),
            Column::make('coaster_price')->title(__('Coaster price')),
            Column::make('coach_price')->title(__('Coach price')),
        ];
    }
}
