<?php

namespace App\Http\Controllers\Dashboard\CoreTour;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use App\Domain\CoreTour\Datatables\TestimonialDatatable;
use App\Domain\CoreTour\Models\Testimonial;

class TestimonialController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.testimonials';

    protected string $datatable = TestimonialDatatable::class;

    protected string $model = Testimonial::class;


    protected function rules()
    {
        return [
            'client_name'   =>  'required|string|max:191',
            'client_review'   =>  'required|string',
            'date'          =>  'required|date'
        ];
    }
}
