@extends('partials/pageHeader-seg-66')
@section("header")
    Smart Egbuchulem - 300333966
@endsection

@section("innerContent")
    <div class="container subPage reviews-page spacer">
        <div>
            <?php $username = session("userUserName") ?>
            <h4>Reviews for {{$title}}</h4>
            <img src="{{$movieImage}}"  alt="movie-image" class="review-img"/>
            @if(Session::has("deleted"))
                <div class="alert alert-danger">{{Session::get("deleted")}}</div>
            @endif
            @if($reviews != null)

            @for ($i = count($reviews) - 1; $i > 0 ; $i--) 
                <div class="review-box">
                    <div class="review-time">{{$reviews[$i]["created_at"]}}</div>
                    <h6>{{ucfirst($reviews[$i]["title"])}}</h6>
                    <div>{{ucfirst($reviews[$i]["post"])}}</div>
                    <div >by {{$reviews[$i]["reviewer"]}}</div>
                    @if($username == $reviews[$i]["reviewer"])
                        <div class="review-buttons">
                        <a href = "{{url('edit-review-seg-66/' .$reviews[$i]['id'] . "/" . $username)}}" class="btn btn-default">Edit review</a>
                        <a href = "{{url('delete-review-seg-66/' .$reviews[$i]['id'])}}" class="btn btn-default">Delete review</a>
                        </div>
                    @endif
                </div>
            @endfor 
            @endif 
            @if($reviews == null)
                <div>No reviews for this movie yet. Be the first to leave a review</div>
            @endif
        </div>
        <h5 class="create-review">Add your review</h5>  
        <form method="post" action="{{url('post-review-seg-66/' . $movieID ."/" . $username)}}" class="review-form">
            @csrf
            <div class="table-responsive" >
            <table class="review-table ">
            <tr><td><label class="form-label" >Subject</label></td></tr>
            <tr><td><input type="text" name="title" value="{{old('title')}}" class="form-control"/></td></tr>
            @error("title")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <tr><td><label class="form-label" >Review</label></td></tr>
            <tr><td><textarea type="text" name="post" value="{{old('post')}}"  class="form-control"></textarea></td></tr>
            @error("post")
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <input type = "hidden" name="username" value="{{$username}}" />
            <input type = "hidden" name="movieID" value="{{$movieID}}" />
            <tr>
                <td><button type="submit" class="btn btn-default review-buttons">Post review</button></td>
            </tr>
        </table>
        </div>
    </div>
@endsection
@include("partials/footer-seg-66")