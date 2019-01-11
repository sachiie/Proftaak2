<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserModelController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storenaam(Request $request)
    {
        $id = Auth::user()->id;

        $count = count(DB::table('user_details')->get()->where("user_id", $id));
        

        if($count == 1){ //if user exists in table
        $name = $request->input('userNaam');

        if ($name == null) { //check if he filled in the information
            $name = "please fill in a name"; //change name to this
        }


        DB::table('user_details')->where("user_id", $id)->update( //update the information
            ['profile_name' => $name]
        );

        }
        else
        { //if user does not exist in table
            $name = $request->input('userNaam');   
    
            //insert him into the table with the name
            DB::table('user_details')->insert(
                ['user_id' => $id, 'profile_name' => $name, 'profile_bio' => 'nobio']
            );

        }

        $results = DB::table('users')->where('id', '=', $id)->get();
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();
        return view('home', ['results' => $results], ['info' => $info]); //send him to his account page

    }

    public function storebio(Request $request)
    {
        $id = Auth::user()->id;

        $count = count(DB::table('user_details')->get()->where("user_id", $id));
        

        if($count == 1){ // if user exists in table
        $bio = $request->input('comment');

        if ($bio == null) { //validation check if he didnt fill in the field
            $bio = "please fill in a bio"; //error
        }


        DB::table('user_details')->where("user_id", $id)->update( //update the information
            ['profile_bio' => $bio]
        );

        }
        else
        { //if user does not exist in the table
            $bio = $request->input('comment');
    
            //inset the user into the table with his biography
            DB::table('user_details')->insert(
                ['user_id' => $id, 'profile_name' => 'noname', 'profile_bio' => $bio]
            );

        }

        $results = DB::table('users')->where('id', '=', $id)->get();
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();
        return view('home', ['results' => $results], ['info' => $info]); //send him back to the userpage

    }

    public function uploadprofilepic(Request $request)
    {
        $id = Auth::user()->id;

        // $photoName = $id.'.'.$request->profilepic->getClientOriginalExtension();
        if(isset($request->profilepic)){ //add image to folder with id as name
        imagepng(imagecreatefromstring(file_get_contents($request->profilepic)), "css/profile-images/".$id.".png");
        }
        // $request->profilepic->move(public_path('css/profile-images'), $photoName);

        $results = DB::table('users')->where('id', '=', $id)->get();
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();
        return view('home', ['results' => $results], ['info' => $info]); //send user back to userpage

    }

    public function uploadbackgroundpic(Request $request)
    {
        $id = Auth::user()->id;

        // $photoName = $id.'.'.$request->profilepic->getClientOriginalExtension();
        if(isset($request->backgroundpic)){ //add image to folder with id as name
        imagepng(imagecreatefromstring(file_get_contents($request->backgroundpic)), "css/background-images/".$id.".png");
        }
        // $request->profilepic->move(public_path('css/profile-images'), $photoName);

        $results = DB::table('users')->where('id', '=', $id)->get();
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();
        return view('home', ['results' => $results], ['info' => $info]); //send user back to userpage

    }

    public function gameupdate(Request $request)
    {
        $id = Auth::user()->id; //get player id

        $count = count(DB::table('game_details')->get()->where("user_id", $id)); //does he have any previous victory/defeats
        
        if ($count != 1) { //if not insert him into the table
            DB::table('game_details')->insert(
                ['user_id' => $id, 'games_won' => 0, 'games_lost' => 0, 'games_played' => 0]
            );
        }

        if ($request->type == "defeat") { //if he lost add onto the games lost column by one

            DB::table('game_details')->where("user_id", $id)->increment('games_lost');
            DB::table('game_details')->where("user_id", $id)->increment('games_played');

        } else if ($request->type == "victory") { //if he lost add onto the won lost column by one

            DB::table('game_details')->where("user_id", $id)->increment('games_won');
            DB::table('game_details')->where("user_id", $id)->increment('games_played');

        }

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\UserModel  $userModel
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(UserModel $userModel)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\UserModel  $userModel
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(UserModel $userModel)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\UserModel  $userModel
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, UserModel $userModel)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\UserModel  $userModel
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(UserModel $userModel)
    // {
    //     //
    // }
}
