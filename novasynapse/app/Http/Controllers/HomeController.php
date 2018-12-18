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
        $gamesplayed = DB::table('game_details')->groupBy('games_played')->get(['games_played', DB::raw('MAX(games_played) as games_played')]);
        $games_won = DB::table('game_details')->groupBy('games_won')->get(['games_won', DB::raw('MAX(games_won) as games_won')]);
        $games_lost = DB::table('game_details')->groupBy('games_lost')->get(['games_lost', DB::raw('MAX(games_lost) as games_lost')]);

        foreach ($gamesplayed  as $gamesplayed ) {
           $played = $gamesplayed->games_played;
           $gameres = DB::table('game_details')->where('games_played', '=', $played)->get();

           foreach ($gameres as $gameresult) {
               $gameid = $gameresult->user_id;
           }
        }
        foreach ($games_won  as $games_won ) {
            $won = $games_won->games_won;
            $gameres = DB::table('game_details')->where('games_won', '=', $won)->get();

            foreach ($gameres as $gameresult) {
                $wonid = $gameresult->user_id;
            }
        }
        foreach ($games_lost  as $games_lost ) {
            $lost = $games_lost->games_lost;
            $gameres = DB::table('game_details')->where('games_lost', '=', $lost)->get();

            foreach ($gameres as $gameresult) {
                $lostid = $gameresult->user_id;
            }
        }
        
        // $gameswon = DB::table('game_details')->groupBy('games_won')->get(['games_won', DB::raw('MAX(games_won) as games_won')]);
        // $gameslost = DB::table('game_details')->groupBy('games_lost')->get(['games_lost', DB::raw('MAX(games_lost) as games_lost')]);
        
        $data = [
            'played'  => $won,
            'gamesid' => $gameid,
            'won'   => $played,
            'wonid' => $wonid,
            'lost' => $lost,
            'lostid' => $lostid
        ];
        
        if($count != 1){
            DB::table('user_details')->insert(
                ['user_id' => $id, 'profile_name' => Auth::user()->name, 'profile_bio' => 'nobio']
            );
        }
        return view('welcome', ['result' => $result], ['data' => $data]);
    }

    public function hungergames()
    {
        $id = Auth::user()->id;

        $results = DB::table('user_details')->where('user_id', '=', $id)->get();

        return view('hungergameslandingpage', ['results' => $results]);
    }
}
