<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('login', 'Auth\LoginController@login')->name('login');

Route::post('login', 'Auth\LoginController@postLogin');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('forbiden',function(){
	return view('forbiden');
})->name('forbiden');

Route::get('/','HomeController@index')->name('homepage');

Route::get('/{slug_category}', 'HomeController@getAllPostsByCategoryId')->where('slug_category', '[A-Za-z]+')->name('post.by.cate');

Route::get('/{slug_category}/{slug_post}', 'HomeController@detailPostWithCategory');

Route::get('/{slug_post}','HomeController@detail');




