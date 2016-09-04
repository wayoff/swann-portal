<?php

Route::auth();
Route::resource(
    'categories/{id}/products',
    'CategoryProductsController',
    ['only' => ['index', 'show']]
);
Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);
Route::resource('products', 'ProductsController', ['only' => ['index']]);
Route::resource('keywords', 'KeywordsController', ['only' => ['index']]);

Route::get('/pfsense', function() {
    return view('pfsense');
});

Route::controller('/', 'PagesController');
