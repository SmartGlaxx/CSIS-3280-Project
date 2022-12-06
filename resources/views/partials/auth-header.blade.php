<div class="page-top" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
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
              <a class="nav-link" href="/viewcard">Earn View Cards</a>
            </li>

            @if(!session("userUserName") && !session('adminUserName'))
        <li class="dropdown" >
            <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="profile-name"><span>Admin</span></span> 
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <a href="/register-admin" class="btn dropdown-item">Sign-up</a>
            <a href="/sign-in-admin" class="btn dropdown-item">Sign-in</a>
            </div>
        </li>
        <li class="dropdown" >
            <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="profile-name"><span>Movie Fan</span></span> 
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
            <a href="/register-user" class="btn dropdown-item">Sign-up</a>
            <a href="/sign-in-user" class="btn dropdown-item">Sign-in</a>
            </div>
          </li>
        @endif

          </ul>
        </div>
        @if(session("userUserName") || session('adminUserName'))
        <?php 
        $name = session("userUserName") ? session("userUserName") : session("adminUserName");
        ?>
          <h6 style="color: white">
            <div class="dropdown" >
              <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="profile-name"><span>{{session("userUserName") ? ucfirst(session("userUserName")) : session("adminUserName") }}</span></span> 
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
              @if(session("userUserName") && !session("adminUserName"))
              <a href="/user-profile/{{session("userUserName")}}" class="btn dropdown-item">My profile</a>
              @endif
              @if(session("adminUserName") && !session("userUserName"))
              <a href="/admin-profile/{{session("adminUserName")}}" class="btn dropdown-item">My profile</a>
              @endif
              <a href="/sign-out-user" class="btn dropdown-item">Sign-out</a>
              </div>
          </div>
          </h6>
        @endif
      </nav>
</div>
{{-- <img src="{{url('images/bg_images/cinema.jpg')}}"  alt="landinpage picture"  class="auth-landing-page-picture" />
 <div class="auth-overlay" ></div> --}}