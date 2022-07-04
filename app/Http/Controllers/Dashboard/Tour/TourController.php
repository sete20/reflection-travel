<?php

namespace App\Http\Controllers\Dashboard\Tour;

use App\Domain\Accommodation\Models\Accommodation;
use App\Domain\Core\Models\Category;
use App\Domain\Core\Models\City;
use App\Domain\Coretour\Models\Faq;
use App\Domain\Itinerary\Models\Itinerary;
use App\Domain\Tour\Datatables\TourDatatable;
use App\Domain\Tour\Models\Tour;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class TourController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.tour.tours';

    protected string $datatable = TourDatatable::class;

    protected string $model = Tour::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'title'=>'sometimes|nullable|string',
            'description'=>'required|string',
            'interesting'=>'sometimes|nullable|string',
            'itinerary_id'=>'required|integer|exists:itineraries,id',
            'category_id'=>'required|integer|exists:categories,id',
            'start_from_id'=>'required|integer|exists:cities,id',
            'start_to_id'=>'required|integer|exists:cities,id',
        ];
    }

    public function store()
    {
        $validated = $this->validationAction();
        $model = ($this->model)::create($validated);
        if(request('faqs')){
            $model->faqs()->attach(request('faqs'));
        }
        if(request('accommodations')){
            $model->accommodations()->attach(request('accommodations'));
        }

        return $this->successfulRequest();
    }

    public function update($id)
    {
        $model = ($this->model)::findOrFail($id);
        $validated = $this->validationAction();

        $model->update($validated);

        $model->faqs()->detach($model->faqs);
        $model->accommodations()->detach($model->accommodations);

        if(request('faqs')){
            $model->faqs()->attach(request('faqs'));
        }
        if(request('accommodations')){
            $model->accommodations()->attach(request('accommodations'));
        }

        return $this->successfulRequest();
    }

    protected function formData(?Model $model = null): array
    {
        $assignedItineraries = ($this->model)::where('itinerary_id', '!=', $model?->itinerary_id)->pluck('itinerary_id');

        return [
            'cities'=>toMap(City::cursor()),
            'categories'=>toMap(Category::cursor()),
            'faqs'=> Faq::pluck('question', 'id'),
            'accommodations'=>Accommodation::pluck('name', 'id'),
            'itineraries'=>toMap(Itinerary::whereNotIn('id', $assignedItineraries)->cursor()),
        ];
    }
}
