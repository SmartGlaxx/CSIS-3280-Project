@extends('layouts/layout-seg-66')
@include('partials/auth-header-seg-66')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
<div class="img-box">
    <img src="{{url('images/bg_images/cinema.jpg')}}" alt="landinpage picture"  class="landing-page-picture" />
    <div class="overlay"></div>
</div>
<div class="container auth-container spacer-3">
        <div class="auth-inner-container">
    <h3 class="title">MOVIES CLUB <span class="title-inner">Movie Fan Sign-in</span></h3>
    @if(Session::has("success"))
        <div class="alert alert-success">{{Session::get("success")}}</div>
    @endif
    @if(Session::has("failed"))
        <div class="alert alert-danger">{{Session::get("failed")}}</div>
    @endif        
        <form method="post" action="{{url('sign-in-user-seg-66')}}" class="form-control form">
            @csrf
            <div class="table-responsive">
            <table class="sign-in">
            <tr><td><label class="form-label" >Email or Username</label></td></tr>
            <tr><td><input type="text" name="userUserName" value="{{old('userUserName')}}" class="signin-form-control form-control"/></td></tr>
            @error("userUserName")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <tr><td><label class="form-label" >Password</label></td></tr>
            <tr><td><input type="password" name="password"  class="signin-form-control form-control"/></td></tr>
            @error("password")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <input type="hidden" value="true" name="isAdmin"/>
            <tr class="row">
                <td class="col-sm-6" ><button type="submit" name="" class="btn btn-default auth-btn">Sign In</button></td>
                <td></td>
            </tr>
            <tr>
                <td>New User? <a href="{{url('register-user-seg-66')}}" class="btn btn-default">Sign-up</a></td>
            </tr>
            </table>
            </div>
        </form>
    </div>
</div>
@endsection
@include("partials/footer-seg-66")