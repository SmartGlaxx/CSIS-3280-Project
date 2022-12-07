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
            'X-RapidAPI-Key' => 'd85143bf50msh97bf77689c9bb63p1e7484jsn68d0399f70d8'
        ])->get('https://netflix54.p.rapidapi.com/search/?query=stranger&offset=0&limit_titles=200&limit_suggestions=20', 
        ['query' => "*"]);
    

    $playlistData = Playlist::where('id','=', $playlistId)
                            ->where('adminUserName','=', $admin)
                            ->first();  
    $playlist = new Playlist();
    $currentPlaylistData = $playlist->where('id',$playlistId)->first();
    $request->session()->put('currentPlaylistData', $currentPlaylistData);
    $request->session()->put('currentThemeColor', $themeColor);
    
    return view("pages/movie/list-movies-seg-66")->with(['movies'=> json_decode($movies, true), 'playlistData'=> $playlistData]);

    }

    public function addMovieToPlaylistPage($id, $admin, Request $request){
        $request->session()->put('playlistId', $id);
        return view("pages/movie/list-movies-seg-66")->with('playlistId',$id);
    }
    
}
