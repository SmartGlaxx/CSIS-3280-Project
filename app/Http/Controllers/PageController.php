<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Review;

class PageController extends Controller
{
    public function showLandingPage(){

        return view("pages/pages/home-page");
    }

    public function showAboutPage(){

        return view("pages/pages/about-page");
    }
    public function showPointsPage(){

        return view("pages/pages/view-card-page");
    }
    
}
