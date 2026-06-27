<?php

namespace App\Http\Controllers\member\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('member.flowral.settings.index');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'job_title' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Max 10MB
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'job_title' => $request->job_title,
        ];

        // Logika Upload Foto
        if ($request->hasFile('avatar')) {
            // Hapus foto lama jika ada
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Simpan foto baru
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Update database
        $user->update($data);

        return redirect()->back()->with('success', 'Profile berhasil diperbarui!');
    }
}
