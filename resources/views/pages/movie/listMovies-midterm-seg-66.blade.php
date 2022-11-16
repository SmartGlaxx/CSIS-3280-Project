@extends("pages/admin/adminProfile-midterm-seg-66")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
<div class=" subPage" >
    <div class="container movies-header" style="margin: 10rem auto 0">
        <h3>All Movies</h3>
        <div>
            @if(Session::has('success'))
                {{Session::get('success')}}
            @endif
        </div>
        <h6>You are adding to <span>{{session('currentPlaylistData')["playlistName"]}}</span> playlist</h6>
    </div>
    @foreach ($playlistData as $data)   
        <?php 
            $movieIdArray = explode("|", $playlistData["movieId"]);
        ?>
    @endforeach
    <div class="container movies-container">
        <?php $allMovie = $movies["titles"] ?>
        @for ($i = 1; $i < count($allMovie); $i++)
        <div class="movie-details" data-toggle="tooltip" data-placement="right" title="{{$allMovie[$i]["jawSummary"]["title"]}}">
            <a href="" style="list-style-type:none; text-decoration:none">
            <div><h4 class="movie-title">{{$allMovie[$i]["jawSummary"]["title"]}}</h4></div>
            <div>
                <img src='{{$allMovie[$i]["jawSummary"]["backgroundImage"]["url"]}}'
                 alt='{{$allMovie[$i]["jawSummary"]["title"]}}' class="movie-img"/>
            </div>
            <div> {{$allMovie[$i]["jawSummary"]["releaseYear"]}} </div>
            <div class="synopsis"> {{$allMovie[$i]["jawSummary"]["synopsis"]}} 
            </br>
            <form method="get" action='/add-to-playlist/{{$allMovie[$i]["jawSummary"]["id"]}}/{{session('currentPlaylistData')["id"]}}/{{session('currentThemeColor')}}/{{session('adminUserName')}}'>
                <button type="submit" class="btn btn-secondary" name="submit">
                    <?php 
                    echo in_array($allMovie[$i]["jawSummary"]["id"], $movieIdArray) ? "Added to playlist" : "Add to playlist";
                    ?>
                </button>
            </form>
            </div>
        </a>
        </div>
        @endfor
    </div>
@endsection




