<?php

Route::get('/', 'HomeController@index')->name('index');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('profile', ['as'=> 'profile.index','uses' => 'ProfileController@index']);
    Route::get('edit-profile', ['as'=> 'profile.edit','uses' => 'ProfileController@edit']);
});






#ffff


Route::get('test', function (){
    $cat = \App\Category::pluck('id');
    return $rand_keys = array_random($cat->toArray(),3);
});