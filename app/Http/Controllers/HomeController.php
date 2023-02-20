<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        return view('home', ["msg"=>"i am user role"]);
    }
    public function adminHome()
    {
        return view('home', ["msg"=>"i am admin role"]);
    }
    public function superadminHome()
    {
        return view('home', ["msg"=>"i am superadmin role"]);
    }
}