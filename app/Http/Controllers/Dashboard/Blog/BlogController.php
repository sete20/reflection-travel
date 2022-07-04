<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Domain\Blog\Datatables\BlogDatatable;
use App\Domain\Blog\Models\Blog;
use App\Domain\Blog\Models\BlogCat;
use App\Domain\Blog\Models\BlogSection;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Arr;
use Illuminate\Database\Eloquent\Model;

class BlogController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.blog.blogs';

    protected string $datatable = BlogDatatable::class;

    protected string $model = Blog::class;

    protected function rules()
    {
        return [
            'name' => 'required|unique:blogs',
            'slug' => '',
            'title' => '',
            'description' => '',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'body' => 'required',
            'meta_title' => '',
            'meta_keywords' => '',
            'meta_description' => '',
            'blog_cat_id' => 'required|exists:blog_cats,id',
            'parent_id' => 'nullable|exists:blogs,id',
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
        $section = BlogSection::findorFail(request('section_id'));
        $blogs = Blog::whereHas('category', function ($query) use ($section) {
            $query->where('blog_section_id', $section->id);
        })->when($model, function ($query, $model) {
            $query->whereNotIn('id', [$model->id])->get();
        })->get();

        return [
            'section' => $section,
            'categories' => toMap(BlogCat::where('blog_section_id', $section->id)->get()),
            'blogs' => toMap($blogs),
        ];
    }
}
