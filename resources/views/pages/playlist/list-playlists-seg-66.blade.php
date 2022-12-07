@extends("pages/admin/admin-profile-seg-66")
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
    <div class="container subPage spacer">
        <div class="playlist-header">
        <h3>{{ucfirst($userName)}}'s Playlists</h3>
        @if(Session::has("success"))
            <div class="alert alert-danger">{{Session::get("success")}}
                <a href="/list-playlists-seg-66/{{session('adminUserName')}}" class="btn btn-success add-playlist-btn">Add movies to playlist now</a>
            </div>
        @endif
        @if(Session::has("deleted"))
            <div class="alert alert-success">{{Session::get("deleted")}}
            </div>
        @endif
        </div>
        <?php if($isAdmin == true){ 
            if(count($playlists) > 0){ ?>
            <div class="pg-rating-guide">
                <div class="p-g-box">
                    <div class="p-g"><div class="g-1"></div>(G)</div>
                    <div class="p-g"><div class="g-2"></div>(PG)</div>
                    <div class="p-g"><div class="g-3"></div>(PG-13)</div>
                    <div class="p-g"><div class="g-4"></div>(R)</div>
                </div>
            </div>
            <?php }else if(count($playlists) <= 0) {?>
                <div>No Playlist yet. First create a playlist <a href="/create-playlist-seg-66" class="btn btn-primary">here</a></div>
            <?php }
            }
            ?>
        <div class="table-responsive">
        <table class="">
        @foreach ($playlists as $playlist)
            
            <?php 
                $playlistName = $playlist['playlistName'];
                $playlistId = $playlist['id'];
                $playlistColor = $playlist['themeColor'];
                $userName = session('adminUserName');
            ?>
                <tr>
                    <td>
                        <div style="background: {{$playlistColor}}" class="playlistcolor"></div>
                    </td>
                    <td>{{$playlistName}}</td>
                    <td>
                        <a href="/show-playlist-movies-seg-66/{{$playlistId}}/{{$playlistColor}}/{{$isAdmin == true ? $userName : $userAdminsUserName}}"class="btn btn-default">Movies</a>
                    </td>
                    @if($isAdmin == true)
                    <td><a href="{{url('/list-movies-seg-66/' . $playlistId . "/". $playlistColor . "/". $userName)}}" class="btn btn-default add-btn">Add movie</a> </td>
                    @endif
                   
                    <?php  
                    echo $isAdmin == true ?  '<td>
                        <a href="/update-playlist-seg-66/'.  $playlistId .'" class="btn btn-default update-btn">Edit Playlist</a>
                    </td>' : null
                    ?>
                    <?php  
                    echo $isAdmin == true ?  '<td>
                        <a href="/delete-playlist-seg-66/'.  $playlistId .'" class="btn btn-default delete-btn">Delete Playlist</a>
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
                                @if($isAdmin == false)
                                <td><a href="{{url('/reviews-seg-66/' . $id)}}" class="btn btn-default">Reviews</td>
                                @endif
                            </tr>
                            <?php $count++; ?>
                        @endif
                    @endforeach
                </table>
            @if($count == 0 && $isAdmin == true)
                <div class='no-movies'>No movies in this playlist <br/>
                    <a href="{{url('/list-movies-seg-66/' . $playlistId . "/". $playlistColor . "/". $userName) }}"  class="btn btn-success">Add movie</a></div>
            @endif
                @if($count == 0 && $isAdmin == false)
                    <div class='no-movies'>No movies in this playlist.</br> Your admin is yet to add movies to the playlist. </div>
                @endif
            @endif
        </div>
    </div>
    </div>
@endsection
@include("partials/footer-seg-66")