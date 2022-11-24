@extends("pages/admin/adminProfile-midterm-seg-66")
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
        <form method="post" action="{{url('update-admin-profile/' . $id)}}" class="form-control" enctype="multipart/form-data">
        @csrf
            <table>
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
                <td><input type="phone" name= "phone" value="{{$phone}}" class="form-control"/>
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
                <td><button type="submit" mame ="updateBtn" class="btn btn-secondary">Update Profile</button></td>
            </tr>
        </table>
        </form>
    </div>
@endsection