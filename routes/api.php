<?php

use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\ShowController;
use App\Http\Controllers\Api\VenueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('artists', ArtistController::class);
route::post('artists/{artist}',[ArtistController::class,'update']);
Route::post('delete-artist', [ArtistController::class, 'destroy']);

Route::resource('venues', VenueController::class);
route::post('venue/{venue}',[VenueController::class,'update']);
Route::post('delete-venue', [VenueController::class, 'destroy']);

Route::resource('shows', ShowController::class);
route::post('show',[ShowController::class,'update']);
Route::get('delete-show/{show}',[ShowController::class, 'destroy']);


route::post('addArtist',[ShowController::class,'addArtist']);
Route::post('delete-artist', [ShowController::class, 'deleteArtist']);
route::post('changeVenue',[ShowController::class,'changeVenue']);