@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
<script>
    document.querySelector('.deleteOption').classlist.add('showDeleteOption')
</script>

<?php
    $isAdmin = session('isAdmin'); 
    if($isAdmin == true){
        $profilePicture = session('adminProfilePicture');
        $coverPicture = session('adminCoverPicture');
        $userName = session('adminUserName');
    }else{
        $profilePicture = session('userProfilePicture');
        $coverPicture = session('userCoverPicture');
        $userName = session('userUserName');
        $userAdminsUserName = session('userAdminsUserName');
    }
    
  
?>
<div class="admin-page-top">
<img src="{{url('images/coverPictures/'. $coverPicture )}}" alt="Profile picture" class="cover-picture" />
        <div class="">
        <div class="profile-header">
            <h2 class="title">Movies Club</h2>
            <div>
                <a href="{{url('list-admins')}}" class="btn btn-secondary">See other Admins</a>
                <a href="{{url('list-users')}}" class="btn btn-secondary">See other Users</a>
                
                

                @if($isAdmin == true )
                <a href="/list-playlists/{{$userName}}" class="btn btn-warning">Your playlists</a>
                <a href="/create-playlist" class="btn btn-primary">New playlist</a>
                @endif
                @if($isAdmin == false )
                <a href="/list-playlists/{{$userAdminsUserName}}" class="btn btn-warning">Your playlists</a>
                @endif
            </div>
            <div>
                <div><h3 class="profile-name">Hello <span>{{ucfirst($userName)}}</span></h3>
                    <?php  
                    if($userName != null && $userName == session('adminUserName')){ ?>
                        <a href="/sign-out-admin" >Sign-out</a>
                        <a href="{{url('/update-admin-profile/' . $userName)}}" >Update Profile</a>     
                       <a href="{{url('/delete-admin-profile/' . $userName)}}" >Delete Profile</a>
                      
                    <?php }else if($userName != null && $userName == session('userUserName')){
                        echo '<a href="/sign-out-user" >Sign-out</a>';
                    }else if($userName == null){
                        echo '<a href="/sign-in-user" >Sign in</a>';
                    }
                    ?>
                <img src="{{url('images/profilePictures/'. $profilePicture )}}" alt="Profile picture" class="profile-picture"/>
            </div>
            
        </div>
        </div>
        </div>
    </div>
@endsection
@yield("innerContent")