<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AdvertiserAdvertisementsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;

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
Route::get('advertiser/{id}',[AdvertiserAdvertisementsController::class,'getAdvertiserAdvertisements']);
Route::apiResource('tags', TagsController::class);
Route::apiResource('categories', CategoriesController::class);
Route::apiResource('advertisements', AdvertisementController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
