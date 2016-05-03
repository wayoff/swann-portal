<?php


Route::group([
        'middleware' => 'auth',
        'namespace'  => 'Admin',
        'prefix'     => 'admin'
], function () {
    
    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('faq-categories', 'FaqCategoriesController');
    Route::resource('procedure-categories', 'ProcedureCategoriesController');
    Route::resource('policy-categories', 'PolicyCategoriesController');
    Route::resource('sliders', 'SlidersController');
    Route::resource('news', 'NewsController');
    Route::resource('videos', 'VideosController');
    Route::resource('tags', 'TagsController');
    Route::resource('warranties', 'WarrantiesController');
    Route::resource('lmi-sessions', 'LmiSessionsController');

    Route::resource('supervisor-passwords', 'SupervisorPasswordsController');
    Route::resource('agreements', 'AgreementsController');
    
    Route::resource('questions/products', 'QuestionsProductsController');
    Route::resource('questions', 'QuestionsController');

    Route::resource('procedures/{id}/steps', 'ProcedureStepsController');

    Route::get(
        'procedures/{id}/decisions/start',
        'ProcedureDecisionsController@start'
    )->name('admin.procedures.{id}.decisions.start');

    Route::resource('procedures/{id}/decisions', 'ProcedureDecisionsController');

    Route::resource('procedures', 'ProceduresController');

    Route::resource('products/{id}/procedures/{procedureId}/steps', 'ProductsProceduresStepsController');
    Route::resource('products/{id}/procedures', 'ProductsProceduresController');
    Route::resource('products/{id}/photos', 'PhotoProductController');
    Route::resource('products/{id}/questions', 'ProductsQuestionsController');
    Route::resource('products/{id}/videos', 'ProductsVideosController');
    Route::resource('products/{id}/documents', 'ProductsDocumentsController');
    Route::resource('products', 'ProductsController');

    Route::controller('/', 'PagesController');

});

Route::group(['namespace' => 'API', 'prefix' => 'api'], function() {
    Route::resource('products', 'ProductsController', ['only' => 'index']);
    Route::resource('lmi-sessions', 'LmiSessionsController', ['only' => ['index', 'store']]);
    Route::controller('agreements', 'AgreementsController');
    // Route::resource('decisions', 'DecisionsController',
    //         ['only' => ['index', 'store', 'show']]
    // );
});

Route::auth();
Route::resource(
    'categories/{id}/products',
    'CategoryProductsController',
    ['only' => ['index', 'show']]
);
Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);
Route::resource('products', 'ProductsController', ['only' => ['index']]);
Route::resource('keywords', 'KeywordsController', ['only' => ['index']]);
Route::controller('/', 'PagesController');
