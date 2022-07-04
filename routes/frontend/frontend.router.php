<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth
require __DIR__ . '/auth.routes.php';


Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact-us', 'ContactUsController@index')->name('contact_us');
Route::post('/contact-us', 'ContactUsController@store')->name('contact_us');

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', 'BlogController@index')->name('index');
    Route::get('/{blog}', 'BlogController@show')->name('show');
});

Route::group(['prefix' => 'page'], function () {

    Route::get('about-us', 'PageController')->name('about_us');
    Route::get('company-history', 'PageController')->name('company_history');
    Route::get('terms', 'PageController')->name('terms');
    Route::get('legal', 'PageController')->name('legal');
    Route::get('partners', 'PageController')->name('partners');
    Route::get('privacy', 'PageController')->name('privacy');
    Route::get('payment', 'PageController')->name('payment');
    Route::get('feedback', 'PageController')->name('feedback');
    Route::get('cookies', 'PageController')->name('cookies');
    Route::get('policies', 'PageController')->name('policies');
});

/*
 *  Route::get('/', function () {
     $tour = \App\Domain\Tour\Models\Tour::find(1);
   // $defaultPrice = $tour->transportCalculate()->placesCalculate()
   //->guideCalculate()->attendantCalculate()->mealsCalculate()->airportCalculate()->AddTax(10)->getFinalPrice();
    dd($tour->accommodationsCalculate()->AddTax(10)->getFinalPrice());
    //->guideCalculate()->attendantCalculate()->mealsCalculate()->getFinalPrice());
     return view('frontend.home.index');
});
 */

Route::group(['prefix'  =>  'tours', 'as' => 'tour.', 'namespace' => 'Tour'], function () {
    Route::get('/', 'TourController');
    Route::get('/{id}/{title?}', 'TourController@show')->name('single');
    Route::get('/courses', 'UserController@Courses')->name('courses');
    Route::post('/profile', 'UserController@UpdateProfile')->name('update.profile');
});
