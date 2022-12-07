@extends('layouts/layout-seg-66')

@section("content")

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

    <?php if($coverPicture != null){?>
        <img src="{{url('images/coverPictures/'. $coverPicture)}}" alt="cover picture" class="cover-picture" />
    <?php }else{ ?>
        
    <img src="{{url('images/placeholders/placeholder-landscape.png')}}" alt="Profile picture" class="cover-picture"/><?php
     }  ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

          <ul class="navbar-nav">
            <li class="nav-item off-display">
                <a class="navbar-brand" href="/home-seg-66">
                <img src="{{url('images/logo/logo.png')}}" alt="M" class="logo"/>
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('list-admins-seg-66')}}">List of Admins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('list-users-seg-66')}}">Movie Fans</a>
            </li>
            @if($isAdmin == true )
            <li class="nav-item">
                <a class="nav-link" href="/list-playlists-seg-66/{{$userName}}">Your playlists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/create-playlist-seg-66">New playlist</a>
            </li>
                @endif
                @if($isAdmin == false )
                <li class="nav-item">
                    <a href="/list-playlists-seg-66/{{$userName}}/{{$userAdminsUserName}}" class="nav-link">Your playlists</a>
                </li>
                @endif
            
            <li class="nav-item">
            <div class="dropdown on-display" >
                <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="profile-name"><span>{{ucfirst($userName)}}</span></span> 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    
                    <?php  
                    if($userName != null && $userName == session('adminUserName')){ ?>
                        <a href="/sign-out-admin-seg-66" class="btn btn-default dropdown-item">Sign-out</a>
                        <a href="{{url('/update-admin-profile-seg-66/' . $userName)}}" class="btn btn-warning dropdown-item">Update Profile</a>     
                       <a href="{{url('/delete-admin-profile-seg-66/' . $userName)}}" class="btn btn-danger dropdown-item">Delete Profile</a>
                      
                    <?php }else if($userName != null && session("userUserName") == $userName){ ?>
                        <a href="/sign-out-user-seg-66" class="btn btn-default dropdown-item">Sign-out</a>
                        <a href="{{url('/update-user-profile-seg-66/'. $userName)}}" class="btn btn-warning dropdown-item">Update Profile</a>     
                        <a href="{{url('/delete-user-profile-seg-66/' . $userName)}}" class="btn btn-danger dropdown-item">Delete Profile</a>
                    <?php }else if($userName != null && session("userUserName") != $userName){ 
                            echo $userName;
                            echo session("userUserName");
                    }else if($userName == null ){
                            echo '<a href="/sign-in-user-seg-66" >Sign in</a>';
                    }?> 
                </div>
                </div>
                </li>
              
              <?php if($profilePicture != null){?>
                <a href="{{url('/user-profile-seg-66/' . $userName)}}" ><img src="{{url('images/profilePictures/'. $profilePicture )}}" alt="Profile picture" class="profile-picture  on-display"/></a>
            <?php }else{ ?>
                <a href="{{url('/user-profile-seg-66/' . $userName)}}" ><img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="Profile picture" class="profile-picture  on-display"/></a>
            <?php }  ?>
          </ul>
        </div>

          <div class="dropdown off-display" >
            <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="profile-name"><span>{{ucfirst($userName)}}</span></span> 
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                <?php  
                if($userName != null && $userName == session('adminUserName')){ ?>
                  <a href="/admin-profile-seg-66/{{session("adminUserName")}}" class="btn dropdown-item">My profile</a>
                    <a href="{{url('/update-admin-profile-seg-66/' . $userName)}}" class="btn btn-warning dropdown-item">Update Profile</a>     
                    <a href="/sign-out-admin-seg-66" class="btn btn-warning dropdown-item">Sign-out</a>
                   <a href="{{url('/delete-admin-profile-seg-66/' . $userName)}}" class="btn btn-danger dropdown-item">Delete Profile</a>
                  
                <?php }else if($userName != null && session("userUserName") == $userName){ ?>
                  <a href="/user-profile-seg-66/{{session("userUserName")}}" class="btn dropdown-item">My profile</a>
                  <a href="{{url('/update-user-profile-seg-66/'. $userName)}}" class="btn btn-warning dropdown-item">Update Profile</a>     
                  <a href="/sign-out-user-seg-66" class="btn btn-warning dropdown-item">Sign-out</a>
                    <a href="{{url('/delete-user-profile-seg-66/' . $userName)}}" class="btn btn-danger dropdown-item">Delete Profile</a>
                <?php }else if($userName != null && session("userUserName") != $userName){ 
                        echo $userName;
                        echo session("userUserName");
                }else if($userName == null ){
                        echo '<a href="/sign-in-user-seg-66" >Sign in</a>';
                }?> 
            </div>
            </div>

          <?php if($profilePicture != null){?>
            <a href="{{url('/user-profile-seg-66/' . $userName)}}" ><img src="{{url('images/profilePictures/'. $profilePicture )}}" alt="Profile picture" class="profile-picture  off-display"/></a>
        <?php }else{ ?>
            <a href="{{url('/user-profile-seg-66/' . $userName)}}" ><img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="Profile picture" class="profile-picture  off-display"/></a>
        <?php }  ?>

      </nav>
      <script>
        function light(){
          document.documentElement.className = "light"
        }
        function dark(){
          document.documentElement.className = "dark"
        }
      </script>
@endsection
@yield("innerContent")