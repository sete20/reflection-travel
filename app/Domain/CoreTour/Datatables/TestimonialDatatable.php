<?php

namespace App\Domain\CoreTour\Datatables;

use App\Domain\CoreTour\Models\Testimonial;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;

class TestimonialDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Testimonial::query();
    }

    protected function getColumns(): array
    {
        return [
            $this->column('id',__('ID')),
            $this->column('client_name',__('Client Name')),
            $this->column('date',__('Date')),
        ];
    }
}
