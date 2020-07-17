<?php

namespace App\Http\Controllers;

use App\User;
use App\Recipes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Display a list of User's Recipes

        // Grab Users recipes from the DB
        $user_recipes = Recipes::where('user_id', Auth::id())->get();

        // Show a list of the users recipes
        return view('recipes.index', ['user_recipes' => $user_recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return add form view
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // New recipe object
        $recipe = new Recipes;
        // persist the new recipe to db
        $recipe->user_id = Auth::id();
        $recipe->title = $request->input('title');
        $recipe->cooking_time = $request->input('cooking-time');
        $recipe->ingredients = $request->input('ingredient');
        $recipe->methods = $request->input('method');

        // Save the Image upload
        if ( $request->imageUpload ) {
            $recipe_image = $request->imageUpload->store('Recipes');
            $recipe->image_url = $recipe_image;
        }

        // Persist Recipe to DB
        $recipe->save();

        return Redirect::action('RecipesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function show(Recipes $recipes, $id)
    {
        // show single recipe

        // Grab data for recipe from DB
        $user_recipe = Recipes::findOrFail($id);

        // Send to show view
        return view('recipes.show', ['user_recipe' => $user_recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // show editing form for specific recipe

        // Grab data from DB
        $user_recipe = Recipes::findOrFail($id);

        // Return the edit view
        return view('recipes.edit', ['user_recipe' => $user_recipe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // persist updated edit form data to db

        // grab recipe from db
        $recipe_to_update = Recipes::find($id);

        // update recipe attributes
        $recipe_to_update->title = $request->input('title');
        $recipe_to_update->cooking_time = $request->input('cooking-time');
        $recipe_to_update->ingredients = $request->input('ingredient');
        $recipe_to_update->methods = $request->input('method');

        // check if file has been uploaded else dont worry about changing
        if ( $request->imageUpload ) {

            // if new recipe image has been uploaded delete the old one
            Storage::delete($recipe_to_update->image_url);

            // now update image_url in db and store the new image
            $recipe_image = $request->imageUpload->store('Recipes');
            $recipe_to_update->image_url = $recipe_image;

        }

        // persist recipe
        $recipe_to_update->save();

        // redirect
        return Redirect::action('RecipesController@show', ['id' => $recipe_to_update->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete recipe from db

        // Grab the recipe from db
        $destroy_recipe = Recipes::find($id);

        // Delete Recipe Image from file storage
        Storage::delete($destroy_recipe->image_url);

        // delete recipe from db
        $destroy_recipe->delete();

        // redirect to index recipes page
        return Redirect::action('RecipesController@index');

    }
}
