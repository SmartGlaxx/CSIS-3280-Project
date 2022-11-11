@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
        <div class="container">
        <?php $adminIserName = session('adminUserName'); ?>
        <div class="profile-header">
            <div>
                <a href="{{url('list-admins')}}" class="btn btn-primary">See other Admins</a>
                <a href="/list-playlists/{{session('adminUserName')}}" class="btn btn-warning">Your playlists</a>
            </div>
            <div>
                <h3 class="profile-name">Hello <span>{{$adminIserName}}</span></h3>
                <img src="{{url('images/profile-pics.jpg')}}" alt="Profile picture" class="profile-picture"/>
            </div>
        </div>
        </div>
@endsection