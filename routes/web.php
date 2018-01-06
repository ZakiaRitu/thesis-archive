<?php

Route::get('/', 'HomeController@index')->name('index');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('profile', ['as'=> 'profile.index','uses' => 'ProfileController@index']);
    Route::get('user/profile/{id}', ['as'=> 'profile.userProfile','uses' => 'ProfileController@userProfile']);
    Route::put('update-profile', ['as'=> 'profile.updateInfo','uses' => 'ProfileController@updateInfo']);
    Route::put('photo-update', ['as'=> 'profile.updatePhoto','uses' => 'ProfileController@updatePhoto']);
});









Route::get('test', function (){
    $cat = \App\Category::pluck('id');
    return $rand_keys = array_random($cat->toArray(),3);
});