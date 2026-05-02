<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        if(auth()->user()->hasRole('admin')) {
            return redirect('/admin');
        }

        if(auth()->user()->hasRole('kasir')) {
            return redirect('/kasir');
        }

        if(auth()->user()->hasRole('owner')) {
            return redirect('/owner');
        }

        return view('dashboard');

    })->name('dashboard');

    Route::get('/admin', function () {
        // return 'Dashboard Admin';
        return view('admin.dashboard');
    });

    Route::get('/kasir', function () {
        return 'Dashboard Kasir';
    });

    Route::get('/owner', function () {
        return 'Dashboard Owner';
    });

});


// PROFILE ROUTES
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


require __DIR__.'/auth.php';