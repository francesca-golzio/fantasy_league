<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AbilityController;
use App\Http\Controllers\Admin\CharacterController;
use App\Http\Controllers\Admin\EventTypeController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\ProfileController;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Root redirect */
Route::get('/', function () {

    return Auth::check() 
        /* IF Guest - Redirect to Login */
        ? redirect()->route('login') 
        /* ELSE - Redirect to Dashboard */
        : redirect()->route('dashboard');

});

/* Dashboard role redirect */
Route::get('/dashboard', function () {
    /* IF Admin - Redirect to Admin Dashboard */
    if (Auth::user()->role == UserRole::Admin) {
        return redirect()->route('admin.dashboard');
    }
    /* ELSE - Redirect to User Dashboard */
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/* User Profile Routes */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Admin-only Routes */
Route::middleware(['auth', 'verified', 'admin'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        /* Admin */
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
        /* Characters */
        Route::resource('characters', CharacterController::class);
        Route::resource('abilities', AbilityController::class);

        /* Events */
        Route::resource('events', EventTypeController::class);
});
        
/* Players &Admin Routes */
Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::resource('leagues', LeagueController::class);
    });

require __DIR__.'/auth.php';
