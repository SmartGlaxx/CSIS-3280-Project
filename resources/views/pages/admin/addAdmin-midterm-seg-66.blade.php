@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
        <div class="container">
        <h3>Admin Sign-up</h3>
        <a href="{{url('sign-in-admin')}}" class="btn btn-primary">Admin Sign-in</a>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
        
            <form method="post" action="{{url('add-admin')}}" enctype="multipart/form-data" class="form-control">
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
                <input type="text" name="adminUserName" value="{{old('adminUserName')}}" class="form-control"/>
                @error("adminUserName")
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
                <input type="hidden" value="true" name="isAdmin"/>
                <button type="submit" name="registerAdmin" class="btn btn-success">Register</button>
            </form>
        </div>
@endsection