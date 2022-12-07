<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ReviewController;


//show landing page
Route::get("/", [PageController::class, "showLandingPage"]);
Route::get("/home-seg-66", [PageController::class, "showLandingPage"]);
//show about page
Route::get("/about-seg-66", [PageController::class, "showAboutPage"]);
//show viewcard page
Route::get("/viewcard-seg-66", [PageController::class, "showViewcardPage"]);



//show register admin form
Route::get('/register-admin-seg-66', [AdminController::class, "registerAdminPage"]);
//function to register on admin
Route::post('/register-admin-seg-66', [AdminController::class, "registerAdmin"]);
//show all admin list
Route::get("/list-admins-seg-66", [AdminController::class, "listAdmins"]);
//sign-in an admin page
Route::get("/sign-in-admin-seg-66",[AdminController::class, "signInAdminPage"]);
//sign-in an admin function
Route::post("/sign-in-admin-seg-66",[AdminController::class, "signInAdmin"]);
//show admin profile
Route::get("/admin-profile-seg-66/{id}",[AdminController::class, "adminProfile"]);
//Sign out admin
Route::get("/sign-out-admin-seg-66",[AdminController::class, "signOut"]);
//Show Admin update page
Route::get("/update-admin-profile-seg-66/{adminUserName}",[AdminController::class, "updateProfile"]);
//Admin update function
Route::post("/update-admin-profile-seg-66/{id}",[AdminController::class, "updateProfileFunction"]);
//Delete Admin profile
Route::get("/delete-admin-profile-seg-66/{id}", [AdminController::class, "deleteProfileFunction"]);



//show register user form
Route::get('/register-user-seg-66', [UserController::class, "registerUserPage"]);
// function to register user
Route::post('/register-user-seg-66', [UserController::class, "registerUser"]);
//show sign-in user form
Route::get('/sign-in-user-seg-66', [UserController::class, "signInUserPage"]);
//sign-in user function
Route::post('/sign-in-user-seg-66', [UserController::class, "signInUserFunction"]);
//show all user list
Route::get("/list-users-seg-66", [UserController::class, "listUsers"]);
//show user profile
Route::get("/user-profile-seg-66/{id}",[UserController::class, "userProfile"]);
//show admin playlists
Route::get("/view-playlists-seg-66/{id}",[UserController::class, "usersPlayLists"]);
//Sign out user
Route::get("/sign-out-user-seg-66",[UserController::class, "signOut"]);
//Show User update page
Route::get("/update-user-profile-seg-66/{userUserName}",[UserController::class, "updateProfile"]);
//User update function
Route::post("/update-user-profile-seg-66/{id}",[UserController::class, "updateProfileFunction"]);
//Delete User profile
Route::get("/delete-user-profile-seg-66/{id}", [UserController::class, "deleteProfileFunction"]);



//show all movies
Route::get("/list-movies-seg-66/{id}/{themeColor}/{admin}",[MovieController::class, "getMovies"]);



//get all admin playlist page
Route::get("/list-playlists-seg-66/{admin}", [PlaylistController::class, "listAdminPlaylistPage"]);
//get all admin playlist page by a user
Route::get("/list-playlists-seg-66/{userName}/{admin}", [PlaylistController::class, "listUserPlaylistPage"]);
//create playlist page
Route::get("/create-playlist-seg-66", [PlaylistController::class, "createPlaylistPage"]);
//create playlist function
Route::post("/create-playlist-seg-66", [PlaylistController::class, "createPlaylist"]);
//add movie to a playlist function
Route::get("/add-to-playlist-seg-66/{id}/{playlistId}/{themeColor}/{adminUserName}", [PlaylistController::class, "addMovieToPlaylist"]);
//show movies in a playlist function
Route::get("/show-playlist-movies-seg-66/{playlistId}/{playlistColor}/{adminUserName}", [PlaylistController::class, "showMoviesInPlayList"]);
//show update playlist page
Route::get("/update-playlist-seg-66/{id}", [PlaylistController::class, "updatePlayList"]);
//show update playlist function
Route::post("/update-playlist-seg-66/{id}", [PlaylistController::class, "updatePlayListFunction"]);
//delete playlist function
Route::get("/delete-playlist-seg-66/{id}", [PlaylistController::class, "deletePlayList"]);



//View movie reviews
Route::get("/reviews-seg-66/{id}", [ReviewController::class, "showReviews"]);
//post a review
Route::post("/post-review-seg-66/{id}/{userName}", [ReviewController::class, "postReview"]);
//show update review page
Route::get("/edit-review-seg-66/{id}/{userName}", [ReviewController::class, "editReview"]);
//update a review
Route::post("/update-review-seg-66/{id}/{userName}", [ReviewController::class, "updateReview"]);
//delete a review
Route::get("/delete-review-seg-66/{id}", [ReviewController::class, "deleteReview"]);





