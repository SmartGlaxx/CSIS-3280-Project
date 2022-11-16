@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
        <div class="container">
        <h3>User Sign-in</h3>
        <a href="{{url('list-admins')}}" class="btn btn-primary">View All Users</a>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
        
            <form method="post" action="{{url('sign-in-user')}}" class="form-control">
                @csrf
                <label class="form-label" >Email or Username</label>
                <input type="text" name="userUserName" value="{{old('userUserName')}}" class="form-control"/>
                @error("userUserName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >Password</label>
                <input type="password" name="password"  class="form-control"/>
                @error("password")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input type="hidden" value="true" name="isAdmin"/>
                <button type="submit" name="registerAdmin" class="btn btn-success">Sign In</button>
            </form>
        </div>
@endsection