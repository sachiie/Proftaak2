@extends('layouts.app')

@section('content')
      {{-- l  <div cass="flex-center position-ref full-height">
            <div class="content home-container">
                <div class="title m-b-md">
                    <img class="logoHome" src="css/logoText.png">
                </div>
                <div class="page-content">
                    <div class="news-header">
                        <h1>News</h1>
                        <div class="news">

                        </div>
                    </div>

                    <div class="users-header">
                        <h1>Active users</h1>
                        <div class="active-users">

                    </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="container-fluid">
            <div class="wrapper">
                <div class="row justify-content-center ">
                        <img class="logoHome" src="css/logoText.png">
                </div>
                <div class="row justify-content-center flex-wrap">
                        <div class="col-7 news-header">
                            <h1>News</h1>
                            <div class="news">News</div>
                        </div>
                        <div class="col-4 users-header">
                            <h1>Registered users</h1>
                            <div class="active-users">
                                <input type="text" class="live-search-box" placeholder="search here" />
                                <ul class="list-group live-search-list list-group-flush">
                                    @foreach ($result as $result)
                                        <li class="list-group-item" style="display: flex; flex-direction: row; padding-left: 0;"><img style="height: 35px; width: 35px;" src="css/profile-images/{{$result->user_id}}.png" class="rounded mx-auto d-block" alt="" srcset=""> {{$result->profile_name}}</li>
                                    @endforeach
                                  </ul>
                            </div>
                        </div>
                        <div class="col-5 mt-3 news-header hideme">
                                <h1>Top Survivors</h1>
                                <div class="news">
                                    {{-- @foreach ($data as $user) --}}
                                    <label for="gamesplayed">Most games won</label>
                                    <li class="list-group-item gamesplayed" style="display: flex; flex-direction: row; padding-left: 0;"><img style="height: 35px; width: 35px;" src="css/profile-images/{{$data['wonid']}}.png" class="rounded mx-auto d-block" alt="" srcset="">{{$data['played']}}</li>
                                    <label for="gameswon">Most games played</label>
                                    <li class="list-group-item gameswon" style="display: flex; flex-direction: row; padding-left: 0;"><img style="height: 35px; width: 35px;" src="css/profile-images/{{$data['gamesid']}}.png" class="rounded mx-auto d-block" alt="" srcset="">{{$data['won']}}</li>
                                    <label for="gameslost">Most games lost</label>
                                    <li class="list-group-item gameslost" style="display: flex; flex-direction: row; padding-left: 0;"><img style="height: 35px; width: 35px;" src="css/profile-images/{{$data['lostid']}}.png" class="rounded mx-auto d-block" alt="" srcset="">{{$data['lost']}}</li>
                                    {{-- @endforeach --}}
                                    {{-- @foreach ($games_won as $user)
                                    <label for="gamesplayed">Most games played</label>
                                    <li class="list-group-item gamesplayed" style="display: flex; flex-direction: row; padding-left: 0;"><img style="height: 35px; width: 35px;" src="css/profile-images/2.png" class="rounded mx-auto d-block" alt="" srcset="">{{$user->games_won}}</li>
                                    @endforeach --}}
                                
                                </div>
                            </div>
                            <div class="col-6 mt-3 users-header hideme">
                                <h1 class="hide">___________________________________________________</h1>
                                <div class="active-users">Users</div>
                            </div>
                </div>
            </div>
        </div>
@endsection
