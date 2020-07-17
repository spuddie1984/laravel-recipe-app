# RESTful-recipe-book-app
Using the [Laravel from scratch](https://laracasts.com/series/laravel-6-from-scratch/) series on laracast.

A RESTful Recipe App to collect my favourite recipes so i can view them for later use

## App Features

- User Authentication, Users can save and edit their own recipes.
- Obviously read, edit, delete and add recipe functionality (RESTful)

### Landing Page Features

- Recently Added Recipes (by means of pictures) 
- Recipe Categories
- Search Functionality

### Logged In User Features

- Add personalized notes to recipes added by the user
- delete update recipes added by the user
- add new recipes

### Databases

- Users DB - Already setup automatically by laravel auth command (add later)
- Recipes DB - title, ingredients, method and notes, photo of recipe.
- Category DB - Category, description, (relation to recipes)

Will add more features as the app grows

## RESTful Recipe Routes

** Recipe routes are only accessible by a logged In User **

| name         |       url        | verb  |            Decription                    |
|--------------|------------------|-------|------------------------------------------|
|APP INDEX     | /                | GET   | App Home Page                            |
|RECIPE INDEX  | /recipes         | GET   | Displays a list of all recipes           |
|NEW           | /recipes/new     | GET   | Displays a form to add a new recipe      |
|CREATE        | /recipes         | POST  | Add a new recipe to the DB               | 
|SHOW          | /recipes/:id     | GET   | Show info about one recipe only          |
|EDIT          | /recipes/:id/edit| GET   | Show edit form for one recipe            |
|UPDATE        | /recipes/:id     | PUT   | Update a recipe, then redirect somewhere |
|DESTROY       | /recipes/:id     | DELETE| Delete a recipe, then redirect somewhere |

#### 1st Commit - DB Migrations and Factories

- Setup recipes schema/migration
- Setup Factories to seed the user and recipe DB's
- Add Auth to recipes controller
- Change auth redirect page default
- Add Relationships to Users table and Recipes table
- Start adding recipe routes to routes file
- Add recipe index view
- Add Font Awesome via npm

#### 2nd Commit - Recipe CRUD Routes and Views

- Create CRUD routes and views (Create, Read, Update, Destroy)
- Add custom tagged inputs for the recipe create and update views
- Add custom js script to implement tagged inputs
- Image upload ability
- Add bootstrap scss files 
- Add images to public folder for homepage styling
- style Home page (add navbar and footer)
- style recipe index view 
- style create edit views
