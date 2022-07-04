<?php

namespace App\Domain\Accommodation\Datatables;

use App\Domain\Accommodation\Models\AccommodationPrice;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class AccommodationPriceDatatable extends BaseDatatable
{
    protected ?string $actionable = 'custom-edit';

    public function query(): Builder
    {
        if(request('accommodation_id')){
            return AccommodationPrice::query()
                ->orderBy('id', 'desc')
                ->where('accommodation_id', request('accommodation_id'));
        }

        return AccommodationPrice::query();
    }

    protected function getActions($model): array
    {
        $route = route('dashboard.accommodation.accommodation-prices.index', ['accommodation_id'=>$model->id]);
        $editRoute = route($this->route.'.edit', [$model, 'accommodation_id'=>request('accommodation_id')]);

        $actions[] = <<<HTML
                 <a href='$editRoute' class='btn  text-primary'><i class='icon-database-edit2'></i> </a>
            HTML;

        return $actions;
    }

    protected function getCustomColumns(): array
    {
        return [
            'view_id' => function ($model) {
                return $model->view?->name;
            },
        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::make('season')->title(__('Season')),
            Column::make('view_id')->title(__('view')),
            Column::make('single')->title(__('single')),
            Column::make('double')->title(__('double')),
            Column::make('trible')->title(__('trible')),
        ];
    }
}
