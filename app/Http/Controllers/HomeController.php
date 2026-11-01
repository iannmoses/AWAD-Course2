<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    // sends a signed-in user to the dashboard for their role
    public function home()
    {
        return redirect()->route(auth()->user()->homeRoute());
    }
}
