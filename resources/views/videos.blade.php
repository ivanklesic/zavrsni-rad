<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lora|Roboto&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/gallery.css')}}">
</head>
<body>


<header>
    <div class="podizbornik">
        @if($user=Auth::user())
            <a href="{{route('account')}}">Account</a>
            <a href="{{route('createuser')}}">Create user</a>
            <a href="{{route('post.create')}}">Create post</a>
            <a href="{{route('upload')}}">Upload</a>
            <a href="{{route('logout')}}">Logout</a>

        @else
            <a href="{{route('login')}}">Login</a>
        @endif
    </div>

    <div class="izbornik">
        <ul class="topnav" id="myTopnav">
            <li class="home nav"><a class="homea" href="/"></a></li>

            <li class="nav"><a href="/gallery">Gallery</a></li>
            <li class="nav"><a href="/videos">Videos</a></li>
            <li class="nav"><a href="/posts">Posts</a></li>
            <li class="nav"><a href="/users">Guides</a></li>
            <li class="icon">
                <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><img src="{{URL::to('images/threelines.svg')}}"></a>
            </li>
        </ul>
    </div>
</header>
<div class="main">

    <div class="sadrzaj">
        <div id="content">
            <div class="bg_1">
            </div>
            <div class="slike">
                <section  id="photos">
                    @if(!empty($videos))
                        @foreach($videos as $v)
                            <video width="1000" height="1000" controls>
                                <source src="{{URL::to('/Videos/' . basename($v))}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endforeach
                    @endif
                </section>
            </div>
        </div>
    </div>
</div>

</body>

</html>