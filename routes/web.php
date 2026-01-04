<?php

use App\Models\Report;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AdminDonationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    $reports = $user->reports()->latest()->get();
    return view('dashboard', ['reports' => $reports]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/lapor', [ReportController::class, 'store'])
    ->middleware('auth')
    ->name('reports.store');

    Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/admin/reports/{report}', [AdminController::class, 'update'])->name('admin.reports.update');
});

Route::get('/donasi', [DonationController::class, 'index']);
Route::post('/donasi', [DonationController::class, 'store']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/donations', [AdminDonationController::class, 'index'])
        ->name('admin.donations.index');
});

Route::delete('/lapor/{report}', [ReportController::class, 'destroy'])
    ->middleware('auth')
    ->name('reports.destroy');


require __DIR__.'/auth.php';
