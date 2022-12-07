@extends('partials/pageHeader-seg-66')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage spacer-3">
        <h3>Movie Fans</h3>
        <div class="table-responsive">
        <table class="list-table">
        <thead>
            <th></th>
            <th>UserName</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>User's Admin</th>
        </thead>
        @foreach ($data as $user)
            <tr>
                <td>
                <?php
                    if($user->profilePicture != null){?>
                    <img src="{{url('images/profilePictures/'. $user->profilePicture )}}" alt="Profile picture" class="thumbnail-picture"/>
                <?php }else{ ?>
                    <img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="Profile picture" class="thumbnail-picture"/>
                <?php } ?>
                </td>  
                <td>{{$user->userName}}</td>    
                <td>{{$user->firstName}}</td> 
                <td>{{$user->lastName}}</td>    
                <td>{{$user->email}}</td>    
                <td>{{$user->phone}}</td>  
                <td>{{$user->adminUserName}}</td>  
            </tr>  
        @endforeach
        </table>
        </div>
    </div>
@endsection
@include("partials/footer-seg-66")