@extends('partials/pageHeader-seg-66')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage spacer-3">
        <h3>Administrators on Movie Club</h3>
        <div class="table-responsive">
        <table style="list-table">
        <thead>
            <tr>
                <th></th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        @foreach ($data as $admin)
            <tr>
                <td>
                <?php
                    if($admin->profilePicture != null){?>
                    <img src="{{url('images/profilePictures/'. $admin->profilePicture )}}" alt="Profile picture" class="thumbnail-picture"/>
                <?php }else{ ?>
                    <img src="{{url('images/placeholders/profile_placeholder.jpg')}}" alt="Profile picture" class="thumbnail-picture"/>
                <?php } ?>
                </td>      
                <td>{{$admin->adminUserName}}</td>    
                <td>{{$admin->firstName}}</td> 
                <td>{{$admin->lastName}}</td>    
                <td>{{$admin->email}}</td>    
                <td>{{$admin->phone}}</td>  
            </tr>
        @endforeach
        </table>
        </div>
    </div>
@endsection
@include("partials/footer-seg-66")