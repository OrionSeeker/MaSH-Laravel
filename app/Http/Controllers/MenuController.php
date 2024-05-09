<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function home(){
        return view('beranda');
    }

    public function list_kelas(){
        return view('list-kelas');
    }

    public function detail_kelas(){
        return view('detail-kelas');
    }
}
