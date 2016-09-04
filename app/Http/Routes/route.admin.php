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
    Route::resource('screenshot-categories', 'ScreenshotCategoriesController');
    Route::resource('specification-categories', 'SpecificationCategoriesController');

    Route::resource('specifications', 'SpecificationsController');
    Route::resource('announcements', 'AnnouncementsController');
    Route::resource('sliders', 'SlidersController');
    Route::resource('news', 'NewsController');
    Route::resource('videos', 'VideosController');
    Route::resource('tags', 'TagsController');
    Route::resource('warranties', 'WarrantiesController');
    Route::resource('lmi-sessions', 'LmiSessionsController');
    Route::resource('commendations', 'CommendationsController');
    Route::resource('schedules', 'SchedulesController');
    Route::resource('screenshots', 'ScreenshotsController');
    Route::resource('footers', 'FootersController');
    
    Route::post('feedbacks/export', 'FeedbacksController@export');
    Route::resource('feedbacks', 'FeedbacksController');

    Route::resource('supervisor-passwords', 'SupervisorPasswordsController');
    Route::resource('agreements', 'AgreementsController');
    Route::resource('agreement-categories', 'AgreementCategoriesController');
    
    Route::resource('questions/products', 'QuestionsProductsController');
    Route::resource('questions', 'QuestionsController');

    // Route::resource('procedures/{id}/steps', 'ProcedureStepsController');
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
    Route::resource('products/{id}/specifications', 'ProductSpecificationController');
    Route::resource('products', 'ProductsController');
    Route::get('products/{id}/remove-document', 'ProductsController@removeDocument');

    Route::controller('/', 'PagesController');

});