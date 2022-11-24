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
                <a href="{{url('list-admins')}}" class="btn btn-secondary">See other Admins</a>
                <a href="{{url('list-users')}}" class="btn btn-secondary">See other Users</a>
                
                

                @if($isAdmin == true )
                <a href="/list-playlists/{{$userName}}" class="btn btn-warning">Your playlists</a>
                <a href="/create-playlist" class="btn btn-primary">New playlist</a>
                @endif
                @if($isAdmin == false )
                <a href="/list-playlists/{{$userName}}/{{$userAdminsUserName}}" class="btn btn-warning">Your playlists</a>
                @endif
            </div>
            <div>
                <div><h3 class="profile-name"><span>{{ucfirst($userName)}}</span></h3>
                    <?php  
                    if($userName != null && $userName == session('adminUserName')){ ?>
                        <a href="/sign-out-admin" class="btn btn-secondary">Sign-out</a>
                        <a href="{{url('/update-admin-profile/' . $userName)}}" class="btn btn-warning">Update Profile</a>     
                       <a href="{{url('/delete-admin-profile/' . $userName)}}" class="btn btn-danger">Delete Profile</a>
                      
                    <?php }else if($userName != null && session("userUserName") == $userName){ ?>
                        <a href="/sign-out-user" >Sign-out</a>
                        <a href="{{url('/update-user-profile/'. $userName)}}" class="btn btn-warning">Update Profile</a>     
                        <a href="{{url('/delete-user-profile/' . $userName)}}" class="btn btn-danger">Delete Profile</a>
                    <?php }else if($userName != null && session("userUserName") != $userName){ 
                            echo $userName;
                            echo session("userUserName");
                    }else if($userName == null ){
                            echo '<a href="/sign-in-user" >Sign in</a>';
                    } 
                    if($profilePicture != null){?>
                        <img src="{{url('images/profilePictures/'. $profilePicture )}}" alt="Profile picture" class="profile-picture"/>
                    <?php }else{ ?>
                        <img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="Profile picture" class="profile-picture"/>
                    <?php } ?>
            </div>
            
        </div>
        </div>
        </div>
    </div>
@endsection
@yield("innerContent")