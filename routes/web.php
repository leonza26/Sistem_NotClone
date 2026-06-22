<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\member\Activity\ActivityMainController;
use App\Http\Controllers\member\AI\AIMainController;
use App\Http\Controllers\member\Dashboard\DashboardMainController;
use App\Http\Controllers\member\Notes\NoteMainController;
use App\Http\Controllers\member\Projects\projectsMainController;
use App\Http\Controllers\member\Tasks\TaskCommentController;
use App\Http\Controllers\member\Tasks\TaskMainController;
use App\Http\Controllers\member\Workspace\WorkspaceMainController;
use App\Http\Controllers\member\Workspace\WorkspaceMemberController;
use App\Http\Controllers\Owner\OwnerMainController;
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
            Route::get('/projects', 'index')->name('member.projects');
            Route::get('/projects/create', 'create')->name('member.projects.create');
            Route::post('/projects', 'store')->name('member.projects.store');
            Route::get('/projects/{project}/edit', 'edit')->name('member.projects.edit');
            Route::put('/projects/{project}', 'update')->name('member.projects.update');
            Route::delete('/projects/{project}', 'destroy')->name('member.projects.destroy');
        });
        Route::controller(TaskMainController::class)->group(function () {
            Route::get('/tasks', 'index')->name('member.tasks');
            Route::get('/tasks/create', 'create')->name('member.tasks.create');
            Route::post('/tasks', 'store')->name('member.tasks.store');
            Route::get('/tasks/{task}', 'show')->name('member.tasks.show');
            Route::get('/tasks/{task}/edit', 'edit')->name('member.tasks.edit');
            Route::put('/tasks/{task}', 'update')->name('member.tasks.update');
            Route::patch('/tasks/{task}/status', 'updateStatus')->name('member.tasks.updateStatus');
            Route::delete('/tasks/{task}', 'destroy')->name('member.tasks.destroy');
        });

        Route::controller(TaskCommentController::class)->group(function () {
            Route::post('/tasks/{task}/comments', 'store')->name('member.tasks.comments.store');
            Route::delete('/comments/{comment}', 'destroy')->name('member.tasks.comments.destroy');
        });
        Route::controller(NoteMainController::class)->group(function () {
            Route::get('/notes', 'notes')->name('member.notes');
            Route::post('/notes', 'store')->name('member.notes.store');
            Route::get('/notes/{note}', 'show')->name('member.notes.show');
            Route::put('/notes/{note}', 'update')->name('member.notes.update');
            Route::delete('/notes/{note}', 'destroy')->name('member.notes.destroy');
        });
        Route::controller(ActivityMainController::class)->group(function () {
            Route::get('/activity', 'activity')->name('member.activity');
        });
        Route::controller(AIMainController::class)->group(function () {
            Route::get('/ai', 'ai')->name('member.ai');
        });
        Route::controller(WorkspaceMainController::class)->group(function () {
            Route::get('/workspace', 'index')->name('member.workspace.index');
            Route::get('/workspace/create', 'create')->name('member.workspace.create');
            Route::post('/workspace', 'store')->name('member.workspace.store');
            Route::get('/workspace/{workspace}/edit', 'edit')->name('member.workspace.edit');
            Route::put('/workspace/{workspace}', 'update')->name('member.workspace.update');
            Route::delete('/workspace/{workspace}', 'destroy')->name('member.workspace.destroy');
        });

        Route::controller(WorkspaceMemberController::class)->group(function () {
            Route::get('/workspace/{workspace}/members', 'index')->name('member.workspace.members.index');
            Route::post('/workspace/{workspace}/members', 'store')->name('member.workspace.members.store');
            Route::put('/workspace/{workspace}/members/{user}', 'update')->name('member.workspace.members.update');
            Route::delete('/workspace/{workspace}/members/{user}', 'destroy')->name('member.workspace.members.destroy');
        });

        Route::view('/settings', 'member.flowral.settings.index')->name('member.settings');
    });
});




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
