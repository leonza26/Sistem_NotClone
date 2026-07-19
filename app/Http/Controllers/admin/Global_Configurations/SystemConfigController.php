<?php

namespace App\Http\Controllers\admin\Global_Configurations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SystemConfigController extends Controller
{
    public function index()
    {
        // Ambil semua setting dan jadikan key-value pair agar mudah ditampilkan di view
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.configs.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // 1. UPDATE MAINTENANCE MODE (Boolean)
        Setting::set('maintenance_mode', $request->has('maintenance_mode'), 'boolean');

        // 2. UPDATE FEATURE FLAGS (Boolean)
        Setting::set('feature_ai_assistant', $request->has('feature_ai_assistant'), 'boolean');
        Setting::set('feature_open_registration', $request->has('feature_open_registration'), 'boolean');

        // 3. UPDATE GLOBAL VARIABLES (Integer/String)
        if ($request->has('max_upload_size')) {
            Setting::set('max_upload_size', $request->max_upload_size, 'integer');
        }
        if ($request->has('free_workspace_limit')) {
            Setting::set('free_workspace_limit', $request->free_workspace_limit, 'integer');
        }

        return back()->with('success', 'Global configurations have been updated successfully!');
    }
}