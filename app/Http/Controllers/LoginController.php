<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('pesan', 'Your Password Or Email Is Wrong');
        }
        $data = auth()->user();
        if ($data->status_aktif === 'tidak') {
            return back()->with('pesan', 'Your Account Is Not Active');
        }
        return redirect()->route('dashboard');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
