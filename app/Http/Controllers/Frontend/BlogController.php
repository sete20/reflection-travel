<?php

namespace App\Http\Controllers\Frontend;

use App\Domain\Blog\Models\Blog;
use App\Domain\Blog\Models\BlogCat;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {

        $blog = Blog::saveColumns()->with('media');
        $blogCategories =  BlogCat::all();
        if (!is_null(request()->category_id)) {
            $blog->where('blog_cat_id', request()->category_id);
        }
        return view('frontend.blog.index')->with([
            'blogCategories'  => $blogCategories,
            'issetCategoryId' => !is_null(request()->category_id),
            'blog'  =>  $blog->paginate()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('frontend.blog.show')->with(['blog' => $blog,]);
    }
}
