@extends("pages/admin/adminProfile-midterm-seg-66")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage">
        <h3>All Admins</h3>
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
        <thead>
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
@endsection