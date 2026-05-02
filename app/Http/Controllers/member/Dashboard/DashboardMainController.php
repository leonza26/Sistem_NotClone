<?php

namespace App\Http\Controllers\member\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardMainController extends Controller
{
    //
    public function index()
    {
        return view('member.flowral.dashboard.index');
    }
}
