<?php

namespace App\Domain\CoreTour\Datatables;

use App\Domain\CoreTour\Models\Exclude;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ExcludeDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Exclude::query();
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
