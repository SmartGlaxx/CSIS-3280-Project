@extends('layouts/layout')
@section("header")
    {{-- Smart Egbuchulem - 300333966 --}}
@endsection

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
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/">
            <img src="{{url('images/logo/logo.png')}}" alt="M" class="logo"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{url('list-admins')}}">List of Admins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('list-users')}}">Movie Fans</a>
            </li>
            @if($isAdmin == true )
            <li class="nav-item">
                <a class="nav-link" href="/list-playlists/{{$userName}}">Your playlists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/create-playlist">New playlist</a>
            </li>
                @endif
                @if($isAdmin == false )
                <li class="nav-item">
                    <a href="/list-playlists/{{$userName}}/{{$userAdminsUserName}}" class="nav-link">Your playlists</a>
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
                </li>
              
              <?php if($profilePicture != null){?>
                <a href="{{url('/user-profile/' . $userName)}}" ><img src="{{url('images/profilePictures/'. $profilePicture )}}" alt="Profile picture" class="profile-picture  on-display"/></a>
            <?php }else{ ?>
                <a href="{{url('/user-profile/' . $userName)}}" ><img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="Profile picture" class="profile-picture  on-display"/></a>
            <?php }  ?>
          </ul>
        </div>

     
                {{-- <button onclick="light()" class="btn" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
              </svg>
               </button>
        
          <button onclick="dark()" class="btn" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
            <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
          </svg>
          </button> --}}
        
          
          <div class="dropdown off-display" >
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
            <a href="{{url('/user-profile/' . $userName)}}" ><img src="{{url('images/profilePictures/'. $profilePicture )}}" alt="Profile picture" class="profile-picture  off-display"/></a>
        <?php }else{ ?>
            <a href="{{url('/user-profile/' . $userName)}}" ><img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="Profile picture" class="profile-picture  off-display"/></a>
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