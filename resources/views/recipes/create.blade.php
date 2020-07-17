@extends('layouts.app')

{{-- form inputs Title, Cooking Time, Ingredients, Method, Image Upload --}}

@section('content')
<section class="container">
<form id="new-recipe" class="recipe-form" action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        <h1 class="form-title">Add a Recipe</h1>
        @csrf
        <div class="form-group">
        <label for="inputTitle">Recipe</label>
        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="Name of Recipe" required>
        </div>
        <div class="form-group">
            <label for="cookingTimeInput">Cooking Time</label>
            <input type="number" class="form-control" name="cooking-time" id="cookingTimeInput" placeholder="Time in minutes" required>
        </div>
        <div class="form-group">
            <label class="form-block-label" for="add-ingredient-input">Ingredients</label>
            <div class="d-inline-flex custom-flex">
                <div class="custom-input">
                    <input class="form-control" id="add-ingredient-input" type="text" placeholder="Add An Ingredient">
                    <div class="custom-input-divs" id="add-ingredient-div"></div>
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
                    <div class="custom-input-divs" id="add-method-div"></div>
                    <input class="hidden-input" name="method" type="text" id="add-method-hidden">
                </div>
                <div>
                    <button id="method-add-btn" class="btn btn-primary form-btn"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
        {{-- {{ Route::current()->getName() }} --}}
        {{-- <div class="image-upload form-group d-flex justify-content-center" id="image-upload">
            <span>Drag or Drop Image Here</span>
            <input type="hidden" id="image-upload" name="imageUpload">
        </div> --}}
        <div class="form-group custom-file fallback">
            <input type="file" class="custom-file-input" name="imageUpload" accept="image/png, image/jpeg, image/jpg" id="imageUpload" required>
            <label class="custom-file-label" for="imageUpload">Add a Recipe Photo</label>
        </div>
        <p class="image-error error validate">Please Upload an Image</p>

        <button id="new-recipe-form-button" class="btn btn-primary btn-block form-submit-btn">Submit the Recipe</button>

      </form>
</section>
@endsection
