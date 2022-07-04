<?php

namespace App\Providers;

use App\Support\Sidebar\Sidebar;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->viewComposers();
    }

    private function viewComposers()
    {
        View::composer('dashboard.layouts.default', function (\Illuminate\View\View $view) {
            $view->with('sidebar', (new Sidebar())());
        });
        View::composer('dashboard.layouts.components.toolbar', function ($view) {
            $lang = [
                'ar' => [
                    'title' => 'العربيه',
                    'locale' => 'ar',
                    'image' => asset('admin/global_assets/images/lang/eg.svg'),
                ],
                'en' => [
                    'title' => 'English',
                    'locale' => 'en',
                    'image' => asset('admin/global_assets/images/lang/gb.png'),
                ],
            ];

            $locale = app()->getLocale();
            $view->with(['current' => $lang[$locale]]);
        });
    }
}
