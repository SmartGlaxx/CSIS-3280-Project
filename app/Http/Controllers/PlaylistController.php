<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function auth(){
        $isAdmin = session('isAdmin'); 
        if($isAdmin == true){
            $userName = session('adminUserName');
        }else{
            $userName = session('userUserName');
        }
        if($userName == null){
            return false;
        }else{
            return true;
        }
    
    }

    public function createPlaylistPage(){
        if($this->auth() == false){
            return view("pages/admin/loginAdmin-midterm-seg-66");
        }else{
            return view("pages/playlist/add-playlist-midterm-seg-66");
        }
    }

    public function createPlaylist(Request $request){
        $request->validate([
            'playlistName' => 'required | unique:playlists',
            'adminUserName' => 'required',
            'themeColor' => 'required'
        ]);
        $playList = new Playlist();
        $playList->playlistName = $request->playlistName;
        $playList->adminUserName = $request->adminUserName; 
        $playList->themeColor = substr($request->themeColor, 1);

        $playList->save();

        return redirect()->back()->with('success',"Playlist {$playList->playlistName} created");

    }

    public function listAdminPlaylistPage($adminUserName){
        if($this->auth() == false){
            return view("pages/user/signInUser-miderm-seg-66");
        }else{
            $playlist = Playlist::where('adminUserName', $adminUserName)->get();
            return view('/pages/playlist/list-playlist-midterm-seg-66')
            ->with('playlists', json_decode($playlist, true));  

        }
    }

    public function addMovieToPlaylist($id, $playlistId, $themeColor, $adminUserName, Request $request){
        $playList = Playlist::find($playlistId);
        

        if(strlen($playList->movieId) > 1){
            $playlistIds = $playList->movieId;

        
            if(str_contains($playlistIds, $id)){
                return redirect()->back()->with("failed","Movie already in playlist");
            }else{
                $playList->movieId = $playList->movieId . "|" .$id;
            }
        }else{
            $playList->movieId = $id;
        }

        $playList->save();
        return redirect()->back()->with("success","Movie added to playlist");

    }
    
    public function showMoviesInPlayList($playlistId, $playlistColor, $adminUserName){
       
        if($this->auth() == false){
            return view("pages/user/signInUser-miderm-seg-66");
        }else{
            $movies = Http::withHeaders([
                'X-RapidAPI-Host' => 'netflix54.p.rapidapi.com',
                'X-RapidAPI-Key' => '1868d35fdcmsh44fa58761090c79p1b3d23jsn2c67cb13e1f1'
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
        
            return redirect()->back()->with(['movieIds'=> $movieIds, 'allMovies'=> $allMovies, 'playlistColor' => $playlistColor]);
        
        }
  }

  function updatePlayList($id){
    if($this->auth() == false){
        return view("pages/user/signInUser-miderm-seg-66");
    }else{
    
        $playlist = Playlist::where('id','=',$id)->first();
        $id = $playlist->id;
        $playlistName = $playlist->playlistName;
        $themeColor = $playlist->themeColor;
        $movieId = $playlist->movieId;


        $movies = Http::withHeaders([
            'X-RapidAPI-Host' => 'netflix54.p.rapidapi.com',
            'X-RapidAPI-Key' => '1868d35fdcmsh44fa58761090c79p1b3d23jsn2c67cb13e1f1'
        ])->get('https://netflix54.p.rapidapi.com/search/?query=stranger&offset=0&limit_titles=200&limit_suggestions=20', 
        ['query' => "*"]);

        $allMovies = array();
        $movieData = json_decode($movies, true)["titles"];

        for($i = 0; $i < 50; $i++){
            $allMovies[] = $movieData[$i]["jawSummary"];
        }


        $moviesArray = array();
        $movieIdArray = explode("|", $movieId);

        foreach($movieIdArray as $movieid){
            foreach($allMovies as $movie){
                if($movie["id"] == $movieid){
                    $moviesArray[] = $movie;
                }
            }
        }
        return view("pages/playlist/update-playlist-midterm-seg-66")
        ->with(['id'=>$id, 'playlistName'=>$playlistName, 'themeColor' => $themeColor, 'movieId' => $movieId, 
    'moviesArray' => $moviesArray]);

    }
  }

  function updatePlayListFunction(Request $request, $id){

// var_dump($request->playlistName);
// //     $request->validate([
//         'playlistName' => 'required',
//         'themeColor' => 'required',
//         'movieId' => 'required'
// //     ]);

    if($this->auth() == false){
        return view("pages/user/signInUser-miderm-seg-66");
    }else{
        
        $playlist = Playlist::where('id','=',$id)->first();
        if($request->movieId){
            $requestMovieId = $request->movieId[0];
            $movieIds = $playlist->movieId;
            $movieIdString = "";
            $movieIdArray = explode("|", $movieIds);
            
            foreach ($movieIdArray as $movieid) {
                if($movieid != $requestMovieId){
                    if(strlen($movieIdString) == 0){
                        $movieIdString .= $movieid;
                    }else{
                        $movieIdString .= "|" . $movieid;
                    }
                }
            }
            $requestMovieId = $movieIdString;
        }else{
            $requestMovieId = $request->movieIdAltInput;
        }
        
        $themeColor = substr($request->themeColor, 1);

        Playlist::where('id','=',$id)->update([
                'playlistName' => $request->playlistName,
                'themeColor' => $themeColor,
                'movieId' => $requestMovieId
            ]);

        return redirect()->back()->with("success", "Playlist updated");

    }


    function deletePlayList($id){
        if($this->auth() == false){
            return view("pages/user/signInUser-miderm-seg-66");
        }else{
            Playlist::where('id','=',$id)->delete();
            return redirect()->back()->with("success", "Playlist deleted");
        }
        
    }

  }

}
