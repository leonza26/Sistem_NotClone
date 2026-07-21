<?php

namespace App\Http\Controllers\admin\Broadcasts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Changelog;

class BroadcastController extends Controller
{
    // ---------------------------------------------------------
    // Halaman Utama Broadcast Dashboard
    // ---------------------------------------------------------
    public function index()
    {
        // Ambil semua banner (biasanya tidak banyak)
        $banners = Banner::latest()->get();

        // Ambil riwayat pembaruan (Changelog), diurutkan dari yang terbaru dirilis
        $changelogs = Changelog::latest('released_at')->paginate(10);

        return view('admin.broadcasts.index', compact('banners', 'changelogs'));
    }

    // ---------------------------------------------------------
    // Fitur 1: GLOBAL BANNERS (Spanduk Darurat)
    // ---------------------------------------------------------
    public function storeBanner(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'type' => 'required|in:info,warning,danger',
        ]);

        Banner::create([
            'message' => $request->message,
            'type' => $request->type,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', 'Global banner created successfully!');
    }

    public function toggleBanner(Banner $banner)
    {
        // Balikkan statusnya (On jadi Off, Off jadi On)
        $banner->update(['is_active' => !$banner->is_active]);
        $status = $banner->is_active ? 'activated' : 'deactivated';

        return back()->with('success', "Banner has been {$status}!");
    }

    public function destroyBanner(Banner $banner)
    {
        $banner->delete();
        return back()->with('success', 'Banner deleted successfully.');
    }

    // ---------------------------------------------------------
    // Fitur 2: CHANGELOGS (Catatan Rilis Fitur Baru)
    // ---------------------------------------------------------
    public function storeChangelog(Request $request)
    {
        $request->validate([
            'version' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'released_at' => 'required|date',
        ]);

        Changelog::create($request->all());

        return back()->with('success', 'Changelog published successfully!');
    }

    public function destroyChangelog(Changelog $changelog)
    {
        $changelog->delete();
        return back()->with('success', 'Changelog deleted successfully.');
    }
}
