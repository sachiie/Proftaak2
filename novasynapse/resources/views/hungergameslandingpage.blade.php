@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 hunger-container h-100 flex-column">

            {{-- <h1>You</h1>
            <div class="col-6" id="your-list">
                <img src="css/hunger-images/jon.png">
            </div> --}}

            {{-- <h1>Your team</h1>
            <div class="col-6" id="player-list">
            </div> --}}
        </div>
    </div>
    <div class="row hungry-container mx-auto text">
            <button id="generate" class="btn bubbly-button">Generate</button>
            <button id="start" class="btn">Start</button>
            <button id="next" class="btn">Next day</button>
            <div class="col-sm your-char h-100">
                <div class="col-sm your-id">
                    <div class="container">
                        <div class="row hunger-row">
                            <img src="css/logo.png" class="logo">
                            <h1>Nova synapse id</h1>
                        </div>
                    </div>
                    <div class="container">
                    <div class="row hunger-row">
                    <img src="css/hunger-images/jon.png" class="your-img">
                    @foreach ($results as $results)
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
            <div class="col-sm">
                <div class="container flex-row">
                    <div class="row text-center players-row">
                        <div class="mx-auto" id="player-list">
                                <h1 class="">Players</h1>
                                <div class="player-border">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
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
        <input type="text" name="" id="name">
        <input type="text" name="" id="link">
        <select id="sex">
                <option value="male">male</option>
                <option value="female">female</option>
        </select>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" id="submitPlayer" data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    
</div>
</div>

@endsection