<?php

namespace App\Http\Controllers\Frontend;

use App\Domain\User\Models\ContactMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.contact-us.index');
    }

    public function store(ContactUsRequest $request)
    {
        ContactMessage::create($request->validated());
        return ['type' => 'success','message' => __('We\'re recieved your message successfully and we\'ll be in touch soon')];
    }
}
