<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PlaylistController;


//show add admin form
Route::get('/add-admin', [AdminController::class, "addAdminPage"]);
//show all admin list
Route::get("/list-admins", [AdminController::class, "listAdmins"]);
//function to operate on admin
Route::post('/add-admin', [AdminController::class, "addAdmin"]);
//sign-in an admin page
Route::get("/sign-in-admin",[AdminController::class, "signInAdminPage"]);
//sign-in an admin function
Route::post("/sign-in-admin",[AdminController::class, "signInAdmin"]);
//show admin profile
Route::get("/admin-profile/{id}",[AdminController::class, "adminProfile"]);
//Sign out admin
Route::get("/sign-out-admin",[AdminController::class, "signOut"]);
//Show Admin update page
Route::get("/update-admin-profile/{adminUserName}",[AdminController::class, "updateProfile"]);
//Admin update function
Route::post("/update-admin-profile/{id}",[AdminController::class, "updateProfileFunction"]);
//Delete Admin profile
Route::get("/delete-admin-profile/{id}", [AdminController::class, "deleteProfileFunction"]);




//show add user form
Route::get('/add-user', [UserController::class, "addUserPage"]);
// function to operate on users
Route::post('/add-user', [UserController::class, "addUser"]);
//show sign-in user form
Route::get('/sign-in-user', [UserController::class, "signInUserPage"]);
//sign-in user function
Route::post('/sign-in-user', [UserController::class, "signInUserFunction"]);
//show all user list
Route::get("/list-users", [UserController::class, "listUsers"]);
//show user profile
Route::get("/user-profile/{id}",[UserController::class, "userProfile"]);
//show admin playlists
Route::get("/view-playlists/{id}",[UserController::class, "usersPlayLists"]);
//Sign out user
Route::get("/sign-out-user",[UserController::class, "signOut"]);
//Show User update page
Route::get("/update-user-profile/{userUserName}",[UserController::class, "updateProfile"]);
//User update function
Route::post("/update-user-profile/{id}",[UserController::class, "updateProfileFunction"]);
//Delete User profile
Route::get("/delete-user-profile/{id}", [UserController::class, "deleteProfileFunction"]);



//show all movies
Route::get("/list-movies/{id}/{themeColor}/{admin}",[MovieController::class, "getMovies"]);
//show add movie to a playlist page
// Route::get("/add-to-playlist/{id}/{admin}", [MovieController::class, "addMovieToPlaylistPage"]);
// Route::get("/add-to-playlist/{id}/{admin}", [MovieController::class, "getMovies"]);



//get all admin playlist page
Route::get("/list-playlists/{admin}", [PlaylistController::class, "listAdminPlaylistPage"]);
//get all admin playlist page by a user
Route::get("/list-playlists/{userName}/{admin}", [PlaylistController::class, "listUserPlaylistPage"]);
//create playlist page
Route::get("/create-playlist", [PlaylistController::class, "createPlaylistPage"]);
//create playlist function
Route::post("/create-playlist", [PlaylistController::class, "createPlaylist"]);
//add movie to a playlist function
Route::get("/add-to-playlist/{id}/{playlistId}/{themeColor}/{adminUserName}", [PlaylistController::class, "addMovieToPlaylist"]);
//show movies in a playlist function
Route::get("/show-playlist-movies/{playlistId}/{playlistColor}/{adminUserName}", [PlaylistController::class, "showMoviesInPlayList"]);
//show update playlist page
Route::get("/update-playlist/{id}", [PlaylistController::class, "updatePlayList"]);
//show update playlist function
Route::post("/update-playlist/{id}", [PlaylistController::class, "updatePlayListFunction"]);
//delete playlist function
Route::get("/delete-playlist/{id}", [PlaylistController::class, "deletePlayList"]);
