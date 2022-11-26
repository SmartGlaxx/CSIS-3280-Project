@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
        <div class="container">
        <h3 class="title">MOVIES CLUB <span class="title-inner">Admin Sign-in</span></h3>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif        
            <form method="post" action="{{url('sign-in-admin')}}" class="sign-in-form">
                @csrf
                <table class="sign-in-table">
                <tr><td><label class="form-label" >Email or Username</label></td>
                <td><input type="text" name="adminUserName" value="{{old('adminUserName')}}" class="form-control"/></td></tr>
                @error("adminUserName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <tr><td><label class="form-label" >Password</label></td>
                <td><input type="password" name="password"  class="form-control"/></td></tr>
                @error("password")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <input type="hidden" value="true" name="isAdmin"/>
                <tr>
                    <td>New Admin? <a href="{{url('add-admin')}}" class="btn btn-default">Sign-up</a></td>
                    <td><button type="submit" name="registerAdmin" class="btn btn-default auth-btn">Sign In</button></td></tr>
                <table>
                    {{-- <img src="{{url('images/bg_images/cinema.jpg' )}}" alt="Profile picture" class="bg-picture"/>              --}}
            </form>
        </div>
@endsection