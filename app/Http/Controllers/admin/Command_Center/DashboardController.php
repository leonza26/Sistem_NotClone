<?php

namespace App\Http\Controllers\admin\Command_Center;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data statis sementara sebelum dikoneksikan ke Query Database
        $metrics = [
            'total_users' => 124,
            'active_workspaces' => 45,
            'total_storage' => '12.4 GB',
            'system_health' => '99.9%'
        ];

        return view('admin.dashboard', compact('metrics'));
    }
}
