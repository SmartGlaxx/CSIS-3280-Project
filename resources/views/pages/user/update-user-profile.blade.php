@extends('partials/pageHeader')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage">
        <h3>Edit Profile</h3>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
        <form method="post" action="{{url('update-user-profile/' . $id)}}" class="form-control form" enctype="multipart/form-data">
        @csrf
            <table class="sign-in-table">
            <tr>
                <td>First Name</td>
                <td><input type="text" name= "firstName" value="{{$firstName}}" class="form-control"/>
                @error("firstName")
                <div>{{$message}}</div>
                @enderror
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name= "lastName" value="{{$lastName}}" class="form-control"/>
                @error("lastName")
                <div>{{$message}}</div>
                @enderror
                </td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="phone" name= "phone" value="{{$phone}}" class="form-control" />
                @error("phone")
                <div>{{$message}}</div>
                @enderror
                </td>
            </tr>
            <tr>
                <td>     
                    <label class="form-label" >Profile Picture</label>
                </td>
                <td>
                <input type="file" name="profilePicture" value="{{old('profilePicture')}}" 
                class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                <label class="form-label" >Cover Picture</label>
                </td>
                <td>
                <input type="file" name="coverPicture" value="{{old('coverPicture')}}" 
                class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Change Admin</td>
                <td>

                    <div class="dropdown" >
                        <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="profile-name"><span>Select admin</span></span> 
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <table class="select-admin">
                                @foreach ($admins as $userAdmin)
                                <tr>
                                    <td>{{ucfirst($userAdmin->adminUserName)}}</td>
                                    <td><img src="{{url('images/profilePictures/' .$userAdmin->profilePicture)}}" alt="admin picture"
                                    class="profile-picture-dropdown"/></td>
                                    <td><input value="{{$userAdmin->adminUserName}}" type="radio" 
                                        name= "adminUserName" <?php echo $userAdmin->adminUserName == session("userAdminsUserName") ? "checked='checked'" : null ?>
                                        /></td>
                                </tr>
                                @endforeach 
                            </table>
                        </div>
                    </div>
                </td>
            </tr>


            <tr><td></td>
                <td><button type="submit" mame ="updateBtn" class="btn btn-default auth-btn">Update Profile</button></td>
            </tr>
        </table>
        </form>
    </div>
@endsection
@include("partials/footer")