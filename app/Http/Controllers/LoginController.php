<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PreviewSessions;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.Login');
    }

    public function set(Request $request)
    {
        $credential = $request->only('email','password');
        
        $user = User::where('email',$request->email)->get()->count();
        if ($user == 0) {
            return back()->withErrors(['email' => 'User not found with this email.'])->withInput();
        }

        if (Auth::attempt( $credential)) {
            if (Auth::user()->role_id == '1') {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                return redirect()->intended(route('user.dashboard'));
            }
            // $request->session()->regenerate();
            // return redirect('/');
        } else {
            return back()->withErrors(['email' => 'Invalid credential.'])->withInput();
        }

    }

    public function logout(Request $request)
    {
         Auth::guard('admin')->logout();

        // Prevent invalidating the entire session
        $request->session()->forget('admin');
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
