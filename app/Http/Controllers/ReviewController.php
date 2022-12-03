<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Review;

class ReviewController extends Controller
{
    public function showReviews($id){
        $reviews = Review::where('movieID','=',$id)->get();
        
        $movies = Http::withHeaders([
            'X-RapidAPI-Host' => 'netflix54.p.rapidapi.com',
		    'X-RapidAPI-Key' => 'd5d8e539c5msh99131e6fba4c1a6p1dad82jsn2dfec7e9a0b2'
        ])->get('https://netflix54.p.rapidapi.com/search/?query=stranger&offset=0&limit_titles=200&limit_suggestions=20', 
        ['query' => "*"]);

        $allMovies = array();
        $movieData = json_decode($movies, true)["titles"];
        $movieTilte = "";
        $movieImage = "";
        for($i = 0; $i < 50; $i++){
            $allMovies[] = $movieData[$i]["jawSummary"];
                foreach($allMovies as $movie){
                    if($movie["id"] == $id){
                        $movieTilte = $movie["title"];
                        $movieImage = $movie["backgroundImage"]["url"];
                    }
                }
        }
        return view("pages/reviews/reviews")->with(["movieID" => $id,
         'reviews' => $reviews, 'movieImage' =>$movieImage, 'title' => $movieTilte]);
    }

    public function postReview(Request $request){

        $request->validate([
            'title' => 'required',
            'post' => 'required',
            'username' => 'required',
            'movieID' => 'required',
        ]);

        $moviewReview = new Review();
        $moviewReview->title = $request->title;
        $moviewReview->post = $request->post;
        $moviewReview->reviewer = $request->username;
        $moviewReview->movieID = $request->movieID;
        
        $moviewReview->save();

        return redirect()->back()->with("success","Review saved");
    }


    public function editReview($id, $username){

        $review = Review::where('id','=',$id)->first();

        return view("pages/reviews/update-user-reviews")->with('review', $review);

    }


    public function updateReview($id, $username, Request $request){

        $request->validate([
            'title' => 'required',
            'post' => 'required'
        ]);

        Review::where('id', '=', $id)->update([
            'title' => $request->title,
            'post' => $request->post,
        ]);

        return redirect()->back()->with("updated", "Review updated");
    }

    public function deleteReview($id){

        Review::where('id','=',$id)->delete();

        return redirect()->back()->with("deleted", "Review deleted");
    }
    
}
