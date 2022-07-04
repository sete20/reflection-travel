<?php

namespace App\Http\Controllers\Frontend;

use App\Domain\Core\Models\Page;
use App\Http\Controllers\Controller;
use Request;

class PageController extends Controller
{
    private $mapRoutePage = [
        'terms'             =>  Page::TERMS,
        'company_history'   =>  Page::COMPANY_HISTORY,
        'about_us'          =>  Page::ABOUT,
        'legal'             =>  Page::LEGAL,
        'partners'          =>  Page::PARTNERS,
        'privacy'           =>  Page::PRIVACY,
        'payment'           =>  Page::PAYMENT,
        'feedback'          =>  Page::FEEDBACK,
        'cookies'           =>  Page::COOKIES,
        'policies'          =>  Page::POLICIES,
    ];
    public function __invoke()
    {
        $key = Request::route()->getName();
        if(isset($this->mapRoutePage[$key])){
            $page = Page::where('key',$this->mapRoutePage[$key])->firstOrFail();
            return view('frontend.pages.index',['page' => $page]);
        }
        abort(404);
    }
}
