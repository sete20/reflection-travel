<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Domain\Blog\Datatables\BlogLinkDatatable;
use App\Domain\Blog\Models\BlogLink;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class BlogLinkController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.blog.blog-links';

    protected string $datatable = BlogLinkDatatable::class;

    protected string $model = BlogLink::class;

    protected function rules()
    {
        return [

        ];
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
