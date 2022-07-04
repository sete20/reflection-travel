<?php

namespace App\Domain\User\Datatables;

use App\Domain\User\Models\Question;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class QuestionDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Question::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('title')->title(__('Title')),
            Column::make('answer')->title(__('Answer')),
            Column::make('status')->title(__('Status')),
        ];
    }
}
