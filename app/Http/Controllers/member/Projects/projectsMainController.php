<?php

namespace App\Http\Controllers\member\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class projectsMainController extends Controller
{
    //
    public function projects()
    {
        return view('member.flowral.projects.projects');
    }
}
