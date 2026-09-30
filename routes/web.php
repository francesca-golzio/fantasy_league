<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Characters\CharacterController;
use App\Http\Controllers\Admin\EventTypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Root redirect based on auth state/role */
Route::get('/', function () {

    /* IF Guest - Redirect to Login */
    if (!Auth::user()) {
        return redirect()->route('login');

    } else {

        /* IF Admin - Redirect to Admin Dashboard */
        if (Auth::user()?->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        /* ELSE - User Redirect to User Dashboard */
        return redirect()->route('dashboard');
    }

});

/* User Dashboard */
Route::get('/dashboard', function () {
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

        /* Events */
        Route::resource('events', EventTypeController::class);
});

require __DIR__.'/auth.php';
