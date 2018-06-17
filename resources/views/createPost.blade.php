@extends('layouts.master')

@section('title')
    Create a post
@endsection

@section('content')
    @include('includes.msg-block')

    <section class="new-post">
        <div class="col-md-6 col-md-offset-3">
            <h3 align="center">Create a new post</h3>
            <form action=" {{ route('create') }} " method="post">
                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                    <textarea class="form-control" name="title" id="title" rows="1" placeholder="Write the title of the post here."></textarea>
                </div>
                <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                    <textarea class="form-control" name="body" id="body" rows="10" placeholder="Write the body of the post here."></textarea>
                </div>
                <button  type="submit" class="btn btn-primary col-md-offset-5">Create post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>

@endsection
