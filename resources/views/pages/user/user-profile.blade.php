@extends('partials/pageHeader')
@if(!session("userUserName"))
    <div>Account not found</div>
@endif

@section("innerContent")
<?php  
$slideImages = array();
$rand1 = rand(1, 40);
for($i = $rand1; $i < $rand1+1; $i++){
    $slideImages1  = $allMovies[$i]["backgroundImage"]["url"];
    $title1 = $allMovies[$i]["title"];
}
$rand2 = rand(1, 40);
for($i = $rand2; $i < $rand2+1; $i++){
    $slideImages2  = $allMovies[$i]["backgroundImage"]["url"];
    $title2 = $allMovies[$i]["title"];
}
$rand3 = rand(1, 40);
for($i = $rand3; $i < $rand3+1; $i++){
    $slideImages3  = $allMovies[$i]["backgroundImage"]["url"];
    $title3 = $allMovies[$i]["title"];
}

?>
    <div class="container subPage" >
        <h3>Top Trending Movies</h3><br/>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 slide-image" src={{$slideImages1}} alt="Trending movies">
                  <div class="carousel-caption d-none d-md-block">
                    <h2>{{$title2}}</h2>
                </div>                    
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 slide-image" src={{$slideImages2}} alt="Trending movies">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>{{$title2}}</h2>
                    </div>                    
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 slide-image" src={{$slideImages3}} alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>{{$title3}}</h2>
                    </div>                    
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>


  
@include("partials/footer")