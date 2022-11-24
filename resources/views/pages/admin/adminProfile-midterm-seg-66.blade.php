@extends('partials/pageHeader')

{{-- @extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
<?php
    // $isAdmin = session('isAdmin'); 
    // if($isAdmin == true){
    //     $profilePicture = session('adminProfilePicture');
    //     $coverPicture = session('adminCoverPicture');
    //     $userName = session('adminUserName');
    // }else{
    //     $profilePicture = session('userProfilePicture');
    //     $coverPicture = session('userCoverPicture');
    //     $userName = session('userUserName');
    // }
    
?>
<div class="admin-page-top">
<img src="{{url('images/coverPictures/'. $coverPicture )}}" alt="Profile picture" class="cover-picture" />
        <div class="">
        <div class="profile-header">
            <h2 class="title">Movies Club</h2>
            <div>
                <a href="{{url('list-admins')}}" class="btn btn-secondary">See other Admins</a>
                <a href="{{url('list-users')}}" class="btn btn-secondary">See other Users</a>
                <a href="/list-playlists/{{$userName}}" class="btn btn-warning">Your playlists</a>
                @if($isAdmin == true )
                <a href="/create-playlist" class="btn btn-primary">New playlist</a>
                @endif
            </div>
            <div>
                <div><h3 class="profile-name">Hello <span>{{ucfirst($userName)}}</span></h3>
                <img src="{{url('images/profilePictures/'. $profilePicture )}}" alt="Profile picture" class="profile-picture"/>
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection
@yield("innerContent") --}}