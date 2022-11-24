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
    public function userProfile($userName){
        // $userData = User::where('userName','=',$userName)->first();

        if($this->auth() == false){
            return view("pages/user/signInUser-miderm-seg-66");
        }else{
            return view("pages/user/userProfile-midterm-seg-66");
        }
    }

    public function addUserPage(){
        $admin = Admin::get();
        return view("pages/user/addUser-midterm-seg-66", compact('admin'));
    
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
            'adminUserName' => 'required',
            'phone' => 'required',
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

    public function updateProfile($userName){
        $userData = User::where('userName', '=', $userName)->first();
        $adminsData = Admin::get();
        if($userData){
            return view("pages/user/update-user-profile")
            ->with(['id' => $userData["id"],'firstName' => $userData["firstName"],'lastName' => $userData["lastName"]
            ,'userUserName' => $userData["userUserName"],'email' => $userData["email"],'phone' => $userData["phone"]
            ,'admins' => $adminsData,'profilePicture' => $userData["profilePicture"],'coverPicture' => $userData["coverPicture"]] );
        }else{
            return redirect()->back()->with("failed", "Account not found. Please create an account here.");
        }

    }

    public function updateProfileFunction($userID, Request $request){
        $user = User::where('id','=',$userID)->first();

        if(request()->profilePicture){
            $profile_picture = time(). "." . request()->profilePicture->getClientOriginalExtension(); 
            request()->profilePicture->move(public_path("images/profilePictures"), $profile_picture);
        }
        if(request()->coverPicture){
            $cover_picture = time(). "." . request()->coverPicture->getClientOriginalExtension(); 
            request()->coverPicture->move(public_path("images/coverPictures"), $cover_picture);
        }
        if(!empty($profile_picture)){
            $profilePicture = $profile_picture;
        }else{
            $profilePicture = $user->profilePicture;
        }   
        if(!empty($cover_picture)){
            $coverPicture = $cover_picture;
        }else{
            $coverPicture = $user->coverPicture;
        }

        $admin = User::where('id','=',$userID)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'profilePicture' => $profilePicture,
            'coverPicture' => $coverPicture,
            'adminUserName' => $request->adminUserName
        ]);
        
        $request->session()->put('userProfilePicture', $profilePicture);
        $request->session()->put('userCoverPicture', $coverPicture);
        $request->session()->put('userAdminsUserName', $request->adminUserName);

        return redirect()->back()->with("success", "Profile updated");
    }


    function signOut(){
        if(session()->has("userUserName")){
            session()->pull("userUserName");
        }
        return redirect("/sign-in-user");
    }


    function deleteProfileFunction($userUserName){
        if(session()->has("userUserName")){
            session()->pull("userUserName");
        }
        $admin =  User::where('userName','=',$userUserName)->delete();

        return redirect("/add-user")->with("success","Profile deleted. Create a new acount below");
    }


}

