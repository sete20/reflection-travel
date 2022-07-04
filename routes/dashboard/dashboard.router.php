<?php

use App\Domain\Core\Enums\RolesEnum;
use App\Support\Actions\ChangeLocalizationAction;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => config('custom.dashboard.prefix'), 'as' => 'dashboard.'], function () {
    Route::get('lang/{locale}', [ChangeLocalizationAction::class, '__invoke'])->name('lang');

    require __DIR__.'/auth.routes.php';

    Route::group(['middleware' => ['auth', 'role:'.RolesEnum::admin()]], static function () {
        Route::view('/', 'dashboard.home')->name('home');
        require __DIR__.'/core.routes.php';
        require __DIR__.'/user.routes.php';
        require __DIR__.'/blog.routes.php';
        require __DIR__.'/itinerary.routes.php';
        require __DIR__.'/core-tour.routes.php';
        require __DIR__.'/day.routes.php';
        require __DIR__.'/step.routes.php';
        require __DIR__.'/tour.routes.php';
        require __DIR__.'/accommodation.routes.php';
    });
});
