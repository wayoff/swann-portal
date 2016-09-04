<?php

Route::group(['namespace' => 'API', 'prefix' => 'api'], function() {
    Route::resource('products', 'ProductsController', ['only' => 'index']);
    Route::resource('lmi-sessions', 'LmiSessionsController', ['only' => ['index', 'store']]);
    Route::controller('agreements', 'AgreementsController');
    Route::post('feedbacks', 'FeedbacksController@store');
    // Route::resource('decisions', 'DecisionsController',
    //         ['only' => ['index', 'store', 'show']]
    // );
});