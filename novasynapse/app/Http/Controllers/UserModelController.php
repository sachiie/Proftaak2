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
        

        if($count == 1){
        $name = $request->input('userNaam');


        DB::table('user_details')->update(
            ['profile_name' => $name]
        );

        }
        else
        {
            $name = $request->input('userNaam');   
    
            DB::table('user_details')->insert(
                ['user_id' => $id, 'profile_name' => $name, 'profile_bio' => 'nobio']
            );

        }

        $results = DB::table('users')->where('id', '=', $id)->get();
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();
        return view('home', ['results' => $results], ['info' => $info]);

    }

    public function storebio(Request $request)
    {
        $id = Auth::user()->id;

        $count = count(DB::table('user_details')->get()->where("user_id", $id));
        

        if($count == 1){
        $bio = $request->input('comment');


        DB::table('user_details')->update(
            ['profile_bio' => $bio]
        );

        }
        else
        {
            $bio = $request->input('comment');
    
    
            DB::table('user_details')->insert(
                ['user_id' => $id, 'profile_name' => 'noname', 'profile_bio' => $bio]
            );

        }

        $results = DB::table('users')->where('id', '=', $id)->get();
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();
        return view('home', ['results' => $results], ['info' => $info]);

    }

    public function uploadprofilepic(Request $request)
    {
        $id = Auth::user()->id;

        // $photoName = $id.'.'.$request->profilepic->getClientOriginalExtension();
        imagepng(imagecreatefromstring(file_get_contents($request->profilepic)), "css/profile-images/".$id.".png");
        // $request->profilepic->move(public_path('css/profile-images'), $photoName);

        $results = DB::table('users')->where('id', '=', $id)->get();
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();
        return view('home', ['results' => $results], ['info' => $info]);

    }

    public function uploadbackgroundpic(Request $request)
    {
        $id = Auth::user()->id;

        // $photoName = $id.'.'.$request->profilepic->getClientOriginalExtension();
        imagepng(imagecreatefromstring(file_get_contents($request->backgroundpic)), "css/background-images/".$id.".png");
        // $request->profilepic->move(public_path('css/profile-images'), $photoName);

        $results = DB::table('users')->where('id', '=', $id)->get();
        $info = DB::table('user_details')->where('user_id', '=', $id)->get();
        return view('home', ['results' => $results], ['info' => $info]);

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
