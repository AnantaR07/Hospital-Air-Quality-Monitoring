<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek username di tabel admin
        $admin = DB::table('admin')
            ->where('username', $request->input('username'))
            ->first();

        // Jika admin ditemukan
        if ($admin) {
            // Cek password Hash
            if (Hash::check($request->input('password'), $admin->password)) {
                // Jika password sesuai dengan MD5
                Auth::loginUsingId($admin->id);  // Gunakan ID dari admin

                // Set session untuk menyimpan nilai admin
                session(['hashed_password' => '$2y$10$Kb1.NDId2/2U/5Wq7QpLZujbZCt4ts8I/VQwhjO6tO1zvScEwe.M1lr']);
                
                return redirect()->intended('/adm/adminHomepage'); // Redirect ke halaman dashboard setelah login
            }
        }


        $request->session()->flash('error', 'Username atau Password salah.');
        return back();
    }

    public function logout(Request $request)
    {
        // Hapus sesi hashed_password
        session()->forget('hashed_password');
        
        // Logout user
        Auth::logout();
    
        // Regenerate session untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Redirect ke halaman login
        return redirect('/adm/adminLogin');
    }
}
