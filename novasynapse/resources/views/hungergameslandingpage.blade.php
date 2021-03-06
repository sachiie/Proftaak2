@extends('layouts.app')

@section('content')
<div class="container-fluid hunger-main">
    <div class="container-fluid full-game-container">
        <div class="row">
            <div class="col-sm-4 h-75 game-container">
                <h1 class="h-75">Day</h1>
                <div class="col-8 player-container text-center">

                </div>
                <div class="col-12 event-container">
                    
                </div>
            </div>
            <div class="col-sm-6 h-75 game-container">
                    <h1 class="h-75">Day</h1>

            </div>
        </div>
</div>
    <button id="generate" class="btn bubbly-button w-100">Generate</button>
    <h1 class="text-center build-header ">Build your game!</h1>
    <div class="row hungry-container mx-auto">
            <div class="col your-char h-100">
                <div class="col-sm your-id">
                    <div class="container">
                        <div class="row hunger-row">
                            <img src="css/logo.png" class="logo">
                            <h1>Nova synapse id</h1>
                        </div>
                    </div>
                    <div class="container">
                    <div class="row hunger-row">
                    @foreach ($results as $results)
                    <img src="css/profile-images/{{  $results->user_id }}.png" class="your-img">
                        <div id="username" class="w-100 id-name"><h1>Name  {{  $results->profile_name }} </h1></div>
                        <h1 class="gender-head">Gender</h1>
                    @endforeach
                    </div>
                    <h1 class="hide">ye</h1>
                    <h1>Level</h1>
                </div>
                </div>
            </div>
            <h1></h1>
            <a id="victory" class="btn mh-100" href="hey">Victory</a>
            <a id="defeat" class="btn mh-100" href="hey">Defeat</a>
            <button id="next" class="btn mh-100" href="hey">Next day</button>
            <div class="col player-list-row">
                <div class="container flex-row">
                    <div class="row text-center players-row">
                        <div class="col mx-auto h-100" id="player-list">
                            <div class="col-sm your-players">
                                <h1 class="">Players</h1>
                                <div class="player-border">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="container edit-player">
                <div class="row">
                    <img src="css/hunger-images/jon.png">
                </div>
            </div> --}}

          </div>
          <button id="start" class="btn w-100 fixed-bottom build-header" href="hey">Start</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Player</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <div class="col-sm text-center" style="max-height: 85px; max-width: 250px;">
            
        </div>
        <div class="container mx-auto">
            <label>Edit name</label>
            <input type="text" name="" id="name" class="form-control">
            <label>Edit image link</label>
            <input type="text" name="" id="link" class="form-control">
            <label>Change gender</label>
            <select id="sex" class="form-control">
                    <option value="male">male</option>
                    <option value="female">female</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" id="submitPlayer" data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div>

@endsection