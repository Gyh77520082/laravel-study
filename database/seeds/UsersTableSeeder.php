<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    
    public function run(){
    $users = factory(User::class)->times(50)->make();
    $data = array_map(function($u){
         $u['email_verified_at'] = date('Y-m-d H:i:s', strtotime($u['email_verified_at']));
         $u['created_at'] = date('Y-m-d H:i:s', strtotime($u['created_at']));
         $u['updated_at'] = date('Y-m-d H:i:s', strtotime($u['updated_at']));
         return $u;
     }, $users->makeVisible(['password','remeber_token'])->toArray() );
    User::insert($data);

        $user = User::find(1);
        $user->name = '郭源泓';
        $user->email = '77520082@qq.com';
        $user->is_admin = true;
        $user->save();
    }
}