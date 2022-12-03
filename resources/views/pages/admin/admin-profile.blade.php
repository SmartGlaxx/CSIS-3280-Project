@extends('partials/pageHeader')
@if(!session("adminUserName"))
    <div>Account not found</div>
@endif
@section("innerContent")
    <div class="container subPage">
        <div class="container">
        <div class="row ">
            <div class="col-sm-12 col-md-4 movie-card">
                <h1>12,000 followers</h1>
            </div>
            <div class="col-sm-12 col-md-1"></div>
            <div class="col-sm-12 col-md-7 movie-card">
                <h1>Revene: $134,000</h1>
            </div>
        </div>
    </div>
    </div>
@endsection
@include("partials/footer")