@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
        <div class="container">
        <h3>Create User Account</h3>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
            <form method="post" action="{{url('add-user')}}" enctype="multipart/form-data" class="form-control col-sm-12 col-md-6">
                @csrf
                <label class="form-label" >First Name</label>
                <input type="text" name="firstName" value="{{old('firstName')}}" class="form-control"/>
                @error("firstName")
                <div class="alert alert-danger">{{$message}}</div> 
                @enderror
                <label class="form-label" >Last Name</label>
                <input type="text" name="lastName" value="{{old('lastName')}}" class="form-control"/>
                @error("lastName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >User Name</label>
                <input type="text" name="userName" value="{{old('userName')}}" class="form-control"/>
                @error("userName")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control"/>
                @error("email")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >Password</label>
                <input type="password" name="password"  class="form-control"/>
                @error("password")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >Comfirm Password</label>
                <input type="password" name="comfirmPassword"  class="form-control"/>
                @error("comfirmPassword")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <label class="form-label" >Profile Picture</label>
                <input type="file" name="profilePicture" value="{{old('profilePicture')}}" 
                class="form-control"/>

                <label class="form-label" >Cover Picture</label>
                <input type="file" name="coverPicture" value="{{old('coverPicture')}}" 
                class="form-control"/>

                <label class="form-label" >Phone</label>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control"/>
                @error("phone")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >Select Admin</label>
                <div name="adminUserName" class="form-control adminlist" onclick=showAdmins()>
                    <div>Click to select admin</div>
                    <div class="adminOptions not-show">
                        <div class="innerAdminOptions" style="background: red"  onclick=hideAdmins()>
                        <table>
                        @foreach ($admin as $userAdmin)
                         {{-- <input type='hidden' name="radioValue" value="{{$userAdmin->adminUserName}}" --}}
                         />
                            <tr>
                                <td>{{ucfirst($userAdmin->adminUserName)}}</td>
                                <td><img src="{{url('images/profilePictures/' .$userAdmin->profilePicture)}}" alt="admin picture"
                                class="profile-picture-dropdown"/></td>
                                <td><input value="{{$userAdmin->adminUserName}}" type="radio" 
                                    name= "adminUserName" <?php echo "checked='checked'" ?>
                                    /></td>
                            </tr>
                        @endforeach 
                        </table> 
                        </div>
                    </div>
                </div> 
                <button type="submit" name="registerAdmin" class="btn btn-success"
                style="margin-top:3rem">Register</button>
            </form>
            <a href="{{url('/sign-in-user')}}" class="btn btn-primary">Login</a>
        </div>
@endsection

<script>
    function showAdmins(){
        document.querySelector('.adminOptions').classList.toggle('not-show');
        document.querySelector('.icon1').classList.toggle('not-show');
    }

    function hideAdmins(){
        document.querySelector('.adminOptions').classList.add('not-show');
    }
</script>