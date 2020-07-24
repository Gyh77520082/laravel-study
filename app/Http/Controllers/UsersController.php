<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
	//展示頁
	 public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    //返回注册页面
    public function create(){
    	return view('users.create');
    }
    
    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
    	]);
    return;
    }
}