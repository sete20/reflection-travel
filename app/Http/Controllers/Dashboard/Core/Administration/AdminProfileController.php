<?php

namespace App\Http\Controllers\Dashboard\Core\Administration;

use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AdminProfileController extends Controller
{
    protected string $path = 'dashboard.core.administration.admins';

    public function index(): View
    {
        FormFacade::setModel(auth()->user());

        return view("{$this->path}.profile");
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:255|unique:users,email,'.auth()->id(),
            'password' => ['nullable', 'confirmed', Password::min(6)->mixedCase()],
        ]);

        Auth::user()->update($validated);

        toast(__('Updated Successfully'), 'success');

        return back();
    }
}
