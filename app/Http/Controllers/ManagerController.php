<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:manager');
    }

    public function index()
    {
        $user = Auth::user();
        return view('manager.index', compact('user'));
    }
}
