<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Domain\Core\Datatables\CategoryDatatable;
use App\Domain\Core\Models\Category;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Arr;
use Illuminate\Database\Eloquent\Model;

class CategoryController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.core.categories';

    protected string $datatable = CategoryDatatable::class;

    protected string $model = Category::class;

    protected function rules()
    {
        return [
            'image'=>'required|image|max:5000',
            'name'=>'required|string',
        ];
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

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
