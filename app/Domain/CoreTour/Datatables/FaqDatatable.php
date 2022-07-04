<?php

namespace App\Domain\Coretour\Datatables;

use App\Domain\Coretour\Models\Faq;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class FaqDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Faq::query();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('question')->title(__('question')),
            Column::make('answer')->title(__('answer')),
        ];
    }
}
