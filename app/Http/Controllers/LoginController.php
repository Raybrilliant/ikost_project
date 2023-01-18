<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function indexAdmin()
    {
        return view('admin/login');
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => ['required'], 
            'password' => ['required']
        ]);

        if (Users::where('email', $request->email)->first() && Users::where('password', $request->password)->first()) {
           if (Users::select('role')->where('email',$request->email)->first()->role == 'user') {
            $request->session()->put('email',$request->email);
            $request->session()->regenerate();
            return redirect()->intended('/');
           } 
        }

        return back()->with('loginError','Gagal Login Bos!');
    }

    public function loginAdmin(Request $request)
    {
        if (Users::where('email',$request->email)->first() && Users::where('password',$request->password)->first()) {
            if (Users::select('role')->where('email',$request->email)->first()->role == 'admin') {
                $request->session()->put('email',$request->email);
                $request->session()->regenerate();
                return redirect()->intended('admin');
            }
        }
        return back()->with('loginError','Kamu Bukan Admin !');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
