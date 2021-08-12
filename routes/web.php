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

// Route::middleware(['auth'])->group(function(){
//     Route::any('posts/search','App\Http\Controllers\PostController@search')->name('posts.search');
//     Route::resource('posts', 'App\Http\Controllers\PostController');
// });


//->except(['show']); vai usar todas as rotas exceto show
//->only(['create','destroy']); vai so usar as rotas create e destroy
Route::prefix('admin')->group(function ()
{
    Route::resource('city', 'App\Http\Controllers\Admin\CityController')->except(['show']);
});
