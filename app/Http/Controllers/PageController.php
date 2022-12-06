<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Review;
use Session;

class PageController extends Controller
{
    public function showLandingPage(){

        return view("pages/pages/home-page");
    }

    public function showAboutPage(){

        return view("pages/pages/about-page");
    }
    public function showViewcardPage(){

        return view("pages/pages/view-card-page");
    }
    
    public function switchMode(){
        if(Session::has('light-mode')){
            Session::pull('light-mode', "light-mode");
            Session::put('dark-mode', "dark-mode");
        }else{
            Session::pull('dark-mode', "dark-mode");
            Session::put('light-mode', "light-mode");
        }

        return redirect()->back()->with("sucesss", "Mode changed");
    }
}
