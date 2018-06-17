@extends('layouts.master')

@section('title')
    Posts
@endsection

@section('content')
    @include('includes.msg-block')

    <div class="row" align="center">
        <div class="col-md-4 col-md-offset-4">
            <h3>Sign up a new user</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">E-mail address</label>
                    <input class="form-control" name="email" id="email">
                </div>

                <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <div class="form-group {{$errors->has('first_name') ? 'has-error' : ''}}">
                    <label for="first_name">First name</label>
                    <input class="form-control" name="first_name" id="first_name">
                </div>

                <div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
                    <label for="last_name">Last name</label>
                    <input class="form-control" name="last_name" id="last_name">
                </div>

                <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="10" name="description" id="description"></textarea>
                </div>

                <div class="form-group ">
                    <input title="normal" type="radio" name="is_admin" value="normal" checked>Normal user<br>
                    <input title="admin" type="radio" name="is_admin" value="admin" >Administrator<br>
                </div>

                <button type="submit" class="btn btn-primary">Create user</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
