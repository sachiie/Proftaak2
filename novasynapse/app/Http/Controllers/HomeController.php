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
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();

            return view('home', ['results' => $results], ['info' => $info]);
    }

    public function home()
    {
        $id = Auth::user()->id;
        $count = count(DB::table('user_details')->get()->where("user_id", $id));
        $result = DB::table('user_details')->get();
        $users = DB::table('game_details')->groupBy('games_played')->get(['games_played', DB::raw('MAX(games_played) as games_played')],['games_lost', DB::raw('MAX(games_lost) as games_lost')]);
        if($count != 1){
            DB::table('user_details')->insert(
                ['user_id' => $id, 'profile_name' => Auth::user()->name, 'profile_bio' => 'nobio']
            );
        }
        return view('welcome', ['result' => $result], ['users' => $users]);
    }

    public function hungergames()
    {
        $id = Auth::user()->id;

        $results = DB::table('user_details')->where('user_id', '=', $id)->get();

        return view('hungergameslandingpage', ['results' => $results]);
    }
}
