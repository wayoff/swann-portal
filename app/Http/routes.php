<?php

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::auth();

Route::get('/home', 'HomeController@index');
