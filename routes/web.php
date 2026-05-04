<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\member\Dashboard\DashboardMainController;
use App\Http\Controllers\member\Projects\projectsMainController;
use App\Http\Controllers\member\Tasks\TaskMainController;
use App\Http\Controllers\member\Notes\NoteMainController;
use App\Http\Controllers\Owner\OwnerMainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('landing.page');
});

// admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Category
        Route::controller(AdminMainController::class)->group(function () {
            // create data category
            Route::post('/store/category', 'storecat')->name('store.cat');
        });
    });
});

// Owner routes
Route::middleware(['auth', 'verified', 'rolemanager:owner'])->group(function () {
    Route::prefix('owner')->group(function () {
        Route::controller(OwnerMainController::class)->group(function () {
            Route::get('/owner', 'index')->name('owner.dashboard');
        });
    });
});

// Member routes
Route::middleware(['auth', 'verified', 'rolemanager:member'])->group(function () {
    Route::prefix('member')->group(function () {
        Route::controller(DashboardMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('member');
        });
        Route::controller(projectsMainController::class)->group(function () {
            Route::get('/projects', 'projects')->name('member.projects');
        });
        Route::controller(TaskMainController::class)->group(function () {
            Route::get('/tasks', 'tasks')->name('member.tasks');
        });
        Route::controller(NoteMainController::class)->group(function () {
            Route::get('/notes', 'notes')->name('member.notes');
        });
    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
