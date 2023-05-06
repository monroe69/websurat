<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CekAuth extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('ADMIN')) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->hasRole('KETUA')) {
            return redirect()->route('ketua.dashboard');
        }
    }
}
