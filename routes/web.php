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

    Route::get('papers/conference', ['as'=> 'paper.conference','uses' => 'PaperController@conferencePaper']);
    Route::get('papers/journal', ['as'=> 'paper.journal','uses' => 'PaperController@journalPaper']);

    Route::get('category/list', ['as'=> 'category.categoryList','uses' => 'CategoryController@categoryList']);
    Route::get('category/{cat_meta_data}/paper', ['as'=> 'paper.categoryWisePaper','uses' => 'PaperController@categoryWisePaper']);
    Route::get('user/profile/{user_meta_data}/paper', ['as'=> 'paper.userWisePaper','uses' => 'PaperController@userWisePaper']);






    Route::get('allUser', ['as'=> 'admin.user.allUser','uses' => 'UserController@allUser']);
    Route::get('allUser/{id}', ['as'=> 'admin.user.delete','uses' => 'UserController@deleteUser']);


    ##
    Route::get('mypaper', ['as' => 'paper.index', 'uses' => 'PaperManageController@index']);
    Route::get('mypaper/create', ['as' => 'paper.create', 'uses' => 'PaperManageController@create']);
    Route::post('mypaper', ['as' => 'paper.store', 'uses' => 'PaperManageController@store']);
    Route::get('mypaper/{paper_meta_data}/edit', ['as' => 'paper.edit', 'uses' => 'PaperManageController@edit']);
    Route::put('mypaper/{paper_meta_data}/update', ['as' => 'paper.update', 'uses' => 'PaperManageController@update']);
    Route::delete('mypaper/{paper_meta_data}', ['as' => 'paper.delete', 'uses' => 'PaperManageController@destroy']);



    Route::get('category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
    Route::post('category', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
    Route::get('category/{cat_meta_data}/edit', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
    Route::put('category/{cat_meta_data}/update', ['as' => 'category.update', 'uses' => 'CategoryController@update']);
    Route::delete('category/{cat_meta_data}', ['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);


});









Route::get('test', function (){
    $cat = \App\Category::pluck('id');

});