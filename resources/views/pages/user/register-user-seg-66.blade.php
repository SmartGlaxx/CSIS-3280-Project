@extends('layouts/layout-seg-66')
@include('partials/auth-header-seg-66')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
<div class="img-box">
    <img src="{{url('images/bg_images/cinema.jpg')}}" alt="landinpage picture"  class="landing-page-picture" />
    <div class="overlay"></div>
</div>
    <div class="container auth-container spacer-1">
        <div class="auth-inner-container">
        <h3 class="title">MOVIES CLUB <span class="title-inner">Movie Fan Sign-up</span></h3>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
            <form method="post" action="{{url('register-user-seg-66')}}" enctype="multipart/form-data" class="form-control form">
                @csrf
                <table class="sign-up-table">
                <tr><td><label class="form-label" >First Name</label></td>
                <td><input type="text" name="firstName" value="{{old('firstName')}}" class="form-control"/></td></tr>
                @error("firstName")
                <div class="alert alert-danger">{{$message}}</div> 
                @enderror
                <tr><td><label class="form-label" >Last Name</label></td>
                <td><input type="text" name="lastName" value="{{old('lastName')}}" class="form-control"/></td><tr>
                @error("lastName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <tr><td><label class="form-label" >User Name</label></td>
                <td><input type="text" name="userName" value="{{old('userName')}}" class="form-control"/></td></tr>
                @error("userName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <tr><td><label class="form-label" >Email</label></td>
                <td><input type="email" name="email" value="{{old('email')}}" class="form-control"/></td></tr>
                @error("email")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <tr><td><label class="form-label" >Password</label></td>
                <td><input type="password" name="password"  class="form-control"/></td></tr>
                @error("password")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <tr><td><label class="form-label" >Comfirm Password</label></td>
                <td><input type="password" name="comfirmPassword"  class="form-control"/></td></tr>
                @error("comfirmPassword")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <tr><td><label class="form-label" >Profile Picture</label></td>
                <td><input type="file" name="profilePicture" value="{{old('profilePicture')}}" 
                class="form-control"/></td></tr>

                <tr><td><label class="form-label" >Cover Picture</label></td>
                <td><input type="file" name="coverPicture" value="{{old('coverPicture')}}" 
                class="form-control"/></td></tr>

                <tr><td><label class="form-label" >Phone</label></td>
                <td><input type="text" name="phone" value="{{old('phone')}}" class="form-control"/></td></tr>
                @error("phone")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <tr><td><label class="form-label" >Select Admin</label></td>
                <td>
                <div class="dropdown" >
                    <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="profile-name"><span>Select admin</span></span> 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <table class="select-admin">
                        @foreach ($admin as $userAdmin)
                        <tr>
                            <td>{{ucfirst($userAdmin->adminUserName)}}</td>
                            <td>
                            <?php if($userAdmin->profilePicture){ ?>
                            <img src="{{url('images/profilePictures/' .$userAdmin->profilePicture)}}" alt="admin picture"
                            class="profile-picture-dropdown"/>
                            <?php }else{ ?>
                            <img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="admin picture"
                            class="profile-picture-dropdown"/>
                            <?php } ?>
                            </td>
                            <td><input value="{{$userAdmin->adminUserName}}" type="radio" 
                                name= "adminUserName" <?php echo "checked='checked'" ?> />
                            </td>
                        </tr>
                        @endforeach 
                        </table>
                    </div>
                </div>

                </td>
                <tr>
                    <td><input type="checkbox" name="about" ></td>
                    <td>I have read the <a href="/about-seg-66">about</a> section of this website and fully <br/>
                        understand my responsibility to use content based on the<br/>
                         color guides</td>
                </tr>
                @error("about")
                <div class="alert alert-danger">{{$message}}</div> 
                @enderror
                <tr>
                    <td>Already registered? <a href="{{url('sign-in-user-seg-66')}}" class="btn btn-default">Sign-in</a></td>
                    <td><button type="submit" name="" class="btn btn-default auth-btn">Register</button></td>
                </tr>
                </table>
            </form>
        </div>
@endsection
@include("partials/footer-seg-66")
