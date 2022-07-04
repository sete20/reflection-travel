<?php

namespace App\Domain\Coretour\Datatables;

use App\Domain\Coretour\Models\Place;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class PlaceDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Place::query()->orderByDesc('id');
    }

    protected function getCustomColumns(): array
    {
        return [
            'city_id' => function ($model) {
                return $model->city?->name;
            },
            'adult_fee' => function ($model) {
                return number_format($model->adult_fee, 2).'/'.number_format($model->egyptian_adult_fee, 2).' L.E';
            }, 'child_fee' => function ($model) {
                return number_format($model->child_fee, 2).'/'.number_format($model->arab_child_fee, 2).'/'.number_format($model->egyptian_child_fee, 2).' L.E';
            }, 'infant_fee' => function ($model) {
                return number_format($model->infant_fee, 2).'/'.number_format($model->arab_infant_fee, 2).'/'.number_format($model->egyptian_infant_fee, 2).' L.E';
            },
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Area Name')),
            Column::make('title')->title(__('Title')),
            Column::make('adult_fee')->title(__('Adult fees Foreign/Arab/Egyptian')),
            Column::make('child_fee')->title(__('Child fees Foreign/Arab/Egyptian')),
            Column::make('infant_fee')->title(__('Infant fees Foreign/Arab/Egyptian')),
            Column::make('latitude')->title(__('Latitude')),
            Column::make('longitude')->title(__('Longitude')),
            Column::make('city_id')->title(__('City')),
        ];
    }
}
