<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostsController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');

Auth::routes();

Route::middleware(['auth'])->group(function()
{
    Route::resource('categories', 'CategoriesController');
    Route::get('/trashed-categories', 'CategoriesController@trashed')->name('trashed-cat');
    Route::resource('posts', 'PostsController');
    Route::resource('tags', 'TagsController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/trashed/posts', 'PostsController@trashed')->name('trashed-posts');
    Route::get('/restore/posts/{post}', 'PostsController@restore')->name('restore');
    
});

        Route::middleware(['auth', 'verifyIsAdmin'])->group(function() {
        Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
        Route::get('users', 'UsersController@index')->name('users.index');
        Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
        Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
   });  



