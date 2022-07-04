<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Domain\Blog\Datatables\BlogSectionDatatable;
use App\Domain\Blog\Models\BlogSection;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class BlogSectionController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.blog.blog-sections';

    protected string $datatable = BlogSectionDatatable::class;

    protected string $model = BlogSection::class;

    protected function rules()
    {
        return [
            'name'=>'required|string',
            'title'=>'sometimes|nullable|string',
            'slug'=>'sometimes|nullable|string',
            'description'=>'sometimes|nullable|string',
            'meta_title'=>'sometimes|nullable|string',
            'meta_keywords'=>'sometimes|nullable|string',
            'meta_description'=>'sometimes|nullable|string',
        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
