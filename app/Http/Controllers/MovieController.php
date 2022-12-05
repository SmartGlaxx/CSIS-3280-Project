<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Playlist;

class MovieController extends Controller
{
   
    public function getMovies($playlistId, $themeColor, $admin, Request $request){
    
        $movies = Http::withHeaders([
            'X-RapidAPI-Host' => 'netflix54.p.rapidapi.com',
            'X-RapidAPI-Key' => 'd5d8e539c5msh99131e6fba4c1a6p1dad82jsn2dfec7e9a0b2'
        ])->get('https://netflix54.p.rapidapi.com/search/?query=stranger&offset=0&limit_titles=200&limit_suggestions=20', 
        ['query' => "*"]);
    

    $playlistData = Playlist::where('id','=', $playlistId)
                            ->where('adminUserName','=', $admin)
                            ->first();  
    $playlist = new Playlist();
    $currentPlaylistData = $playlist->where('id',$playlistId)->first();
    $request->session()->put('currentPlaylistData', $currentPlaylistData);
    $request->session()->put('currentThemeColor', $themeColor);
    
    return view("pages/movie/list-movies")->with(['movies'=> json_decode($movies, true), 'playlistData'=> $playlistData]);

    }

    public function addMovieToPlaylistPage($id, $admin, Request $request){
        $request->session()->put('playlistId', $id);
        return view("pages/movie/list-movies")->with('playlistId',$id);
    }
    


    // $playlist = new Playlist();
    //     $playlist->playlistName = 

    //     $table->string('playlistName');
    //         $table->string('adminUserName');
    //         $table->string('themeColor');
}
