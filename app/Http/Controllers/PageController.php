<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Review;
use Session;

class PageController extends Controller
{
    public function showLandingPage(){

        return view("pages/pages/home-page-seg-66");
    }

    public function showAboutPage(){

        return view("pages/pages/about-page-seg-66");
    }
    public function showViewcardPage(){

        return view("pages/pages/view-card-page-seg-66");
    }
}
