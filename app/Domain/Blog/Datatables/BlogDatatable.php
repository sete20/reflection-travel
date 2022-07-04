<?php

namespace App\Domain\Blog\Datatables;

use App\Domain\Blog\Models\Blog;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class BlogDatatable extends BaseDatatable
{
    protected ?string $actionable = 'customEdit|delete';

    protected function getActions($model): array
    {
        $editRoute = route('dashboard.blog.blogs.edit', [$model, 'section_id'=>request('section_id')]);
        $actions[] = <<<HTML
                 <a href='$editRoute' class='btn  text-primary'><i class='icon-database-edit2'></i> </a>
            HTML;

        return $actions;
    }

    public function query(): Builder
    {
        $section_id = request('section_id');

        return Blog::query()->when($section_id, function ($query, $section_id) {
            $query->whereHas('category', function ($category) use ($section_id) {
                $category->where('blog_section_id', $section_id);
            });
        });
    }

    protected function getCustomColumns(): array
    {
        return [
            'section' => function ($model) {
                return $model->category?->section?->name;
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
