@extends('pages/admin/adminProfile-midterm-seg-66')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")

<div class="container subPage">
    <div class="playlist-header">
    <h3>Edit <em>{{ucfirst($playlistName)}}</em> Playlist</h3>
    </div>
    <?php $adminUserName = session('adminUserName'); ?>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
            <form method="post" action="{{url('update-playlist/' . $id)}}" class="form-controlform">
                @csrf
                <label class="form-label" >Playlist name</label>
                <input type="text" name="playlistName" value="{{ucfirst($playlistName)}}" class="form-control"/>
                @error("playlistName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <br/>
                <label class="form-label" >Theme color</label><br/>
                <input type="color" name="themeColor"  value="#{{$themeColor}}"/>
                
                <br/>
                @error("themeColor")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >Movies</label><br/>
                <div class="table-responsive">
                <table class="table">
               @foreach ($moviesArray as $movie)
               <tr>
                <?php $movieImage = $movie["backgroundImage"]["url"]; ?>
                <td><img src="{{$movieImage}}" class="thumbnail-2" alt="pic" /></td>
                <td><span>{{$movie["title"]}}</span></td>
                <td><button type="submit" name="movieId[]" value="{{$movie["id"]}}" class="btn btn-outline-danger">Remove</button></td>
               </tr>
               @endforeach
                </table>
                </div>
                <?php  
                    $idString = "";
                    foreach ($moviesArray as $movie ){
                        if(strlen($idString) > 0){
                            $idString .= "|" . $movie["id"] ;
                        }else{
                            $idString .= $movie["id"] ;
                        }
                        
                    }
                ?>
               <input type="hidden" name="movieIdAltInput" value="{{$idString}}" />
                <button type="submit" name="updatePlaylist" class="btn btn-outline-warning">Update Playlist</button>
                <a href="{{url('/list-movies/'. $id . '/' .$themeColor. '/' .$adminUserName)}}" class="btn btn-outline-success">Add movie</a>
            </form>
        </div>
@endsection
@include("partials/footer")

