@extends("pages/admin/adminProfile-midterm-seg-66")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage">
        <div class="playlist-header">
        <h3>{{session('adminUserName')}}'s Playlists</h3>
        </div>
        <h5>Select a playlist to add movies to</h5>
        <table>
        @foreach ($playlists as $playlist)
            <?php 
                $playlistName = $playlist['playlistName'];
                $playlistId = $playlist['id'];
                $playlistColor = $playlist['themeColor'];
                $adminUserName = session('adminUserName');
            ?>
                <tr>
                    <td>{{$playlistName}}</td>
                    <td><a href="/list-movies/{{$playlistId}}/{{$playlistColor}}/{{$adminUserName}}"
                    class="btn btn-success">Add movie</a>
                    <a href="/show-playlist-movies/{{$playlistId}}/{{$playlistColor}}/{{$adminUserName}}"class="btn btn-primary">See movies in this playlist</a>
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