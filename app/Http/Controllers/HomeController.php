<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

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
            case 1:
                return redirect('/manager');
            case 2:
                return redirect('/supply');
            case 3:
                return redirect('/admin');
            default:
                return view('home', compact('user'));
        }
    }
}
