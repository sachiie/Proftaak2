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
                            <h1>Online users</h1>
                            <div class="active-users">Users</div>
                        </div>
                        <div class="col-6 mt-3 news-header hideme">
                                <h1>Top Survivors</h1>
                                <div class="news">Highscores</div>
                            </div>
                            <div class="col-5 mt-3 users-header hideme">
                                <h1 class="hide">___________________________________________</h1>
                                <div class="play-direct"></div>
                            </div>
                </div>
            </div>
        </div>
@endsection
