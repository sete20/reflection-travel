<?php

namespace App\Domain\Step\Datatables;

use App\Domain\Step\Models\Step;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class StepDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Step::query()->orderBy('id', 'desc');
    }

    protected function getCustomColumns(): array
    {
        return [
            'city_id' => function ($model) {
                return $model->city?->name;
            }, 'place_id' => function ($model) {
                return $model->place?->name;
            }, 'duration' => function ($model) {
                $approximate = $model->duration_approximate ? 'approximate' : '';

                return $model->duration.' '.$model->duration_type.' '.$approximate;
            },
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('title')->title(__('Title')),
            Column::make('duration')->title(__('Duration')),
            Column::make('place_id')->title(__('Place')),
            Column::make('city_id')->title(__('City')),
        ];
    }
}
