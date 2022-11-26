@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")

<?php
    $isAdmin = session('isAdmin'); 
    if($isAdmin == true){
        $profilePicture = session('adminProfilePicture');
        $coverPicture = session('adminCoverPicture');
        $userName = session('adminUserName');
    }else{
        // if(session('userUserName') == $userData["userName"]){
            $profilePicture = session('userProfilePicture');
            $coverPicture = session('userCoverPicture');
            $userName = session('userUserName');
            $userAdminsUserName = session('userAdminsUserName');
        // }else if(session('userUserName') != $userData["userName"]){
            // $profilePicture = $userData["profilePicture"];
            // $coverPicture = $userData["coverPicture"];
            // $userName = $userData["userName"];
            // $userAdminsUserName = $userData["userAdminsUserName"];
        // }
        // else if(session($user["isAdmin"] == true)){
        //     $profilePicture = $user["profilePicture"];
        //     $coverPicture = $user["coverPicture"];
        //     $userName = $user["adminUserName"];
        // }
    }
    
  
?>
<div class="admin-page-top">
<img src="{{url('images/coverPictures/'. $coverPicture)}}" alt="cover picture" class="cover-picture" />
        <div class="">
            <div class="profile-header">
            <h2 class="title">Movies Club</h2>
            <div>
                <a href="{{url('list-admins')}}" class="btn btn-default">See other Admins</a>
                <a href="{{url('list-users')}}" class="btn btn-default">See other Users</a>
                
                

                @if($isAdmin == true )
                <a href="/list-playlists/{{$userName}}" class="btn btn-default">Your playlists</a>
                <a href="/create-playlist" class="btn btn-default">New playlist</a>
                @endif
                @if($isAdmin == false )
                <a href="/list-playlists/{{$userName}}/{{$userAdminsUserName}}" class="btn btn-default">Your playlists</a>
                @endif
            </div>
            <div class="profile-box">
            <div class="dropdown" >
                <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="profile-name"><span>{{ucfirst($userName)}}</span></span> 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                    <?php  
                    if($userName != null && $userName == session('adminUserName')){ ?>
                        <a href="/sign-out-admin" class="btn btn-default dropdown-item">Sign-out</a>
                        <a href="{{url('/update-admin-profile/' . $userName)}}" class="btn btn-warning dropdown-item">Update Profile</a>     
                       <a href="{{url('/delete-admin-profile/' . $userName)}}" class="btn btn-danger dropdown-item">Delete Profile</a>
                      
                    <?php }else if($userName != null && session("userUserName") == $userName){ ?>
                        <a href="/sign-out-user" class="btn btn-default dropdown-item">Sign-out</a>
                        <a href="{{url('/update-user-profile/'. $userName)}}" class="btn btn-warning dropdown-item">Update Profile</a>     
                        <a href="{{url('/delete-user-profile/' . $userName)}}" class="btn btn-danger dropdown-item">Delete Profile</a>
                    <?php }else if($userName != null && session("userUserName") != $userName){ 
                            echo $userName;
                            echo session("userUserName");
                    }else if($userName == null ){
                            echo '<a href="/sign-in-user dropdown-item" >Sign in</a>';
                    }?> 
                </div>
            </div>
            
           
                <?php if($profilePicture != null){?>
                    <img src="{{url('images/profilePictures/'. $profilePicture )}}" alt="Profile picture" class="profile-picture"/>
                <?php }else{ ?>
                    <img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="Profile picture" class="profile-picture"/>
                <?php }  ?>
        </div>
        </div>
        </div>
    </div>
@endsection
@yield("innerContent")