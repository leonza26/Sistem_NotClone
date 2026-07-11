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

    public function suspend(User $user)
    {
        // Proteksi: Super Admin tidak bisa di-suspend
        if ($user->role === 0) {
            return back()->with('error', 'Super Admin cannot be suspended.');
        }
        // Toggle status: jika true jadi false, jika false jadi true
        $user->update([
            'is_suspended' => !$user->is_suspended
        ]);
        $status = $user->is_suspended ? 'suspended' : 'reactivated';
        return back()->with('success', "User {$user->name} has been {$status}.");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|integer|in:0,1,2',
            'job_title' => 'nullable|string|max:255',
        ]);
        $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);

        // Sengaja langsung kita verifikasi agar user bisa langsung login
        $validated['email_verified_at'] = now();
        User::create($validated);
        return back()->with('success', 'New user has been created successfully.');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // PENTING: kecualikan email user saat ini dari aturan unique
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|integer|in:0,1',
            'job_title' => 'nullable|string|max:255',
        ]);
        // Jika password diisi, maka update passwordnya
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:8']);
            $validated['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        }
        $user->update($validated);
        return back()->with('success', 'User data has been updated successfully.');
    }
}
