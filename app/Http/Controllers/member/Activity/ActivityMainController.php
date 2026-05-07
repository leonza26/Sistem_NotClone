<?php

namespace App\Http\Controllers\member\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityMainController extends Controller
{
    //
    public function activity()
    {
        return view('member.flowral.activity.index');
    }
}
