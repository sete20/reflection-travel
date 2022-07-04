<?php

namespace App\Http\Controllers\Frontend;

use App\Domain\Blog\Models\Blog;
use App\Domain\Core\Models\Category;
use App\Domain\CoreTour\Models\Testimonial;
use App\Domain\Tour\Models\Benfit;
use App\Domain\Tour\Models\Tour;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $r)
    {
        if ($r->all() <= 1) {
            dd($r->all());
            # code...
        }

        return view('frontend.home.index')->with([
            'benfits'           =>  Benfit::with('media')->get(),
            'travelArticles'    =>  Blog::with('media')->inRandomOrder()->limit(3)->get(),
            'testimonials'      =>  Testimonial::inRandomOrder()->limit(6)->get(),
            'topCategories'     =>  Category::topCategories()->get(),
            'topTours'          =>  Tour::topTours()->get()
        ]);
    }
}
