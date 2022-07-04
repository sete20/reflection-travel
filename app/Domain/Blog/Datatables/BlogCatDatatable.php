<?php

namespace App\Domain\Blog\Datatables;

use App\Domain\Blog\Models\BlogCat;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class BlogCatDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return BlogCat::query();
    }

    protected function getCustomColumns(): array
    {
        return [
            'section' => function ($model) {
                return $model->section?->name;
            },
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('section')->title(__('Section')),
        ];
    }
}
