@extends('partials/pageHeader')
@if(!session("userUserName"))
    <div>Account not found</div>
@endif

@section("innerContent")
<?php  
// $slideImages = array();
$movieInfo = array();
function randomMovie($allMovies){
    $rand = rand(1, count($allMovies) - 1);
    for($i = $rand; $i < $rand+1; $i++){
        $slideImage  = $allMovies[$i]["backgroundImage"]["url"];
        $title = $allMovies[$i]["title"];
        $movieInfo[0] = $slideImage;
        $movieInfo[1] = $title;
    }
    return $movieInfo;
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
                  <img class="d-block w-100 slide-image" src={{randomMovie($allMovies)[0]}} alt="Trending movies">
                  <div class="carousel-caption d-none d-md-block">
                    <h2>{{ randomMovie($allMovies)[1]}}</h2>
                </div>                    
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 slide-image" src={{randomMovie($allMovies)[0]}} alt="Trending movies">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>{{ randomMovie($allMovies)[1]}}</h2>
                    </div>                    
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 slide-image" src={{randomMovie($allMovies)[0]}} alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>{{ randomMovie($allMovies)[1]}}</h2>
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
          <div class="row">
              <div class="col-sm-12 col-md-6">
                <h4 class="box-office-subheading">Box office classics</h4>
                <div class="col-sm-12 col-md-6 image-box">
                    <img class="d-block w-100 boc-image" src={{randomMovie($allMovies)[0]}} alt="Second slide">
                </div>
                <div class="col-sm-12 col-md-6 image-box">
                    <img class="d-block w-100 boc-image" src={{randomMovie($allMovies)[0]}} alt="Second slide">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 image-box">
                <h3 class="box-office-subheading">Kids favourites</h3>
                <img class="d-block w-100 boc-image" src={{randomMovie($allMovies)[0]}} alt="Second slide">
            </div>
          </div>
    </div>


  
@include("partials/footer")