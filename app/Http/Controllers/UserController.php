<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Playlist;


class UserController extends Controller
{
    public function auth(){
        $isAdmin = session('isAdmin'); 
        if($isAdmin == true){
            $userName = session('adminUserName');
        }else{
            $userName = session('userUserName');
        }
        if($userName == null){
            return false;
        }else{
            return true;
        }
    
    }
    public function userProfile(){
        if($this->auth() == false){
            return view("pages/admin/loginAdmin-midterm-seg-66");
        }else{
            return view("pages/user/userProfile-midterm-seg-66");
        }
    }

    public function addUserPage(){
        if($this->auth() == false){
            return view("pages/admin/loginAdmin-midterm-seg-66");
        }else{
            $admin = Admin::get();
            return view("pages/user/addUser-midterm-seg-66", compact('admin'));
        }
    }

    public function addUser(Request $request){

        if(request()->profilePicture){
            $profile_picture = time(). "." . request()->profilePicture->getClientOriginalExtension(); 
            request()->profilePicture->move(public_path("images/profilePictures"), $profile_picture);
        }
        if(request()->coverPicture){
            $cover_picture = time(). "." . request()->coverPicture->getClientOriginalExtension(); 
            request()->coverPicture->move(public_path("images/coverPictures"), $cover_picture);
        }


        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'userName' => 'required | unique:users',
            'email' => 'required | unique:users',
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
            if(!empty($profile_picture)){
                $user->profilePicture = $profile_picture;
            }    
            if(!empty($cover_picture)){
                $user->coverPicture = $cover_picture;
            }
            $user->phone = $request->phone;
            $user->adminUserName = $request->adminUserName;
            $user->isAdmin = false;

            $user->save();

            return redirect()->back()->with("success","User account created successfully");
        }else{
            return redirect()->back()->with("failed","Password mismatch");
        }

    }

    public function signInUserPage(Request $request){
    return view("pages/user/signInUser-miderm-seg-66");
    }
      

    public function signInUserFunction(Request $request){
      
        $request->validate([
            'userUserName' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->userName = $request->userUserName;
        $user->password = $request->password;
        $userSignIn = $user->where('email','=', $user->userName)
                              ->orWhere('userName', $user->userName)
                              ->where('password','=', $user->password)
                              ->first();

        if($userSignIn != null && ($userSignIn->password == $request->password)){
            $userData = $request->input();
            $request->session()->put('userUserName', $userData['userUserName']);
            $request->session()->put('userAdminsUserName', $userSignIn['adminUserName']);
            $request->session()->put('userProfilePicture', $userSignIn['profilePicture']);
            $request->session()->put('userCoverPicture', $userSignIn['coverPicture']);
            $request->session()->put('isAdmin', 0);
            return redirect("/user-profile/{$user->userName}");
        }else{
            return redirect()->back()->with("failed","Email or password incorrect");
        }

    }

    public function listUsers(){
        if($this->auth() == false){
            return view("pages/admin/loginAdmin-midterm-seg-66");
        }else{
            $data = User::get();
            return view("pages/user/listUser-midterm-seg-66", compact('data'));
        }
    }

    function signOut(){
        if(session()->has("userUserName")){
            session()->pull("userUserName");
        }
        return redirect("/sign-in-user");
    }
}
