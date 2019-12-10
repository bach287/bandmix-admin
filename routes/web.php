<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/test', function (){
	return view('layouts.master');
});
Route::middleware(['auth'])->group(function () {
    //Route news
	Route::get('news/getData','NewsController@getData')->name('news.data');
	Route::resource('news','NewsController');
	//Route categories
	Route::get('categories/getData','CategoriesController@getData')->name('categories.data');
	Route::resource('/categories','CategoriesController');
	//Route members
	Route::get('members/getData','MembersController@getData')->name('members.data');
	Route::resource('/members','MembersController');
	//Route bands
    Route::get('bands/getData','BandsController@getData')->name('bands.data');
    Route::resource('/bands','BandsController');
    //Route event
    Route::get('events/getData','EventsController@getData')->name('events.data');
    Route::resource('/events','EventsController');
    //route book

    Route::get('books/getData','BooksController@getData')->name('books.data');
    Route::resource('/books','BooksController');
    Route::POST('/books/{id}','BooksController@update')->name('book.update');
    //route feedback
    Route::get('feedback/getData','FeedbackController@getData')->name('feedback.data');
    Route::resource('/feedback','FeedbackController');
    //route statistic
    Route::get('/statistic','StatisticsController@index')->name('statistic.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
