<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Api\DiseaseApiController;
use App\Http\Controllers\Api\PlantTypeApiController;
use App\Http\Controllers\Api\PlantDiaryApiController;
use App\Http\Controllers\Api\PlantCategoryApiController;
use App\Http\Controllers\Api\HomeScreenImageApiController;
use App\Http\Controllers\Api\PlantIdentificationApiController;

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


Route::get('/users', [AuthController::class, 'getRegisteredUser']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Home Screen Images
Route::get('/home-screen-images', [HomeScreenImageApiController::class, 'index']);

// Plant Disease API for field officer survey
Route::get('/plant-diseases', [DiseaseApiController::class, 'index']);
Route::post('/plant-disease/upload', [DiseaseApiController::class, 'uploadImage'])->name('plant_diaries.upload');
Route::post('/plant-disease', [DiseaseApiController::class, 'store']);
Route::get('/plant-disease/{id}/edit', [DiseaseApiController::class, 'edit']);
Route::put('/plant-disease/{id}', [DiseaseApiController::class, 'update']);
Route::delete('/plant-disease/{id}', [DiseaseApiController::class, 'destroy']);


// Plant Types APi
Route::post('/plant-type', [PlantTypeApiController::class, 'store']);
Route::delete('/plant-type/{id}', [PlantTypeApiController::class, 'destroy']);

// Plant Categories Api
Route::post('/plant-category', [PlantCategoryApiController::class, 'store']);


// Plant Diary API
Route::get('/plant-diaries', [PlantDiaryApiController::class, 'index']);
Route::post('/plant-diaries/upload', [PlantDiaryApiController::class, 'upload'])->name('plant_diaries.upload');
Route::post('/plant-diary', [PlantDiaryApiController::class, 'store']);
Route::get('/plant-diary/{id}/edit', [PlantDiaryApiController::class, 'edit']);
Route::put('/plant-diary/{id}', [PlantDiaryApiController::class, 'update']);
Route::delete('/plant-diary/{id}', [PlantDiaryApiController::class, 'destroy']);

//Plant Identification Api
Route::get('/plant-identifications', [PlantIdentificationApiController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/plant-identification', [PlantIdentificationApiController::class, 'store']);
});

Route::post('/plant-identification/upload', [PlantIdentificationApiController::class, 'upload'])->name('plant_identifications.upload');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//history routes
Route::post('/history', [HistoryController::class, 'store']);
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/history/{id}', [HistoryController::class, 'show']);
Route::put('/history/{id}', [HistoryController::class, 'update']);
Route::delete('/history/{id}', [HistoryController::class, 'destroy']);