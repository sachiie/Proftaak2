@extends('layouts.app')

@section('content')
<div class="container-fluid home-container">
    <div class="row justify-content-center">
        <div class="col-md-12 profile-block">
            {{-- <form action="{{ url('/backgroundpic')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}} --}}
            <div class="yes">
                
                <div class="">
                    @foreach($results as $results)
                        @foreach ($info as $info)
                            
                        {{-- {{  $info->profile_name }} --}}
                </div>

                <div class="card-body-profile">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid home-container">
                        <div class="row justify-content-center">
                            <div class="col-md-12 form-group user-form edit-profile-form">
                                <div class="pic-name-edit">
                                    <form action="{{ url('/profilepic')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="image-upload">
                                                <label for="profilepic">
                                                    <img src="css/profile-images/{{$results->id}}.png" class="profile-img">
                                                </label>
                                            
                                                <input id="profilepic" type="file" name="profilepic" accept="image/png, image/jpeg"/>
                                                <button type="submit" class="btn update-bio">Send</button>
                                            </div>
                                    </form>
                                    <div class="w-100 profileName">
                                    <h1><label for="userNaam">{{  $info->profile_name }} </label><a class="edit-btn" data-target="#editProfile" data-toggle="modal"><i class="fa fa-cog"style="font-size:24px"></i></a></h1>
                                    <h1>Level</h1>
                                    <h1 class="status">Date joined: {{Auth::user()->created_at}}</h1>
                                    
                                    </div>
                                </div>
                                <div class="bio-achieve">
                                <div class="biography">
                                    <div class="bio-container">
                                            <h1>Biography</h1>
                                            {{  $info->profile_bio }}
                                    </div>
                                </div>
                                <div class="w-75 achievements">
                                    <h1>Progression</h1>
                                    <div class="achievement-container">
                                        <p>{{ $info->profile_name }} has slain 10 people</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                        @endforeach
                    @endforeach
                      
                    <!-- Modal for editing background image -->
                    <div class="modal fade" id="editProfile" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content content-profile">
                            <div class="modal-header header-profile">
                                <h4 class="modal-title">Edit account</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body modal-profile">
                                <div class="col-sm text-center" style="max-height: 85px; max-width: 250px;">
                                    
                                </div>
                                <div class="container mx-auto">
                                    {{-- <form action="{{ url('/profilepic')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <label for="avatar">Change profile picture</label>
                                        <input type="file" id="profilepic" name="profilepic" accept="image/png, image/jpeg">
                                        <button type="submit" class="btn">Send</button>
                                    </form> --}}
                                    <form action="{{ url('/naam')}}" method="POST" enctype="multipart/form-data" class="mini-form">
                                        {{csrf_field()}}                             
                                        <h1><label for="userNaam">Username</label></h1>
                                        <input name="userNaam" id="userNaam" type="text" class="form-control" value="{{  $info->profile_name }}">
                                        <button type="submit" class="btn" style="position: absolute; left: -9999px">Send</button>
                                    </form>
                                    <form action="{{ url('/bio')}}" method="POST" enctype="multipart/form-data" class="mini-form">
                                        {{csrf_field()}}
                                        <h1><label for="comment">Biography</label></h1>
                                        <textarea  name="comment" id="comment" type="textarea" rows="4" cols="50" class="form-control">{{  $info->profile_bio }}</textarea>
                                        <button type="submit" class="btn">Send</button>
                                    </form>
                                    <form action="{{ url('/backgroundpic')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <label for="avatar" class="choose-bg">Choose a background picture:</label>
                                    <img src="css/background-images/{{$results->id}}.png" class="background-preview" style="">
                                        <input type="file" id="backgroundpic" name="backgroundpic" accept="image/png, image/jpeg">
                                        <button type="submit" class="btn">Send</button>
            
                                        </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-default" id="submitPlayer" data-dismiss="modal">Submit</button> --}}
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
