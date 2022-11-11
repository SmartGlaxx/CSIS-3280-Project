<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class UserController extends Controller
{
    public function addUserPage(){
        $admin = Admin::get();
        return view("pages/user/addUser-midterm-seg-66", compact('admin'));
    }

    public function addUser(Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'userName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'comfirmPassword' => 'required',
            'adminUserName' => 'required',
        ]);

        if($request->comfirmPassword == $request->password){
            $user = new User();
            $user->firstName = $request->firstName;
            $user->lastName = $request->lastName;
            $user->userName = $request->userName;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone = $request->phone;
            $user->adminUserName = $request->adminUserName;
            
            $user->save();

            return redirect()->back()->with("success","User account created successfully");
        }else{
            return redirect()->back()->with("failed","Password mismatch");
        }

    }

    public function listUsers(){
        $data = User::get();
        return view("pages/user/listUser-midterm-seg-66", compact('data'));
    }
}
