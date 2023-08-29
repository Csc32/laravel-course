<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UsersController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ListingController::class, "index"]);

// single listing


//show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware("auth");

// store listing data
Route::post('/listings', [ListingController::class, "store"])->middleware("auth");

// show edit form

Route::get('/listings/{listing}/edit', [ListingController::class, "edit"])->middleware("auth");

Route::put("/listings/{listing}/update", [ListingController::class, "update"])->middleware("auth");
//delete method
Route::delete("/listings/{listing}/delete", [ListingController::class, "destroy"])->middleware("auth");

//Manage Listings
Route::get("/listings/manage", [ListingController::class, "manage"])->middleware("auth");
//single listing
Route::get('/listings/{listing}', [ListingController::class, "show"]);

// show register form

Route::get("/register", [UsersController::class, "create"])->middleware("guest");


//create user route

Route::post("/users", [UsersController::class, "store"]);

//logout route

Route::post("/logout", [UsersController::class, "logout"])->middleware("auth");

//show login form

Route::get("/login", [UsersController::class, "login"])->name("login")->middleware("guest");

//log in route

Route::post("/users/authenticate", [UsersController::class, "authenticate"]);
