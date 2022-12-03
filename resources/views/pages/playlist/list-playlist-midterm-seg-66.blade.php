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
        <h3>{{ucfirst($userName)}}'s Playlists</h3>
        @if(Session::has("success"))
            <div class="alert alert-danger">{{Session::get("success")}}
                <a href="/list-playlists/{{session('adminUserName')}}" class="btn btn-success add-playlist-btn">Add movies to playlist now</a>
            </div>
        @endif
        @if(Session::has("deleted"))
            <div class="alert alert-success">{{Session::get("deleted")}}
            </div>
        @endif
        </div>
        <?php 
        if($isAdmin == true){
            echo count($playlists) > 0 ? 
            '<h5>Your playlists</h5>'
            : 
            '<div>No Playlist yet. First crate a playlist <a href="/create-playlist" class="btn btn-primary">here</a></div>';
        }
        ?>
        <div class="table-responsive">
        <table class="table">
        @foreach ($playlists as $playlist)
            
            <?php 
                $playlistName = $playlist['playlistName'];
                $playlistId = $playlist['id'];
                $playlistColor = $playlist['themeColor'];
                $userName = session('adminUserName');
            ?>
                <tr>
                    <td style="background: #{{$playlistColor}}"></td>
                    <td>{{$playlistName}}</td>
                    <td>
                    @if($isAdmin == true)
                    <a href="{{url('/list-movies/' . $playlistId . "/". $playlistColor . "/". $userName)}}" class="btn btn-success">Add movie</a> 
                    @endif
                   
                    <a href="/show-playlist-movies/{{$playlistId}}/{{$playlistColor}}/{{$isAdmin == true ? $userName : $userAdminsUserName}}"class="btn btn-default">Movies</a>
                    <?php  
                    echo $isAdmin == true ?  '<td>
                        <a href="/update-playlist/'.  $playlistId .'" class="btn btn-default update-btn">Edit Playlist</a>
                    </td>' : null
                    ?>
                    <?php  
                    echo $isAdmin == true ?  '<td>
                        <a href="/delete-playlist/'.  $playlistId .'" class="btn btn-default delete-btn">Delete Playlist</a>
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
                <table>
                @foreach($allMovies as $movie)
                    @if( in_array($movie["id"], $movieIds) )
                        <?php
                            $id = $movie["id"]; 
                            $movieTitle = $movie["title"];
                            $movieReleaseYear = $movie["releaseYear"];
                            $movieSynopsis = $movie["synopsis"];
                            $movieImage = $movie["backgroundImage"]["url"];
                        ?>
                            <tr>
                                <td><img src="{{$movieImage}}" class="thumbnail" alt="pic"/></td>
                                <td>{{$movieTitle}}</td>
                                <td>{{$movieReleaseYear}}</td>
                                <td>{{$movieSynopsis}}</td>
                                <td><a href="{{url('/reviews/' . $id)}}" class="btn btn-default">Reviews</td>
                            </tr>
                            <?php $count++; ?>
                        @endif
                    @endforeach
                </table>
            @if($count == 0 && $isAdmin == true)
                <div class='no-movies'>No movies in this playlist <br/>
                    <a href="/list-movies/{id}/{themeColor}/{adminUserName}" class="btn btn-success">Add movie</a></div>
            @endif
                @if($count == 0 && $isAdmin == false)
                    <div class='no-movies'>No movies in this playlist.</br> Your admin is yet to add movies to the playlist. </div>
                @endif
            @endif
        </div>
    </div>
    </div>
@endsection
@include("partials/footer")