@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
        <div class="container">
        <h3>Create Playlist</h3>
        {{-- <a href="{{url('list-users')}}" class="btn btn-primary">View All Users</a> --}}
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}
                <a href="/list-playlists/{{session('adminUserName')}}" class="btn btn-success add-playlist-btn">Add movies to playlist now</a>
            </div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
        @if(session('adminUserName'))
            <form method="post" action="{{url('create-playlist')}}" class="form-control col-sm-12 col-md-6">
                @csrf
                <label class="form-label" >Playlist Title</label>
                <input type="text" name="playlistName" value="{{old('playlistName')}}" class="form-control"/>
                @error("playlistName")
                <div class="alert alert-danger">{{$message}}</div> 
                @enderror
                <label class="form-label" >Theme color</label>
                <input type="text" name="themeColor" value="{{old('themeColor')}}" class="form-control"/>
                @error("themeColor")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input  name="adminUserName" value="{{session('adminUserName')}}" type="hidden" class="form-control"/>
                <button type="submit" name="registerAdmin" class="btn btn-success"
                style="margin-top:3rem">Register</button>
            </form>
            @endif
        </div>
@endsection