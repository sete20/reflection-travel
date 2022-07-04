<?php

namespace App\Domain\Core\Datatables;

use App\Domain\Core\Models\City;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class CityDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return City::query();
    }

    protected function getColumns(): array
    {
        $data = [
            Column::make('name')->title(__('Name')),
        ];
        foreach (langs() as $lang){
            $data [] = Column::make('tourguide_fee.'.$lang)->title(__('Tour guide fee'))->content(0);
        }

        return $data;

    }
}
