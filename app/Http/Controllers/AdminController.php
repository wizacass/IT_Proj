<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:executive');
    }

    public function index()
    {
        $user = Auth::user();
        return view('executive.index', compact('user'));
    }
}
