<?php

namespace App\Domain\CoreTour\Datatables;

use App\Domain\CoreTour\Models\Attendant;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class AttendantDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Attendant::query();
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
            Column::make('fee')->title(__('Fee')),
            Column::make('city_id')->title(__('City')),
        ];
    }
}
