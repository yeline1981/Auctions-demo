<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\LotsController;

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

Route::middleware(['auth','admin'])->group(function () {
    //
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    

    Route::resources([
        'categories' => CategoriesController::class,
        'lots' => LotsController::class,
        'image' => ImagesController::class,
        'lots.images' => LotsImagesController::class
    ]);    

});

require __DIR__.'/auth.php';