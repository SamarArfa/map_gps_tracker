
<?php

use App\Http\Controllers\SearchGirlsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
//    $districts=Location::pluck('district','district');

    return view('front');
});
Route::post('/addInfo', 'SearchGirlsController@addInfo')->name('location.store');
//Route::get('/front', function () {
////    $districts=Location::pluck('district','district');
//
//    return view('front');
//});

Route::get('maps', 'SearchGirlsController@gmaps');
