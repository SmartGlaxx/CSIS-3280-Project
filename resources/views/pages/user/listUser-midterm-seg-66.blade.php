@extends("pages/user/userProfile-midterm-seg-66")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage">
        <h3>All Users</h3>
        <table class="list-table">
        <thead>
            <th></th>
            <th>UserName</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>User's Admin</th>
        <thead>
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
@endsection