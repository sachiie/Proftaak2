@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    @foreach($results as $results)
                        @foreach ($info as $info)
                            
                        {{  $info->profile_name }}

                        <div class="form-group user-form">
                            <picture>
                                {{-- <source srcset="..." type="image/svg+xml"> --}}
                                <img src="css/profile-images/{{$results->id}}.png" style="height: 100px; width: 100px;">
                                <img src="css/background-images/{{$results->id}}.png" style="height: 100px; width: 100px;">
                            </picture>
                            <form action="{{ url('/updateuser/naam')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="userNaam">name:</label>
                            <input name="userNaam" id="userNaam" type="text" class="form-control" value="{{  $info->profile_name }}">
                            <button type="submit" class="btn" style="position: absolute; left: -9999px">Send</button>
                            </form>
                            <form action="{{ url('/updateuser/bio')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="comment">comment:</label>
                            <textarea  name="comment" id="comment" type="textarea" rows="4" cols="50" class="form-control">{{  $info->profile_bio }}</textarea>
                            <button type="submit" class="btn">Send</button>
                            </form>
                            <form action="{{ url('/updateuser/profilepic')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="avatar">Choose a profile picture:</label>
                            <input type="file" id="profilepic" name="profilepic" accept="image/png, image/jpeg">
                            <button type="submit" class="btn">Send</button>
                            </form>
                            <form action="{{ url('/updateuser/backgroundpic')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="avatar">Choose a background picture:</label>
                            <input type="file" id="backgroundpic" name="backgroundpic" accept="image/png, image/jpeg">
                            <button type="submit" class="btn">Send</button>
                            </form>
                        </div>

                        @endforeach
                    @endforeach
                      
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          
                        </div>
                        <div class="modal-footer">

                        </div>
                        </div>
                    </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
