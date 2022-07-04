<?php

namespace App\Domain\Day\Datatables;

use App\Domain\Day\Models\Day;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class DayDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Day::query()->orderByDesc('id');
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
        ];
    }
}
