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

//ROTAS ADMINISTRATIVAS

/** 
 * ->except(['show']); vai usar todas as rotas exceto show
 * ->only(['create','destroy']); vai so usar as rotas create e destroy 
 */
Route::prefix('admin')->group(function ()
{
    Route::resource('address', 'App\Http\Controllers\Admin\AddressController');
    Route::resource('goal', 'App\Http\Controllers\Admin\GoalController');
    Route::resource('immobile', 'App\Http\Controllers\Admin\ImmobileController');
    Route::resource('proximity', 'App\Http\Controllers\Admin\ProximityController');
    Route::resource('type', 'App\Http\Controllers\Admin\TypeController');
    Route::resource('city', 'App\Http\Controllers\Admin\CityController')->except(['show']);
    //Todas as minhas fotoas são associadas a um imovel (immobile.photos)
    // imoveis/id de imoveis/foto/?parametros qualquer?
    Route::resource('immobile.photos', 'App\Http\Controllers\Admin\PhotoController')->except(['show','update','edit']);
});

//ROTAS DO SITE
Route::resource('/', 'App\Http\Controllers\Site\CitySiteController')->only(['index']);
//rota alinhada:
Route::resource('cities.immobile', 'App\Http\Controllers\Site\ImmobileController')->only(['index','show']);