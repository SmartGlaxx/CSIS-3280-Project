<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function adminProfile(){
        return view("pages/admin/adminProfile-midterm-seg-66");
    }

    public function addAdminPage(){
        return view("pages/admin/addAdmin-midterm-seg-66");
    }

    public function addAdmin(Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'adminUserName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'comfirmPassword' => 'required',
        ]);
        $admin = new Admin();
        if($request->comfirmPassword == $request->password){
            $admin->firstName = $request->firstName;
            $admin->lastName = $request->lastName;
            $admin->adminUserName = $request->adminUserName;
            $admin->email = $request->email;
            $admin->password = $request->password;
            $admin->phone = $request->phone;
            if($request->isAdmin == "true"){
                $admin->isAdmin = true;
            }

            $admin->save();
            return redirect()->back()->with("success", "Admin addedd succesfully");
        }else{
            return redirect()->back()->with("failed", "Password mismatch. Please try again");
        }

        
    }

    public function listAdmins(){
        $data = Admin::get();
        return view("pages/admin/listAdmins-midterm-seg-66", compact('data'));
    }


    public function signInAdminPage(){
        return view("pages/admin/loginAdmin-midterm-seg-66");
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
                              ->where('password','=', $admin->password)
                              ->get();

        if($adminSignIn){
            $userData = $request->input();
            $request->session()->put('adminUserName', $userData['adminUserName']);
            return redirect("/admin-profile/{$admin->adminUserName}");
        }else{
            return redirect()->back()->with("failed","Email or password incorrect");
        }

    }
}
