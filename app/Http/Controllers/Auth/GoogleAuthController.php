<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\Registered;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah user dengan google_id atau email tersebut sudah ada
            $user = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if (!$user) {
                // Jika belum ada, buat user baru
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => bcrypt(Str::random(24)), // Generate password acak aman
                    'role' => 1, // Set role menjadi 1 (Member)
                ]);
                event(new Registered($user));
            } else {
                // Jika user ada tapi login via google, perbarui id dan avatar-nya
                $user->update([
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                ]);
            }

            Auth::login($user);

            // Redirect ke Dashboard Member
            return redirect()->route('member');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login menggunakan Google. Silakan coba lagi.');
        }
    }
}
