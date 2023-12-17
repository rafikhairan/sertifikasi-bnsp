<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // if(auth()->user()->is_admin) {
        //     return view('home.dashboard');
        // }

        return view('home.index');
    }
}
