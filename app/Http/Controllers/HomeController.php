<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user_nomorInduk = Auth::user()->nomorInduk;
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;
        $user_role = Auth::user()->role;

        return view('home', compact('user_id', 'user_nomorInduk', 'user_name', 'user_email', 'user_role'));
    }
}
