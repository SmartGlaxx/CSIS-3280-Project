@extends("pages/admin/adminProfile-midterm-seg-66")
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage">
        <h3>All Admins</h3>
        <table>
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Username</td>
                <td>Phone</td>
            </tr>
        <thead>
        @foreach ($data as $admin)
            <tr>
                <td>{{$admin->firstName}}</td>    
                <td>{{$admin->lastName}}</td>    
                <td>{{$admin->adminUserName}}</td>    
                <td>{{$admin->phone}}</td>    
            </tr>
        @endforeach
        </table>
    </div>
@endsection