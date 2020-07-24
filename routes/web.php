<?php

use Illuminate\Support\Facades\Route;

//三静态页面 主页，帮助页，关于页
Route::get('/', 'StaticPagesController@home')->name('home');;
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');;
//注册页面
Route::get('signup', 'UsersController@create')->name('signup');
