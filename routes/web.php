<?php

Route::get('/', 'HomeController@index')->name('index');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('profile', ['as'=> 'profile.index','uses' => 'ProfileController@index']);
    Route::get('user/profile/{user_meta_data}', ['as'=> 'profile.userProfile','uses' => 'ProfileController@userProfile']);
    Route::put('update-profile', ['as'=> 'profile.updateInfo','uses' => 'ProfileController@updateInfo']);
    Route::put('photo-update', ['as'=> 'profile.updatePhoto','uses' => 'ProfileController@updatePhoto']);


    Route::get('faculty', ['as'=> 'user.faculty','uses' => 'MembersController@facultyMembers']);
    Route::get('members', ['as'=> 'user.members','uses' => 'MembersController@otherMembers']);


    Route::get('papers', ['as'=> 'paper.allPaperList','uses' => 'PaperController@allPaperList']);
    Route::get('papers', ['as'=> 'paper.paperSearch','uses' => 'PaperController@paperSearch']);
    Route::get('papers/details/{paper_meta_data}', ['as'=> 'paper.paperDetails','uses' => 'PaperController@paperDetails']);
    Route::get('papers/archive/{month}/{year}', ['as'=> 'paper.archivedPaper','uses' => 'PaperController@archivedPaper']);

    Route::get('category/{cat_meta_data}/paper', ['as'=> 'paper.categoryWisePaper','uses' => 'PaperController@categoryWisePaper']);
    Route::get('user/profile/{user_meta_data}/paper', ['as'=> 'paper.userWisePaper','uses' => 'PaperController@userWisePaper']);

});









Route::get('test', function (){
    $cat = \App\Category::pluck('id');
    return $rand_keys = array_random($cat->toArray(),3);
});