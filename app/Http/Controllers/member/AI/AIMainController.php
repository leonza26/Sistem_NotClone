<?php

namespace App\Http\Controllers\member\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AIMainController extends Controller
{
    //
    public function ai()
    {
        return view('member.flowral.ai.index');
    }
}
