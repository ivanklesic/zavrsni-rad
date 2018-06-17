@extends('layouts.master')
@section('title')
    Upload
@endsection
@section('content')
    @include('includes.msg-block')

        <div class="row" align="center">
            <h1>Images</h1>
            <section class="row new-post">

                <div class="col-md-4 col-md-offset-4">
                    <h3>Upload image</h3>
                    <form action="{{ route('file.upload')  }}" method="post" id="upload" enctype="multipart/form-data">
                        <input type="file" name="file[]" multiple><br>
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </section>

            <h1>Videos</h1>
            <section class="row new-post">
            <div class="col-md-4 col-md-offset-4">
                    <h3>Upload videos (only .mp4)</h3>
                    <form action="{{ route('video.upload')  }}" method="post" id="video" enctype="multipart/form-data">
                        <input type="file" name="file[]" multiple><br>
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
            </div>
            </section>
        </div>


@endsection