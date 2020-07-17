@extends('layouts.app')



@section('content')
<section class="container">
    <div id="recipes-grid-div">
        <a id="add-recipe-div" href="{{ route('recipes.create') }}">
            <div id="">
                <span>Add a New Recipe</span>
            </div>
        </a>
    @foreach ( $user_recipes as $recipe )
            <div class="user-saved-recipes">
                <div>

                    <a class="user-recipe-anchor" href="{{ route('recipes.show', ['id' => $recipe->id]) }}">
                        <img class="img-fluid" src="{{ '/storage/'.$recipe->image_url }}" alt="">
                        <span>{{ $recipe->title }}</span>
                    </a>
                </div>
            </div>

    @endforeach
    </div>
</section>
@endsection
