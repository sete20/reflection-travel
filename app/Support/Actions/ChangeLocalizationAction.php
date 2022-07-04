<?php

namespace App\Support\Actions;

use Illuminate\Support\Facades\App;

class ChangeLocalizationAction
{
    public function __invoke($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
