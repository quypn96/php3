<?php

Route::group(['middleware'=>'checkrole'],function(){
	Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('checkrole');
	Route::group(['prefix' => 'bai-viet'], function(){

	//danh sach bai viet
	Route::get('/', 'PostController@index')->name('post.list');
	
	Route::get('xoa/{id}', 'PostController@remove')->name('post.delete');

	Route::get('xoalist/', 'PostController@destroy')->name('post.destroy');
	
	Route::get('them', 'PostController@add')->name('post.add');
	
	Route::get('sua/{id}', 'PostController@edit')->name('post.edit');

	Route::post('save', 'PostController@save')->name('post.save');

});
Route::group(['prefix' => 'danh-muc'], function(){

	//Danh muc
	Route::get('/', 'CategoryController@index')->name('cate.list');
	
	Route::get('xoa/{id}', 'CategoryController@remove')->name('cate.delete');
	
	Route::get('them', 'CategoryController@add')->name('cate.add');
	
	Route::get('sua/{id}', 'CategoryController@edit')->name('cate.edit');

	Route::post('save', 'CategoryController@save')->name('cate.save');

});
});

Route::group(['middleware'=> 'checkadmin'],function(){

	Route::group(['prefix' => 'tai-khoan'], function(){

	Route::get('/', 'UsersController@index')->name('user.list');
	
	Route::get('xoa/{id}', 'UsersController@remove')->name('user.delete');
	
	Route::get('them', 'UsersController@add')->name('user.add');
	
	Route::get('sua/{id}', 'UsersController@edit')->name('user.edit');

	Route::post('save', 'UsersController@save')->name('user.save');

});
});

Route::group(['middleware'=>'checkrole'],function(){
	Route::group(['prefix'=>'profile'],function(){
		Route::get('/', 'UsersController@profile')->name('user.profile');
		Route::get('edit/{id}', 'UsersController@editProfile')->name('user.profile.edit');
		Route::post('save', 'UsersController@saveProfile')->name('user.profile.save');
	});
});



 ?>