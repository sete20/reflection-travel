<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Domain\Core\Datatables\PagesDatatable;
use App\Domain\Core\Models\Page;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithCrud;

class PageController extends Controller
{
    use WithCrud;

    protected string $path = 'dashboard.core.pages';

    protected string $model = Page::class;

    protected string $datatable = PagesDatatable::class;

    protected function rules()
    {
        return ['body.*' => 'required'];
    }
}
