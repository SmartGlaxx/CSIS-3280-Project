@extends('partials/pageHeader')
@section("header")
    {{-- Smart Egbuchulem - 300333966 --}}
@endsection

@section("innerContent")
    <div class="container subPage">
        <?php $username = session('userUserName') ?>
        <h3>Edit Review</h3>
        @if(Session::has("updated"))
            <div class="alert alert-warning">{{Session::get("updated")}}</div>
        @endif
        <form method="post" action="{{url('update-review/' . $review['id']. "/". $username)}}" class="form-control form" enctype="multipart/form-data" >
        @csrf
        <div class="table-responsive">
            <table class="table">
            <tr>
                <td>Title</td>
                <td><input type="text" name= "title" value="{{$review["title"]}}" class="form-control"/>
                @error("title")
                <div>{{$message}}</div>
                @enderror
                </td>
            </tr>
            <tr>
                <td>Review</td>
                <td><textarea type="text" name= "post" class="form-control">{{$review["post"]}}</textarea>
                @error("post")
                <div>{{$message}}</div>
                @enderror
                </td>
            </tr>
            <tr>
                <td><button type="submit" mame ="updateBtn" class="btn btn-outline-warning">Update Review</button></td>
            </tr>
        </table>
        </div>
        </form>
    </div>
@endsection
@include("partials/footer")