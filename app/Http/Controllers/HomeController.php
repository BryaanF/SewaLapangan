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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function sewalapangan()
    {
        return view ('sewalapangan');
    }

    public function reqsewa()
    {
        return view ('admin/request_sewa_lapangan');
    }

    public function accsewa()
    {
        return view ('admin/acc_sewa_lapangan');
    }
}
