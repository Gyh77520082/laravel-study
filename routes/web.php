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