<?php

namespace App\Http\Controllers\member\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskMainController extends Controller
{
    //
    public function tasks()
    {
        return view('member.flowral.tasks.index');
    }
}
