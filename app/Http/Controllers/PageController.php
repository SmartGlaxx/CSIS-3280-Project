<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Review;

class PageController extends Controller
{
    public function showLandingPage(){

        return view("pages/pages/homepage");
    }

    public function showAboutPage(){

        return view("pages/pages/aboutpage");
    }
    public function showPointsPage(){

        return view("pages/pages/pointspage");
    }
    
}
