<?php


use App\Http\Controllers\admin\Command_Center\DashboardController;
use App\Http\Controllers\admin\Global_Configurations\SystemConfigController;
use App\Http\Controllers\admin\Identity_Access\UserController;
use App\Http\Controllers\admin\Shield_Security\SecurityController;
use App\Http\Controllers\admin\Workspace_Ecosystem\WorkspaceController;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\member\Activity\ActivityMainController;
use App\Http\Controllers\member\AI\AIMainController;
use App\Http\Controllers\member\Dashboard\DashboardMainController;
use App\Http\Controllers\member\Notes\NoteMainController;
use App\Http\Controllers\member\Projects\projectsMainController;
use App\Http\Controllers\member\Search\GlobalSearchController;
use App\Http\Controllers\member\Settings\SettingsController;
use App\Http\Controllers\member\Tasks\TaskCommentController;
use App\Http\Controllers\member\Tasks\TaskMainController;
use App\Http\Controllers\member\Workspace\WorkspaceMainController;
use App\Http\Controllers\member\Workspace\WorkspaceMemberController;
use Illuminate\Support\Facades\Route;


Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('landing.page');
    Route::view('/privacy', 'landing_page.privacy')->name('landing.privacy');
    Route::view('/terms', 'landing_page.terms')->name('landing.terms');
});

// impersonate routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::impersonate();
});


// admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // dashboard route
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
        });

        // identity & access management routes
        Route::controller(UserController::class)->prefix('users')->group(function () {
            Route::get('/', 'index')->name('admin.users.index');
            Route::post('/{user}/suspend', 'suspend')->name('admin.users.suspend');
            Route::post('/', 'store')->name('admin.users.store');
            Route::put('/{user}', 'update')->name('admin.users.update');
        });

        Route::controller(WorkspaceController::class)->prefix('workspaces')->group(function () {
            Route::get('/', 'index')->name('admin.workspaces.index');
            Route::post('/{workspace}/toggle', 'toggleStatus')->name('admin.workspaces.toggle');
        });

        Route::controller(SecurityController::class)->prefix('security')->group(function () {
            Route::get('/', 'index')->name('admin.security.index');
            Route::delete('/unblock/{blockedIp}', 'unblockIp')->name('admin.security.unblock');
        });

        Route::controller(SystemConfigController::class)->prefix('configs')->group(function () {
            Route::get('/', 'index')->name('admin.configs.index');
            Route::post('/update', 'update')->name('admin.configs.update');
        });
    });
});

// Member routes
Route::middleware(['auth', 'verified', 'rolemanager:member', 'workspace.active'])->group(function () {
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
            Route::post('/ai/chat', 'chat')->name('member.ai.chat');
            Route::post('/ai/generate-task', 'generateTask')->name('member.ai.generate_task');
            Route::post('/ai/summarize-note', 'summarizeNote')->name('member.ai.summarize_note');
            Route::post('/ai/suggest-workflow', 'suggestWorkflow')->name('member.ai.suggest_workflow');
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

        Route::controller(SettingsController::class)->group(function () {
            Route::get('/settings', 'index')->name('member.settings.index');
            Route::post('/settings/profile', 'updateProfile')->name('member.settings.profile.update');
        });

        Route::controller(GlobalSearchController::class)->group(function () {
            Route::get('/search', 'index')->name('member.search');
        });
    });
});




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
