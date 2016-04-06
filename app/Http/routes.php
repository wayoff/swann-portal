<?php


Route::group([
        'middleware' => 'auth',
        'namespace'  => 'Admin',
        'prefix'     => 'admin'
], function () {
    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('sliders', 'SlidersController');
    Route::resource('news', 'NewsController');
    Route::resource('videos', 'VideosController');
    Route::resource('questions', 'QuestionsController');

    Route::resource('products/{id}/procedures/{procedureId}/steps', 'ProductsProceduresStepsController');
    Route::resource('products/{id}/procedures', 'ProductsProceduresController');
    Route::resource('products/{id}/questions', 'ProductsQuestionsController');
    Route::resource('products/{id}/videos', 'ProductsVideosController');
    Route::resource('products', 'ProductsController');

    Route::controller('/', 'PagesController');

});

Route::get('supported-formats', function() {
    $formats = collect(FFMPEG::getSupportedFormats());

    dd($formats->toArray());
});

Route::auth();
Route::resource(
    'categories/{id}/products',
    'CategoryProductsController',
    ['only' => ['index', 'show']]
);
Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);
Route::resource('products', 'ProductsController', ['only' => ['index']]);
Route::controller('/', 'PagesController');
