<?php

namespace App\Domain\Tour\Datatables;

use App\Domain\Tour\Models\Benfit;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;

class BenfitDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Benfit::query();
    }

    protected function getColumns(): array
    {
        return [
            $this->column('id',__('ID')),
            $this->column('title',__('Title')),
            $this->column('subtitle',__('Subtitle')),
        ];
    }
}
