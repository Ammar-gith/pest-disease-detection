<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlantTypeController;
use App\Http\Controllers\Admin\PlantDiaryController;
use App\Http\Controllers\Admin\PlantCategoryController;
use App\Http\Controllers\Admin\PlantIdentificationController;
use App\Http\Controllers\Admin\DiseaseController;
use App\Http\Controllers\Admin\HomeScreenImageController;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/loginn', [AdminController::class, 'loginn']);
    Route::get('/admin/users-list', [AdminController::class, 'userList'])->middleware('is_admin')->name('user.list');
    Route::get('/admin/users-list/{id}', [AdminController::class, 'destroy'])->middleware('is_admin')->name('user.delete');


    // Home Screen Images
    Route::get('/admin/home-screen-images', [HomeScreenImageController::class, 'index'])->name('home_screen_images.index');
    Route::get('/admin/home-screen-image/create', [HomeScreenImageController::class, 'create'])->name('home_screen_images.create');
    Route::post('/admin/home-screen-image/upload', [HomeScreenImageController::class, 'uploadImage'])->name('home_screen_images.upload');
    Route::post('/admin/home-screen-image', [HomeScreenImageController::class, 'store'])->name('home_screen_images.store');
    Route::get('/admin/home-screen-image/{id}/show', [HomeScreenImageController::class, 'show'])->name('home_screen_images.show');
    Route::get('/admin/home-screen-image/{id}', [HomeScreenImageController::class, 'destroy'])->name('home_screen_images.delete');


    // Plant Types Route
    Route::get('/admin/plant-types', [PlantTypeController::class, 'index'])->name('plant_types.index');
    Route::get('/admin/plant-type/create', [PlantTypeController::class, 'create'])->name('plant_types.create');
    Route::post('/admin/plant-types', [PlantTypeController::class, 'store'])->name('plant_types.store');
    Route::get('/admin/plant-type/{id}/edit', [PlantTypeController::class, 'edit'])->name('plant_types.edit');
    Route::put('/admin/plant-type{id}', [PlantTypeController::class, 'update'])->name('plant_types.update');
    Route::get('/admin/plant-types/{id}', [PlantTypeController::class, 'destroy'])->name('plant_types.delete');


    // Plant Categories Route
    Route::get('/admin/plant-categories', [PlantCategoryController::class, 'index'])->name('plant_categories.index');
    Route::get('/admin/plant-category/create', [PlantCategoryController::class, 'create'])->name('plant_categories.create');
    Route::post('/admin/plant-categories', [PlantCategoryController::class, 'store'])->name('plant_categories.store');
    Route::get('/admin/plant-category/{id}/edit', [PlantCategoryController::class, 'edit'])->name('plant_categories.edit');
    Route::put('/admin/plant-category/{id}', [PlantCategoryController::class, 'update'])->name('plant_categories.update');
    Route::get('/admin/plant-categories/{id}', [PlantCategoryController::class, 'destroy'])->name('plant_categories.delete');

    // Plant Diaries Route
    Route::get('/admin/plant-diaries', [PlantDiaryController::class, 'index'])->name('plant_diaries.index');
    Route::get('/admin/plant-diary/create', [PlantDiaryController::class, 'create'])->name('plant_diaries.create');
    Route::post('/plant-diaries/upload', [PlantDiaryController::class, 'upload'])->name('plant_diaries.upload');
    Route::post('/admin/plant-diaries', [PlantDiaryController::class, 'store'])->name('plant_diaries.store');
    Route::get('/admin/plant-diary/{id}/edit', [PlantDiaryController::class, 'edit'])->name('plant_diaries.edit');
    Route::put('/admin/plant-diary/{id}', [PlantDiaryController::class, 'update'])->name('plant_diaries.update');
    Route::get('/admin/plant-diaries/{id}', [PlantDiaryController::class, 'destroy'])->name('plant_diaries.delete');

    // Plant Identifications Route
    Route::get('/admin/plant-identifications', [PlantIdentificationController::class, 'index'])->name('plant_identifications.index');
    Route::get('/admin/plant-identification/create', [PlantIdentificationController::class, 'create'])->name('plant_identifications.create');
    Route::post('/admin/plant-identification/upload', [PlantIdentificationController::class, 'upload'])->name('plant_identifications.upload');
    Route::post('/admin/plant-identification', [PlantIdentificationController::class, 'store'])->name('plant_identifications.store');
    Route::get('/admin/plant-identification/{id}/edit', [PlantIdentificationController::class, 'edit'])->name('plant_identifications.edit');
    Route::put('/admin/plant-identification/{id}', [PlantIdentificationController::class, 'update'])->name('plant_identifications.update');
    Route::get('/admin/plant-identification/{id}/show', [PlantIdentificationController::class, 'show'])->name('plant_identifications.show');
    Route::get('/admin/plant-identification/{id}', [PlantIdentificationController::class, 'destroy'])->name('plant_identifications.delete');


    // Plant Disease routes
    Route::get('/admin/plant-diseases', [DiseaseController::class, 'index'])->name('plant_diseases.index');
    Route::get('/admin/plant-disease/create', [DiseaseController::class, 'create'])->name('plant_diseases.create');
    Route::post('/admin/plant-disease/upload', [DiseaseController::class, 'uploadImage'])->name('plant_diseases.upload');
    Route::post('/admin/plant-disease', [DiseaseController::class, 'store'])->name('plant_diseases.store');
    Route::get('/admin/plant-disease/{id}/edit', [DiseaseController::class, 'edit'])->name('plant_diseases.edit');
    Route::put('/admin/plant-disease/{id}', [DiseaseController::class, 'update'])->name('plant_diseases.update');
    Route::get('/admin/plant-disease/{id}', [DiseaseController::class, 'destroy'])->name('plant_diseases.delete');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
