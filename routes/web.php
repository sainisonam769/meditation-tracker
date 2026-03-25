<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MeditationSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home → dashboard redirect
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Meditation Sessions CRUD
    Route::resource('sessions', MeditationSessionController::class);

    // API (Bonus Feature)
    Route::get('/api/meditation-sessions', function () {

        $query = auth()->user()->sessions();

        // optional filters (bonus enhancement)
        if (request('start_date')) {
            $query->whereDate('session_date', '>=', request('start_date'));
        }

        if (request('end_date')) {
            $query->whereDate('session_date', '<=', request('end_date'));
        }

        return response()->json($query->latest()->get());
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth routes (login/register)
require __DIR__.'/auth.php';