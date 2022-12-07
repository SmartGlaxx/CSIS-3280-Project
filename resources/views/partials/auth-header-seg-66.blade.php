<div class="page-top" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
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
              <a class="nav-link" href="/about-seg-66">About Movies Club</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/viewcard-seg-66">Earn View Cards</a>
            </li>

            @if(!session("userUserName") && !session('adminUserName'))
        <li class="dropdown" >
            <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="profile-name"><span>Admin</span></span> 
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <a href="/register-admin-seg-66" class="btn dropdown-item">Sign-up</a>
            <a href="/sign-in-admin-seg-66" class="btn dropdown-item">Sign-in</a>
            </div>
        </li>
        <li class="dropdown" >
            <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="profile-name"><span>Movie Fan</span></span> 
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
            <a href="/register-user-seg-66" class="btn dropdown-item">Sign-up</a>
            <a href="/sign-in-user-seg-66" class="btn dropdown-item">Sign-in</a>
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
              <a href="/user-profile-seg-66/{{session("userUserName")}}" class="btn dropdown-item">My profile</a>
              @endif
              @if(session("adminUserName") && !session("userUserName"))
              <a href="/admin-profile-seg-66/{{session("adminUserName")}}" class="btn dropdown-item">My profile</a>
              @endif
              </div>
          </div>
          </h6>
        @endif
      </nav>
</div>