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
                        {{  $results->name }}
                    @endforeach


                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button>
                      
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
                            <label for="comment">Naam:</label>
                            <div class="form-group">
                                <form action = "updateuser" method = "post">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <input id="userNaam" type="text" class="form-control" name="userNaam" placeholder="Naam">
                                    <label for="comment">Comment:</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary">
                                </form>
                            </div>
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
