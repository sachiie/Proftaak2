@extends('layouts.app')

@section('content')
<div cass="flex-center position-ref full-height">
    <div class="content">
        <button id="start" >start</button>
            {{-- //list of users gets generated here --}}
        <div id="player-list">
        </div>
    </div>
</div>

@endsection