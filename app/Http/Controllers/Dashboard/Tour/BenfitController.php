<?php

namespace App\Http\Controllers\Dashboard\Tour;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use App\Domain\Tour\Datatables\BenfitDatatable;
use App\Domain\Tour\Models\Benfit;
use Arr;
use Illuminate\Database\Eloquent\Model;

class BenfitController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.tour.benfits';

    protected string $datatable = BenfitDatatable::class;

    protected string $model = Benfit::class;


    protected function rules()
    {
        $rules = [
            'title' =>  'required|string',
            'subtitle' =>  'required|string',
            'image' =>  'required|image|max:5000',
        ];

        if(request()->isMethod('PUT')){
            $rules['image'] = 'nullable|image|max:5000';
        }
        return $rules;
    }
    protected function storeAction(array $validated)
    {
        $image = Arr::pull($validated,'image');
        $model = ($this->model)::create($validated);
        $model->addMedia($image)->toMediaCollection();
        return null;
    }
    
    protected function updateAction(array $validated, Model $model)
    {
        if(Arr::has($validated,'image')){
            $model->clearMediaCollection();
            $model->addMedia(Arr::pull($validated,'image'))->toMediaCollection();
        }
        $model->update($validated);

        return null;
    }
}
