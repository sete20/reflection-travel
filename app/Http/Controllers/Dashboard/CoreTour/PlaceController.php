<?php

namespace App\Http\Controllers\Dashboard\CoreTour;

use App\Domain\Blog\Models\Blog;
use App\Domain\Core\Models\City;
use App\Domain\Coretour\Datatables\PlaceDatatable;
use App\Domain\Coretour\Models\Place;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class PlaceController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core-tour.places';

    protected string $datatable = PlaceDatatable::class;

    protected string $model = Place::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'title'=>'sometimes|nullable|string',
            'adult_fee'=>'sometimes|nullable|string',
            'child_fee'=>'sometimes|nullable|string',
            'infant_fee'=>'sometimes|nullable|string',
            'arab_adult_fee'=>'sometimes|nullable|string',
            'arab_child_fee'=>'sometimes|nullable|string',
            'arab_infant_fee'=>'sometimes|nullable|string',
            'egyptian_adult_fee'=>'sometimes|nullable|string',
            'egyptian_child_fee'=>'sometimes|nullable|string',
            'egyptian_infant_fee'=>'sometimes|nullable|string',
            'latitude'=>'sometimes|nullable|string',
            'longitude'=>'sometimes|nullable|string',
            'city_id' => 'required|integer|exists:cities,id',
            'blog_id' => 'sometimes|nullable|integer|exists:blogs,id',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'cities'=> toMap(City::cursor()),
            'blogs'=> toMap(Blog::cursor()),
        ];
    }
}
