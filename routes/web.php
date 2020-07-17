<?php

use App\Http\Controllers\RecipesController;
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

| name         |       url        | verb  |            Decription                    |
|--------------|------------------|-------|------------------------------------------|
|APP INDEX     | /                | GET   | App Home Page                            |
|RECIPE INDEX  | /recipes         | GET   | Displays a list of all recipes           |
|NEW           | /recipes/new     | GET   | Displays a form to add a new recipe      |
|STORE         | /recipes         | POST  | Add a new recipe to the DB               |
|SHOW          | /recipes/:id     | GET   | Show info about one recipe only          |
|EDIT          | /recipes/:id/edit| GET   | Show edit form for one recipe            |
|UPDATE        | /recipes/:id     | PUT   | Update a recipe, then redirect somewhere |
|DESTROY       | /recipes/:id     | DELETE| Delete a recipe, then redirect somewhere |

*/


Auth::routes();

Route::get('/', function () {return view('welcome');})->name('home');

// Recipe CRUD Routes
Route::middleware('auth')->group(function () {

    Route::get('/recipes', 'RecipesController@index')->name('recipes.index');
    Route::get('/recipes/new', 'RecipesController@create')->name('recipes.create');
    Route::post('/recipes', 'RecipesController@store')->name('recipes.store');
    Route::get('recipes/{id}', 'RecipesController@show')->name('recipes.show');
    Route::get('recipes/{id}/edit', 'RecipesController@edit')->name('recipes.edit');
    Route::put('recipes/{id}', 'RecipesController@update')->name('recipes.update');
    Route::delete('recipes/{id}', 'RecipesController@destroy')->name('recipes.destroy');

});
