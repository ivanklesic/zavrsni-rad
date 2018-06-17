@extends('layouts.master')

@section('title')
    Posts
@endsection

@section('content')
    @include('includes.msg-block')

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            @foreach($posts as $post)
                <section class="row new-post">
                    <div>
                        <h2 align="center">{{$post->title}}</h2>
                        <article class="post" data-postid="{{ $post->id }}">
                            <p>
                                {{$post->body}}
                            </p>
                            <div class="info">
                                Posted by {{$post->user->first_name}} {{$post->user->last_name}}. {{$post->created_at->diffForHumans()}}.
                            </div>
                            <div class="interaction">
                                @if(Auth::user())
                                @if(Auth::user() == $post->user || Auth::user()->isAdmin())
                                <a href="#" class="edit">Edit</a> |
                                <a href="{{route('post.delete', ['post_id' => $post->id])}}">Delete</a>
                                @endif
                                @endif
                            </div>
                        </article>
                    </div>
                </section>
            @endforeach
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-title">Edit the title of the post.</label>
                            <textarea class="form-control" name="post-title" id="post-title" rows="1"></textarea>
                            <label for="post-body">Edit the body of the post.</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-close">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = '{{ Session::token() }}';
        var url_ = '{{ route('edit') }}';
    </script>
@endsection
