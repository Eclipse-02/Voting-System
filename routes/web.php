<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'candidates'], function() {

        Route::get('/', [CandidateController::class, 'index'])->name('candidates.index');
        Route::post('/', [CandidateController::class, 'store'])->name('candidates.store');
        Route::match(['put', 'patch'],'/{candidate}', [CandidateController::class, 'update'])->name('candidates.update');
        Route::delete('/{candidate}', [CandidateController::class, 'destroy'])->name('candidates.destroy');
        Route::get('/{candidate}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');

        // visions route
        Route::get('/{candidate}/visions', [CandidateController::class, 'vision'])->name('visions.index');
        Route::post('/{candidate}/visions', [CandidateController::class, 'visionStore'])->name('visions.store');
        Route::delete('/{candidate}/visions/{vision}', [CandidateController::class, 'visionDestroy'])->name('visions.destroy');

        // missions route
        Route::get('/{candidate}/missions', [CandidateController::class, 'mission'])->name('missions.index');
        Route::post('/{candidate}/missions', [CandidateController::class, 'missionStore'])->name('missions.store');
        Route::delete('/{candidate}/missions/{mission}', [CandidateController::class, 'missionDestroy'])->name('missions.destroy');

    });

});
