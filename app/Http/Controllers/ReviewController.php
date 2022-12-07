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
		    'X-RapidAPI-Key' => 'd85143bf50msh97bf77689c9bb63p1e7484jsn68d0399f70d8'
        ])->get('https://netflix54.p.rapidapi.com/search/?query=stranger&offset=0&limit_titles=200&limit_suggestions=20', 
        ['query' => "*"]);

        $allMovies = array();
        $movieData = json_decode($movies, true)["titles"];
        $movieTilte = "";
        $movieImage = "";
        for($i = 1; $i < 50; $i++){
            $allMovies[] = $movieData[$i]["jawSummary"];
                foreach($allMovies as $movie){
                    if($movie["id"] == $id){
                        $movieTilte = $movie["title"];
                        $movieImage = $movie["backgroundImage"]["url"];
                    }
                }
        }
        return view("pages/reviews/reviews-seg-66")->with(["movieID" => $id,
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

        return view("pages/reviews/update-user-reviews-seg-66")->with('review', $review);

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
