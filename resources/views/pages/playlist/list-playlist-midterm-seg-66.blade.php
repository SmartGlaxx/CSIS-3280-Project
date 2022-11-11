@extends("layouts/layout")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
    <div class="container">
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
                        @endif
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
@endsection