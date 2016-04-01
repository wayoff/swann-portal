<?php


Route::group([
        'middleware' => 'auth',
        'namespace'  => 'Admin',
        'prefix'     => 'admin'
], function () {

    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('sliders', 'SlidersController');
    
    Route::controller('/', 'PagesController');

});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('pages.index');
});




Route::auth();

Route::get('/home', 'HomeController@index');
