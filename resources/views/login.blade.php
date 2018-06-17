@extends('layouts.master')
@section('title')
    Login
@endsection
@section('content')
    @include('includes.msg-block')

    <div class="row" align="center">
         <div class="col-md-4 col-md-offset-4">
             <h3>Sign in</h3>
                <form action="{{ route('signin') }}" method="post">
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label for="email">Your e-mail address</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                    </div>
                    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                        <label for="password">Your password</label>
                        <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
         </div>
    </div>

@endsection
