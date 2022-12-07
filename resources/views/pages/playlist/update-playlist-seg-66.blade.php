@extends('pages/admin/admin-profile-seg-66')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")

<div class="container subPage spacer">
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
            <form method="post" action="{{url('update-playlist-seg-66/' . $id)}}" class="form-controlform">
                @csrf
                <label class="form-label" >Playlist name</label>
                <input type="text" name="playlistName" value="{{ucfirst($playlistName)}}" class="form-control"/>
                @error("playlistName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <br/>
                <label class="form-label" >Rating color</label><br/>
                <div class="p-g-box">
                    <div class="p-g"><div class="g-1"><input type="radio" name="themeColor" value="green" <?php echo $themeColor == "green" ? 'checked' : null ?> /></div></div>
                    <div class="p-g"><div class="g-2"><input type="radio" name="themeColor" value="yellow" <?php echo $themeColor == "yellow" ? 'checked' : null ?>/></div></div>
                    <div class="p-g"><div class="g-3"><input type="radio" name="themeColor" value="orange" <?php echo $themeColor == "orange" ? 'checked' : null ?>/></div></div>
                    <div class="p-g"><div class="g-4"><input type="radio" name="themeColor" value="red" <?php echo $themeColor == "red" ? 'checked' : null ?>/></div></div>
                </div>
                <br/>
                @error("themeColor")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >Movies</label><br/>
                <div class="table-responsive">
                <table class="">
               @foreach ($moviesArray as $movie)
               <tr>
                <?php $movieImage = $movie["backgroundImage"]["url"]; ?>
                <td><img src="{{$movieImage}}" class="thumbnail-2" alt="pic" /></td>
                <td><span>{{$movie["title"]}}</span></td>
                <td><button type="submit" name="movieId[]" value="{{$movie["id"]}}" class="btn btn-default">Remove</button></td>
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
                <button type="submit" name="updatePlaylist" class="btn btn-default playlist-btns">Update Playlist</button>
                <a href="{{url('/list-movies-seg-66/'. $id . '/' .$themeColor. '/' .$adminUserName)}}" class="btn btn-default playlist-btns">Add movie</a>
            </form>
        </div>
@endsection
@include("partials/footer-seg-66")

