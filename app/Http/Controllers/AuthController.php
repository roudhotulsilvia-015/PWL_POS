<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){ // jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        Log::info('Login attempt:', $request->all());
        
        $credentials = $request->only('username', 'password');

        // Debug: cek apakah user ada di database
        $user = UserModel::where('username', $credentials['username'])->first();
        
        Log::info('User found:', $user ? ['id' => $user->user_id] : ['not_found' => true]);
        
        if($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            Log::info('Login success for user: ' . $user->username);
            
            if($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
            
            return redirect('/');
        }

        Log::warning('Login failed for username: ' . $credentials['username']);
        
        if($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => false,
                'message' => 'Username atau Password salah',
                'msgField' => []
            ]);
        }

        return redirect()->back()->withErrors('Login gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}