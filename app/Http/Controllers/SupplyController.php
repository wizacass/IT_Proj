<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SupplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:supplier');
    }

    public function index()
    {
        $user = Auth::user();
        return view('supply.index', compact('user'));
    }
}
