<?php

namespace App\Domain\Blog\Datatables;

use App\Domain\Blog\Models\BlogSubCategory;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class BlogSubCategoryDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return BlogSubCategory::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('parent')->title(__('Parent category')),
        ];
    }

    protected function getCustomColumns(): array
    {
        return [
            'parent' => function ($model) {
                return $model->parent?->name;
            },
        ];
    }
}
