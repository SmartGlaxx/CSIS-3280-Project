<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
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


    public function adminProfile(){
        if($this->auth() == false){
            return view("pages/admin/sign-in-admin-seg-66");
        }else{
            return view("pages/admin/admin-profile-seg-66");
        }

    }

    public function registerAdminPage(){
        if(session("userUserName")){ 
            $username = session("userUserName");
            return redirect("/user-profile-seg-66/" . $username );
        } else if(session("adminUserName")){ 
            $username = session("adminUserName");
            return redirect("/admin-profile-seg-66/" . $username );
        } else{ 
        return view("pages/admin/register-admin-seg-66");
        }
    }

    public function registerAdmin(Request $request){

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
            'adminUserName' => 'required | unique:admins',
            'email' => 'required | unique:admins',
            'password' => 'required',
            'comfirmPassword' => 'required',
            'phone' => 'required'
        ]);
        $admin = new Admin();
        if($request->comfirmPassword == $request->password){
            $admin->firstName = $request->firstName;
            $admin->lastName = $request->lastName;
            $admin->adminUserName = $request->adminUserName;
            $admin->email = $request->email;
            $hashed_password = password_hash($request->password, PASSWORD_DEFAULT);
            $admin->password = $hashed_password;
            if(!empty($profile_picture)){
                $admin->profilePicture = $profile_picture;
            }    
            if(!empty($cover_picture)){
                $admin->coverPicture = $cover_picture;
            }
            $admin->phone = $request->phone;
            $admin->isAdmin = true;
            

            $admin->save();
            return redirect()->back()->with("success", "Admin registered succesfully");
        }else{
            return redirect()->back()->with("failed", "Password mismatch. Please try again");
        }

        
    }

    public function listAdmins(){
        if($this->auth() == false){
            return view("pages/admin/sign-in-admin-seg-66");
        }else{
            $data = Admin::get();
            return view("pages/admin/list-admins-seg-66", compact('data'));
        }
        
    }


    public function signInAdminPage(){
        if(session("userUserName")){ 
            $username = session("userUserName");
            return redirect("/user-profile-seg-66/" . $username );
        } else if(session("adminUserName")){ 
            $username = session("adminUserName");
            return redirect("/admin-profile-seg-66/" . $username );
        } else{ 
        return view("pages/admin/sign-in-admin-seg-66");
        }
    }

    public function signInAdmin(Request $request){
        $request->validate([
            'adminUserName' => 'required',
            'password' => 'required'
        ]);
        $admin = new Admin();
        $admin->adminUserName = $request->adminUserName;
        $admin->password = $request->password;
        $adminSignIn = $admin->where('email','=', $admin->adminUserName)
                              ->orWhere('adminUserName', $admin->adminUserName)
                              ->first();
        
        if($adminSignIn != null && (password_verify($request->password, $adminSignIn["password"]))){
            $userData = $request->input();
            $request->session()->put('adminUserName', $userData['adminUserName']);
            $request->session()->put('adminProfilePicture', $adminSignIn['profilePicture']);
            $request->session()->put('adminCoverPicture', $adminSignIn['coverPicture']);
            $request->session()->put('isAdmin', 1);

            if(session()->has("userUserName")){
                session()->pull("userUserName");
            }

            return redirect("/admin-profile-seg-66/{$admin->adminUserName}");
        }else{
            return redirect()->back()->with("failed","Email or password incorrect");
        }

    }


    public function updateProfile($adminUserName){
        $adminData = Admin::where('adminUserName', '=', $adminUserName)->first();

        return view("pages/admin/update-admin-profile-seg-66")
        ->with(['id' => $adminData["id"],'firstName' => $adminData["firstName"],'lastName' => $adminData["lastName"]
        ,'adminUserName' => $adminData["adminUserName"],'email' => $adminData["email"],'phone' => $adminData["phone"]] );

    }

    public function updateProfileFunction($adminID, Request $request){
        $admin = Admin::where('id','=',$adminID)->first();

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
            $profilePicture = $admin->profilePicture;
        }   
        if(!empty($cover_picture)){
            $coverPicture = $cover_picture;
        }else{
            $coverPicture = $admin->coverPicture;
        }

        $admin = Admin::where('id','=',$adminID)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'profilePicture' => $profilePicture,
            'coverPicture' => $coverPicture
            
        ]);
        
        $request->session()->put('adminProfilePicture', $profilePicture);
        $request->session()->put('adminCoverPicture', $coverPicture);

        return redirect()->back()->with("success", "Profile updated");
    }

    function signOut(){
        if(session()->has("adminUserName")){
            session()->pull("adminUserName");
        }
        return redirect("/");
    }

    function deleteProfileFunction($adminUserName){
        if(session()->has("adminUserName")){
            session()->pull("adminUserName");
        }
        $admin =  Admin::where('adminUserName','=',$adminUserName)->delete();

        return redirect("/register-admin-seg-66")->with("success","Profile deleted. Create a new acount below");
    }
    



}
