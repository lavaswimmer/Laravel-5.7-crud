<?php

Auth::routes();

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {

    Route::resources(['posts' => 'PostController']);

    Route::resources(['profile' => 'ProfileController']);

});