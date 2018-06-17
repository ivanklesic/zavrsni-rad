@if(count($errors) > 0)
    <div class="row">
        <div class="col-sm-6 col-md-offset-4">
            <ul class="error">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('message'))
    <div class="row">
        <div style="color:blue" class="col-sm-6 col-md-offset-4">
            {{Session::get('message')}}
        </div>
    </div>

@endif