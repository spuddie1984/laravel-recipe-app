@extends('layouts.app')

@php
    // Decode Json data so we can loop over it in the view
    $ingredients_arr = json_decode($user_recipe->ingredients);
    $methods_arr = json_decode($user_recipe->methods);
@endphp

@section('content')
<section>

    <form id="new-recipe" class="recipe-form" action="{{ route('recipes.update', ['id' => $user_recipe->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <h1 class="form-title">edit {{$user_recipe->title}}  Recipe</h1>
        @csrf
        <div class="form-group">
        <label for="inputTitle">Recipe</label>
        <input type="text" class="form-control" name="title" id="inputTitle" value="{{ $user_recipe->title }}" placeholder="Name of Recipe">
        </div>
        <div class="form-group">
            <label for="cookingTimeInput">Cooking Time</label>
        <input type="text" class="form-control" name="cooking-time" id="cookingTimeInput" value="{{ $user_recipe->cooking_time }}" placeholder="Time in minutes">
        </div>
        <div class="form-group">
            <label class="form-block-label" for="add-ingredient-input">Ingredients</label>
            <div class="d-inline-flex custom-flex">
                <div class="custom-input">
                    <input class="form-control" id="add-ingredient-input" type="text" placeholder="Add An Ingredient">
                    <div class="custom-input-divs" id="add-ingredient-div">
                        @foreach ($ingredients_arr as $ingredient)
                            <span class="custom-tags">{{ $ingredient }}<i class="fa fa-times close" aria-hidden="true"></i></span>
                        @endforeach
                    </div>
                    <input class="hidden-input" name="ingredient" type="text" id="add-ingredient-hidden">
                </div>
                <div>
                    <button id="ingredient-add-btn" class="btn btn-primary form-btn"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-block-label" for="methodsInput">Methods</label>
            <div class="d-inline-flex custom-flex">
                <div class="custom-input">
                    <input class="form-control" id="add-method-input" type="text" placeholder="Add Method / Step">
                    <div class="custom-input-divs" id="add-method-div">
                        @foreach ($methods_arr as $method)
                            <span class="custom-tags">{{ $method }}<i class="fa fa-times close" aria-hidden="true"></i></span>
                        @endforeach
                    </div>
                    <input class="hidden-input" name="method" type="text" id="add-method-hidden">
                </div>
                <div>
                    <button id="method-add-btn" class="btn btn-primary form-btn"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
        <p>Add a Recipe or Photo</p>
        <div class="form-group custom-file">
            <input type="file" class="filepond" name="imageUpload"  accept="image/png, image/jpeg, image/jpg" id="imageUpload">
            <label class="custom-file-label" for="imageUpload">{{ $user_recipe->image_url }}</label>
        </div>

        <button id="new-recipe-form-button" class="btn btn-primary btn-block form-submit-btn">Update Recipe</button>

      </form>
</section>
@endsection
