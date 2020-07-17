@extends('layouts.app')


@section('content')

<header id="homepage-header" class="container-fluid">
    <div class="header-overlay">
        <h1>My Recipe Collection</h1>
        <p>Collect your favourite Recipes and store them here for later use!</p>

        <form class="form-inline" action="" method="get">
            <div class="form-group d-flex justify-content-center mb-2">
                <label for="searchRecipes" class="sr-only">Search for a Recipe</label>
                <input type="text" class="form-control" id="SearchRecipes" placeholder="Search for a Recipe">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>
</header>
<section id="featured-recipes-background">
    <div id="featured-recipes" class="container">
        <div class="row">
            <!-- feature 3 recently added Recipes  -->
            <div class="col-md-4">
                <a href="#">
                    <div class="featured-recipes-image-div">
                        <span class="featured-recipes-image-overlay">Featured Recipe</span>
                        <img class="img-fluid" src="{{ asset('images/5-ingredient-meatball-carbonara.jpg') }}" alt="">
                        <h2 class="title-overlay">5 Ingredient Meatball Carbonara</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="featured-recipes-image-div">
                        <span class="featured-recipes-image-overlay">Featured Recipe</span>
                        <img class="img-fluid" src="{{ asset('images/golden-syrup-anzac-tart.jpg') }}" alt="">
                        <h2 class="title-overlay">Golden Syrup Anzac Tart</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="featured-recipes-image-div">
                        <span class="featured-recipes-image-overlay">Featured Recipe</span>
                        <img class="img-fluid" src="{{ asset('images/ricotta-spinach-gnocchi-bake.jpg') }}" alt="">
                        <h2 class="title-overlay">Ricotta Spinach Gnocchi Bake</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="recipe-categories" class="container">
    <!-- Recipe Categories (Mains, Desert, Appetisers, Salads, Soups, Breakfast) -->
    <h2>Recipe Categories</h2>
    <p>View Recipes based on Category</p>
    <div class="row">
        <div class="col-md-4">
            <a href="#">
                <div class="categories-image-div">
                    <img class="img-fluid" src="{{ asset('images/mains.jpg') }}" alt="">
                    <div class="categories-text-overlay">
                        <h3>Mains</h3>
                        <span>View Recipes</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#">
                <div class="categories-image-div">
                    <img class="img-fluid" src="{{ asset('images/dessert.jpg') }}" alt="">
                    <div class="categories-text-overlay">
                        <h3>Desserts</h3>
                        <span>View Recipes</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#">
                <div class="categories-image-div">
                    <img class="img-fluid" src="{{ asset('images/appetiser.jpg') }}" alt="">
                    <div class="categories-text-overlay">
                        <h3>Appetisers</h3>
                        <span>View Recipes</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="#">
                <div class="categories-image-div">
                    <img class="img-fluid" src="{{ asset('images/salad.jpg') }}" alt="">
                    <div class="categories-text-overlay">
                        <h3>Salads</h3>
                        <span>View Recipes</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#">
                <div class="categories-image-div">
                    <img class="img-fluid" src="{{ asset('images/soup.jpg') }}" alt="">
                    <div class="categories-text-overlay">
                        <h3>Soups</h3>
                        <span>View Recipes</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#">
                <div class="categories-image-div">
                    <img class="img-fluid" src="{{ asset('images/breakfast.jpg') }}" alt="">
                    <div class="categories-text-overlay">
                        <h3>Breakfast</h3>
                        <span>View Recipes</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection
