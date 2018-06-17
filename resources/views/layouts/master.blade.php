<!DOCTYPE HTML>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/index.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/about.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/main.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Lora|Roboto&amp;subset=latin-ext" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    </head>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="podizbornik">

            @if(Auth::user())
                <a href="{{route('logout')}}">Logout</a>
                <a href="{{route('account')}}">Account</a>
                <a href="{{route('post.create')}}">Create post</a>
                @if(Auth::user()->isAdmin())
                    <a href="{{route('createuser')}}">Create user</a>
                @endif
                <a href="{{route('upload')}}">Upload</a>


            @else
                <a href="{{route('login')}}">Login</a>
            @endif

        </div>

        <div align="center" class="izbornik">
            <ul class="topnav" id="myTopnav">
                <li class="home nav"><a class="homea" href="/"></a></li>
                <li class="nav"><a href="/gallery">Gallery</a></li>
                <li class="nav"><a href="/videos">Videos</a></li>
                <li class="nav"><a href="/posts">Posts</a></li>
                <li class="nav"><a href="/users">Users</a></li>

                <li class="icon">
                    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><img src="images/threelines.svg"></a>
                </li>

            </ul>
        </div>
    </nav>
    <body class="body1">
        @yield('content')
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>﻿
        <script src="{{ URL::to('js/app.js') }}"></script>
    </body>
</html>