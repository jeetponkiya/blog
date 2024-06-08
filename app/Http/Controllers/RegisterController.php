<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Auth.Register');
    }

    public function set(RegisterRequest $request)
    {
        $data = $request->except('_token');
        
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect('login');
    }   
}
