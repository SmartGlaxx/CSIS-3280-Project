<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function createPlaylistPage(){
        return view("pages/playlist/add-playlist-midterm-seg-66");
    }

    public function createPlaylist(Request $request){
        $request->validate([
            'playlistName' => 'required',
            'adminUserName' => 'required',
            'themeColor' => 'required'
        ]);
        $playList = new Playlist();
        $playList->playlistName = $request->playlistName;
        $playList->adminUserName = $request->adminEmail; 
        $playList->themeColor = $request->themeColor;

        $playList->save();

        return redirect()->back()->with('success',"Playlist {$playList->playlistName} created");

    }

    public function listAdminPlaylistPage($adminUserName){
        $playlist = Playlist::where('adminUserName', $adminUserName)->get();

        return view('/pages/playlist/list-playlist-midterm-seg-66')->with('playlists', json_decode($playlist, true));
    }

    public function addMovieToPlaylist($id, $playlistId, $themeColor, $adminUserName, Request $request){
        $playList = Playlist::find($playlistId);

        if(strlen($playList->movieId) > 1){
            $playList->movieId = $playList->movieId . "|" .$id;
        }else{
            $playList->movieId = $id;
        }
        $playList->save();
        return redirect()->back()->with("success","Movie added to playlist");

    }
    
    public function showMoviesInPlayList($playlistId, $playlistColor, $adminUserName){
        $movies = Http::withHeaders([
            'X-RapidAPI-Host' => 'netflix54.p.rapidapi.com',
            'X-RapidAPI-Key' => 'b95f1a2863msh091c2e62f4baa54p12892ejsn0356392970bf'
        ])->get('https://netflix54.p.rapidapi.com/search/?query=stranger&offset=0&limit_titles=200&limit_suggestions=20', 
        ['query' => "*"]);

        $playlistData = Playlist::where('id','=', $playlistId)
                                ->where('adminUserName','=', $adminUserName)
                                ->first(); 

    $allMovies = array();
    $movieData = json_decode($movies, true)["titles"];

    for($i = 0; $i < 50; $i++){
        $allMovies[] = $movieData[$i]["jawSummary"];
    }

    $movieIds = explode("|", $playlistData["movieId"]);

    return redirect()->back()->with(['movieIds'=> $movieIds, 'allMovies'=> $allMovies]);

  }
}
