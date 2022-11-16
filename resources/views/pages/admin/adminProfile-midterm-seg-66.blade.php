@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
<?php 
    $adminIserName = session('adminUserName');
    $adminProfilePicture = session('adminProfilePicture');
    $adminCoverPicture = session('adminCoverPicture');
?>
<div class="admin-page-top">
<img src="{{url('images/coverPictures/'. $adminCoverPicture )}}" alt="Profile picture" class="cover-picture" />
        <div class="">
        <div class="profile-header">
            <h2 class="title">Movies Club</h2>
            <div>
                <a href="{{url('list-admins')}}" class="btn btn-secondary">See other Admins</a>
                <a href="/list-playlists/{{session('adminUserName')}}" class="btn btn-warning">Your playlists</a>
                <a href="/create-playlist" class="btn btn-primary">New playlist</a>
            </div>
            <div>
                <h3 class="profile-name">Hello <span>{{ucfirst($adminIserName)}}</span></h3>
                <img src="{{url('images/profilePictures/'. $adminProfilePicture )}}" alt="Profile picture" class="profile-picture"/>
            </div>
        </div>
        </div>
    </div>
@endsection
@yield("innerContent")