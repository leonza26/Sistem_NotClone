<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Changelog;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //
    public function index()
    {
        return view('landing_page.home');
    }

    public function privacy()
    {
        return view('landing_page.privacy');
    }

    public function terms()
    {
        return view('landing_page.terms');
    }

    public function updates()
    {
        $changelogs = Changelog::latest('released_at')->get();
        return view('landing_page.updates', compact('changelogs'));
    }
}
