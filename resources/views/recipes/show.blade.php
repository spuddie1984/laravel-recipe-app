@extends('layouts.app')

@php
    // Decode Json data so we can loop over it in the view
    $ingredients_arr = json_decode($user_recipe->ingredients);
    $methods_arr = json_decode($user_recipe->methods);
@endphp

@section('content')
<section class="container">
    <div id="show-recipe">
        <img class="img-fluid" src="{{ Storage::url($user_recipe->image_url) }}" alt="">
        <div>
            <h1>{{ $user_recipe->title }}</h1>
            <span id="cooking-time">Cooking Time: {{ $user_recipe->cooking_time . 'mins' }} </span>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3>Ingredients</h3>
                <ul>
                    @foreach ($ingredients_arr as $ingredient)
                    <li>{{ $ingredient }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <h3>Method</h3>
                <ol>
                    @foreach ($methods_arr as $method)
                    <li>{{ $method }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center user-recipe-buttons">
                    <a class="btn btn-primary mr-2" href="{{ route('recipes.edit', ['id' => $user_recipe->id]) }}">edit</a>
                    <form action="{{ route('recipes.destroy', ['id' => $user_recipe->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
