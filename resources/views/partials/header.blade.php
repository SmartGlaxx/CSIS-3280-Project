@extends('layouts/layout')
<div class="page-top">
    <img src="{{url('images/bg_images/cinema.jpg')}}" alt="landinpage picture"  class="landing-page-picture" />
     <div class="overlay"></div>
        {{-- <div class="main">
                <div class="profile-header">
                <a href="/"><h2 class="title">Movies Club</h2></a>
                <div>
                    <a href="/about" class="btn btn-default">About Movies Club</a>
                    <a href="/points" class="btn btn-default">What are points</a>
                </div>
                <div class="profile-box">
                <div class="dropdown" >
                    <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="profile-name"><span>Admin</span></span> 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="/add-admin" class="btn dropdown-item">Sign-up</a>
                    <a href="/sign-in-admin" class="btn dropdown-item">Sign-in</a>
                    </div>
                </div>
                <div class="dropdown" >
                    <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="profile-name"><span>Movie Fan</span></span> 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="/add-user" class="btn dropdown-item">Sign-up</a>
                    <a href="/sign-in-user" class="btn dropdown-item">Sign-in</a>
                    </div>
                </div>
                 <img src="{{url('images/bg_images/cinema.jpg' )}}" alt="Profile picture" class="profile-picture"/>
            </div>
            </div>
        </div> --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">
                <img src="{{url('images/logo/logo.png')}}" alt="M" class="logo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/about">About Movies Club</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/points">Earn movie points</a>
                </li>
              </ul>
              
            </div>
            <div class="dropdown" >
                <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="profile-name"><span>Admin</span></span> 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="/add-admin" class="btn dropdown-item">Sign-up</a>
                <a href="/sign-in-admin" class="btn dropdown-item">Sign-in</a>
                </div>
            </div>
            <div class="dropdown" >
                <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="profile-name"><span>Movie Fan</span></span> 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="/add-user" class="btn dropdown-item">Sign-up</a>
                <a href="/sign-in-user" class="btn dropdown-item">Sign-in</a>
                </div>
            </div>


          </nav>
</div>