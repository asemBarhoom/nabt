<?php

use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DestinationController;
use App\Http\Controllers\API\ToureventController;
use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\SubscribeController;
use App\Http\Controllers\API\StepController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\PageController;
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

Route::get('settings' , [SettingController::class,'index']);
Route::get('testimonials' , [TestimonialController::class,'index']);
Route::get('categories' , [CategoryController::class,'index']);
Route::get('destinations' , [DestinationController::class,'index']);
Route::get('tourevents' , [ToureventController::class,'index']);
Route::get('partners' , [PartnerController::class,'index']);
Route::get('steps' , [StepController::class,'index']);
Route::apiResource('posts' , PostController::class);
Route::apiResource('pages' , PageController::class);
Route::post('subscribe' , [SubscribeController::class,'store']);
