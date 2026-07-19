<?php

use App\Http\Middleware\CheckIsSuspended;
use App\Http\Middleware\CheckMaintenanceMode;
use App\Http\Middleware\CheckWorkspaceStatus;
use App\Http\Middleware\RoleManager;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // 1. GLOBAL MIDDLEWARE (Dijalankan di setiap rute)
        $middleware->append(\App\Http\Middleware\ShieldFirewall::class);
        

        // 2. WEB MIDDLEWARE GROUP (Dijalankan khusus di rute web)
        $middleware->web(append: [
            CheckIsSuspended::class,
            CheckMaintenanceMode::class,
        ]);

        // 3. MIDDLEWARE ALIAS (Dipanggil secara spesifik di routes/web.php)
        $middleware->alias([
            'rolemanager'      => RoleManager::class,
            'workspace.active' => CheckWorkspaceStatus::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
