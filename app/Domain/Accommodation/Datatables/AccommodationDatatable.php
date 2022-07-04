<?php

namespace App\Domain\Accommodation\Datatables;

use App\Domain\Accommodation\Models\Accommodation;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class AccommodationDatatable extends BaseDatatable
{
    protected ?string $actionable = 'edit|delete|prices';

    public function query(): Builder
    {
        return Accommodation::query();
    }

    protected function getActions($model): array
    {
        $route = route('dashboard.accommodation.accommodation-prices.index', ['accommodation_id'=>$model->id]);

        return ["<a class='btn btn-info' href='{$route}'>".__('Prices').'</a>'];
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
            Column::make('type')->title(__('Type')),
            Column::make('name')->title(__('Name')),
            Column::make('address')->title(__('Address')),
            Column::make('city_id')->title(__('City')),
        ];
    }
}
