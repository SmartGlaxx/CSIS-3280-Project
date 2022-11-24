@extends("pages/admin/adminProfile-midterm-seg-66")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
<?php 
    $isAdmin = session('isAdmin'); 
    if($isAdmin == true){
        $profilePicture = session('adminProfilePicture');
        $coverPicture = session('adminCoverPicture');
        $userName = session('adminUserName');
    }else{
        $profilePicture = session('userProfilePicture');
        $coverPicture = session('userCoverPicture');
        $userName = session('userUserName');
        $userAdminsUserName = session('userAdminsUserName');
    }
 ?>
    <div class="container subPage">
        <div class="playlist-header">
        <h3>{{$userName}}'s Playlists</h3>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}
                <a href="/list-playlists/{{session('adminUserName')}}" class="btn btn-success add-playlist-btn">Add movies to playlist now</a>
            </div>
        @endif
        </div>
        <?php 
        if($isAdmin == true){
            echo count($playlists) > 0 ? 
            '<h5>Select a playlist to add movies to</h5>'
            : 
            '<h5>No Playlist yet. First crate a playlist <a href="/create-playlist">here</a></h5>';
        }
        ?>
        <table>
        @foreach ($playlists as $playlist)
            <?php 
                $playlistName = $playlist['playlistName'];
                $playlistId = $playlist['id'];
                $playlistColor = $playlist['themeColor'];
                $userName = session('adminUserName');
            ?>
                <tr style="background: #{{$playlistColor}}">
                    <td>{{$playlistName}}</td>
                    <td>
                    @if($isAdmin == true)
                    <a href="{{url('/list-movies/' . $playlistId . "/". $playlistColor . "/". $userName)}}" class="btn btn-success">Add movie</a> 
                    @endif
                   
                    <a href="/show-playlist-movies/{{$playlistId}}/{{$playlistColor}}/{{$isAdmin == true ? $userName : $userAdminsUserName}}"class="btn btn-primary">See movies in this playlist</a>
                    <?php  
                    echo $isAdmin == true ?  '<td>
                        <a href="/edit-playlist/'.  $playlistId .'" class="btn btn-warning">Edit Playlist</a>
                    </td>' : null
                    ?>
                    <?php  
                    echo $isAdmin == true ?  '<td>
                        <a href="/delete-playlist/'.  $playlistId .'" class="btn btn-danger">Delete Playlist</a>
                    </td>' : null
                    ?>
                    </td> 
                </tr>
        @endforeach
        </table>
        
        <div>
            @if(Session::has("movieIds"))
                <?php $movieIds = Session::get("movieIds") ?>
            @endif
            @if(Session::has("allMovies"))
                <?php $allMovies = Session::get("allMovies") ?>
            @endif
            <?php $count = 0; ?>
            @if(Session::has("allMovies"))
                @foreach($allMovies as $movie)
                    @foreach($movieIds as $movieId)
                        @if($movieId == $movie["id"])
                        <?php 
                            $movieTitle = $movie["title"];
                            $movieReleaseYear = $movie["releaseYear"];
                            $movieSynopsis = $movie["synopsis"];
                            $movieImage = $movie["backgroundImage"]["url"];
                            echo $movieTitle;
                        ?>
                        <table>
                            <tr>
                                <td><img src="{{$movieImage}}" class="thumbnail" alt="pic" /></td>
                                <td>{{$movieTitle}}</td>
                                <td>{{$movieReleaseYear}}</td>
                                <td>{{$movieSynopsis}}</td>
                            </tr>
                        </table>
                        <?php $count++; ?>
                        @endif
                    @endforeach
                @endforeach
            @if($count == 0)
                <div class='no-movies'>No movies in this playlist <br/>
                    <a href="/list-movies/{id}/{themeColor}/{adminUserName}" class="btn btn-success">Add movie</a></div>
            @endif
            @endif
        </div>
    </div>
@endsection