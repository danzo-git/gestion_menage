<?php

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

Route::get('/', function () {
    return view('welcome');
});
// Route::middleware ('auth', 'verified')->group (function () {
    // Route::resource ('image', 'TacheController', [
        // 'only' => ['create', 'store', 'destroy', 'update']
    // ]);
// });
//Route::resource('taches', 'TacheController');*

Route::get("/clear",function(){
    \Artisan::call('config:cache');
    //Artisan::call('route:clear');
});

Route::get('taches','TacheController@index')->name('taches.index');




Route::get('/accueil','AccueilController@index')->name('pages.anim');
Route::get('/peuple','AccueilController@donnees')->name('pages.affichage');
Route::group(['middleware' => ['auth']], function () {
   // Route::get('/admin_dash', 'TacheController@index')->name('admin_dash');
   Route::get('admin','TacheController@index')->name('taches.index');
   Route::get('taches/create','TacheController@create')->name('taches.create');
Route::post('taches','TacheController@store')->name('taches.store');
Route::delete('taches/{id}','TacheController@destroy')->name('taches.destroy');
Route::put('taches/{id}', 'TacheController@update')->name('taches.update');
Route::get('taches/{id}/edit', 'TacheController@edit')->name('taches.edit');
Route::get('taches/{id}','TacheController@show')->name('taches.show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
