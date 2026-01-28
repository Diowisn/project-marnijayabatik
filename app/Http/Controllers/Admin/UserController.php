<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Tampilkan form ganti password
    public function showChangePasswordForm()
    {
        return view('admin.users.change-password');
    }

    // Proses ganti password
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi',
            'new_password.required' => 'Password baru wajib diisi',
            'new_password.min' => 'Password minimal 6 karakter',
            'new_password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        // Cek password saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->with('error', 'Password saat ini salah!');
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Password berhasil diperbarui!');
    }

    // Tampilkan list admin
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.users.index', compact('admins'));
    }

    // Tampilkan form tambah admin
    public function create()
    {
        return view('admin.users.create');
    }

    // Proses tambah admin
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'nullable|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin berhasil ditambahkan!');
    }

    // Hapus admin
    public function destroy($id)
    {
        // Cegah menghapus diri sendiri
        if (Auth::id() == $id) {
            return redirect()->back()
                ->with('error', 'Anda tidak dapat menghapus akun sendiri!');
        }

        $user = User::findOrFail($id);
        
        // Cegah menghapus admin jika hanya tersisa 1 admin
        $totalAdmins = User::where('role', 'admin')->count();
        if ($totalAdmins <= 1) {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus admin terakhir!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin berhasil dihapus!');
    }
}