<?php

namespace App\Http\Controllers;

use App\Models\KelasUser;
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
        $kelasUser = KelasUser::where('user_id', $user_id)->get();

        return view('home', compact('user_id', 'user_nomorInduk', 'user_name', 'user_email', 'user_role', 'kelasUser'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // 'nomorInduk' => 'required|string|max:255',
            // Add other validation rules as necessary
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != "-"){
            $user->password = $request->password;
        } 
        // Add other fields as necessary
        $user->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully.');
    }
}
