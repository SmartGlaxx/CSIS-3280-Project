@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
        <div class="container">
        <h3>Add Movies to Playlist</h3>
        {{session('activePlaylist')}}
        {{-- <a href="{{url('list-users')}}" class="btn btn-primary">View All Users</a>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
            <form method="post" action="{{url('add-user')}}" class="form-control col-sm-12 col-md-6">
                @csrf
                <label class="form-label" >First Name</label>
                <input type="text" name="firstName" value="{{old('firstName')}}" class="form-control"/>
                @error("firstName")
                <div class="alert alert-danger">{{$message}}</div> 
                @enderror
                <label class="form-label" >Last Name</label>
                <input type="text" name="lastName" value="{{old('lastName')}}" class="form-control"/>
                @error("lastName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <button type="submit" name="registerAdmin" class="btn btn-success"
                style="margin-top:3rem">Register</button>
            </form> --}}
        </div>
@endsection