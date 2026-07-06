<?php

namespace App\Http\Controllers\admin\Identity_Access;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        // Mengambil data user, diurutkan dari yang terbaru, dengan fitur pencarian
        $users = User::query();
        if ($search) {
            $users->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        $users = $users->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString(); // Mempertahankan query search saat pindah halaman paginasi
        return view('admin.users.index', compact('users', 'search'));
    }
}
