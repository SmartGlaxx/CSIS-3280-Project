@extends("pages/admin/admin-profile-seg-66")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
        <div class="container subPage spacer">
        <h3>Create Playlist</h3>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}
                <a href="/list-playlists-seg-66/{{session('adminUserName')}}" class="btn btn-success add-playlist-btn">Add movies to playlist now</a>
            </div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
        @if(session('adminUserName'))
        <div class="row">
            <form method="post" action="{{url('create-playlist-seg-66')}}" class="col-sm-12 col-md-4" >
                @csrf
                <table class="table" >
                <label class="form-label" >Playlist Title</label>
                <input type="text" name="playlistName" value="{{old('playlistName')}}" class="form-control"/>
                @error("playlistName")
                <div class="alert alert-danger">{{$message}}</div> 
                @enderror
                <label class="form-label" >Rating color (PG Rating)</label>
                <div class="p-g-box">
                    <div class="p-g"><div class="g-1"><input type="radio" name="themeColor" value="green" /></div></div>
                    <div class="p-g"><div class="g-2"><input type="radio" name="themeColor" value="yellow" /></div></div>
                    <div class="p-g"><div class="g-3"><input type="radio" name="themeColor" value="orange" /></div></div>
                    <div class="p-g"><div class="g-4"><input type="radio" name="themeColor" value="red" /></div></div>
                </div>
                @error("themeColor")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input  name="adminUserName" value="{{session('adminUserName')}}" type="hidden" class="form-control"/>
                <button type="submit" name="registerAdmin" class="btn btn-default cp-btn">Create</button>
                </table>
            </form>
            </div>
            @endif
        </div>
@endsection
@include("partials/footer-seg-66")