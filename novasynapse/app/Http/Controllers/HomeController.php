<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $id = Auth::user()->id;
        $results = DB::table('users')->where('id', '=', $id)->get();
        return view('home', ['results' => $results]);
        // return view('home');
    }

    public function home()
    {
        return view('welcome');
    }

    public function updateuser()
    {

        
        $id = Auth::user()->id;
        $results = DB::table('users')->where('id', '=', $id)->get();
        return view('home', ['results' => $results]);
        // DB::table('users')
        // ->where('id', 1)
        // ->update(['votes' => 1]);   
    }

}
