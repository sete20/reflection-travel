<?php

namespace App\Http\Controllers\Dashboard\Blog;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Blog\Datatables\BlogSubCategoryDatatable;
use App\Domain\Blog\Models\BlogCat;
use App\Domain\Blog\Models\BlogSubCategory;
use Arr;

class BlogSubCategoryController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.blog.blog-sub-categories';

    protected string $datatable = BlogSubCategoryDatatable::class;

    protected string $model = BlogSubCategory::class;


    protected function rules()
    {
        return [
            'name' => 'required|string',
            'title' => 'required|string',
            'slug' => '',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'meta_title' => 'required|',
            'meta_keywords' => '',
            'meta_description' => '',
            'parent_category_id' => 'required|exists:blog_cats,id'
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
        if(request()->hasFile('image')){
            $model->clearMediaCollection();
            $model->addMedia(Arr::pull($validated,'image'))->toMediaCollection();
        }
        $model->update($validated);

        return null;
    }




    protected function formData(?Model $model = null): array
    {
        return [
            'blog_categories'   =>  toMap(BlogCat::select(['id','name'])->get(),'id','name')
        ];
    }
}
