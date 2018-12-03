@extends('layouts.app')

@section('content')
<div cass="flex-center position-ref full-height">
    <div class="content">
        <button id="generate" class="btn">Generate</button>
        <button id="start" class="btn">Start</button>
        <button id="next" class="btn">Next day</button>
            {{-- //list of users gets generated here --}}
        <div id="player-list">
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