<?php

use App\Http\Controllers\UploadController;
use App\Models\Media;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['doNotCacheResponse'])->group(function () {
    Route::get('/', function () {
        return view('welcome', [
            'medially' => Media::latest()->get()
        ]);
    });
// });

// Route::middleware(['cacheResponse:300'])->group(function () {
    Route::prefix('cloudinary')->group(function () {
        Route::post('/', [UploadController::class, 'store'])->name('cloudinary.store');
        Route::get('/{id}/show', [UploadController::class, 'show'])->name('cloudinary.show');
        Route::delete('/{id}', [UploadController::class, 'destroy'])->name('cloudinary.destroy');
        Route::put('/{id}', [UploadController::class, 'update'])->name('cloudinary.update');

    });
});
