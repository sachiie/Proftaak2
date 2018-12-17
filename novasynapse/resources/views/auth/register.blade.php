
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 login-container">
            <div class="card card-login">
                <div class="card-header"><div class="row align-items-center logoLogin">
                        <img class="logo" src="css/logo.png">
                    </div></div>
                <div class="card-body card-body-register">
                        <h1>{{ __('Register') }}</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group row">
                                <div class="col-md-12 input-group-prepend">
                                    <span class="input-group-text far fa-id-badge lightBulb" id="inputGroupPrepend3"></span>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">

                                <div class="col-md-12 input-group-prepend">
                                    <span class="input-group-text far fa-id-badge lightBulb" id="inputGroupPrepend3"></span>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-12 input-group-prepend">
                                    <span class="input-group-text far fa-lightbulb lightBulb lightBulb" id="inputGroupPrepend3"></span>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col-md-12 input-group-prepend">
                                    <span class="input-group-text far fa-lightbulb lightBulb lightBulb" id="inputGroupPrepend3"></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12 input-group-prepend">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
