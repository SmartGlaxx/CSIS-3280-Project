@extends('layouts/layout')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("content")
        <div class="container">
        <h3>Create User Account</h3>
        <a href="{{url('list-users')}}" class="btn btn-primary">View All Users</a>
        @if(Session::has("success"))
            <div class="alert alert-success">{{Session::get("success")}}</div>
        @endif
        @if(Session::has("failed"))
            <div class="alert alert-danger">{{Session::get("failed")}}</div>
        @endif
            <form method="post" action="{{url('add-user')}}" class="form-control col-sm-12 col-md-6">
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
                <label class="form-label" >Phone</label>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control"/>
                @error("phone")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label class="form-label" >Select Admin</label>
                <select name="adminUserName" class="form-control">
                    @foreach ($admin as $userAdmin)
                        <option value="{{$userAdmin->adminUserName}}">
                        <?php var_dump($userAdmin) ?>    
                        </option>
                    @endforeach
                </select>
                <button type="submit" name="registerAdmin" class="btn btn-success"
                style="margin-top:3rem">Register</button>
            </form>
        </div>
@endsection