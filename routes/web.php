<?php

use Illuminate\Support\Facades\Route;

//三静态页面 主页，帮助页，关于页
Route::get('/', 'StaticPagesController@home')->name('home');;
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');;

//用戶路由
Route::resource('users', 'UsersController');

//会话控制器
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

//邮件激活路由
Route::get('confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//密码重置路由
Route::group(['prefix'=>'password','namespace'=>'Auth'],function(){
Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('reset', 'ResetPasswordController@reset')->name('password.update');
});
//创建微博
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

//粉丝页面和关注人数
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

//关注和取消关注
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');