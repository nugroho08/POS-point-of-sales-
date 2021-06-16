<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
        if(Auth::user()->hasRole('admin')){
            return view('admin.layouts.main');
          }elseif(Auth::user()->hasRole('kasir')){
            return view('kasir.layouts.main');
          }elseif(Auth::user()->hasRole('manager')){
              return view('manager.layouts.main');
          }
    }
}
