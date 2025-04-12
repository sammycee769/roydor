<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
 public function register(Request $request){
     
     $validator = Validator::make($request->all(),[
         'name' => 'required|string|max:10',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|min:8'
    ]);
    
    if($validator -> fails()) {
        return $validator->errors();
    }

    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = $request->input('password');
    $user->save();
    return $user;
}   
}
