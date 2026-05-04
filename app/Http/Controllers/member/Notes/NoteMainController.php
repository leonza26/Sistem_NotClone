<?php

namespace App\Http\Controllers\member\Notes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteMainController extends Controller
{
    //
    public function notes()
    {
        return view('member.flowral.notes.index');
    }
}
