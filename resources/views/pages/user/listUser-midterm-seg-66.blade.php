@extends("pages/user/userProfile-midterm-seg-66")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage">
        <h3>All Users</h3>
        <table>
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>User's Admin</td>
            </tr>
        <thead>
        @foreach ($data as $user)
            <tr>
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