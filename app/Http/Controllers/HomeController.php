<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        switch ($user->role_id) {
            case 2:
                return redirect('/supply');
            default:
                return view('home', compact('user'));
        }
    }
}
