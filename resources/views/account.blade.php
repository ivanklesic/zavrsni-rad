@extends('layouts.master')
@section('title')
    Account
@endsection
@section('content')
    @include('includes.msg-block')

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3" align="center">
            <h3>Your Account</h3>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" id="last_name">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" maxlength="5000" class="form-control" rows="10" id="desc">{{ $user->desc }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    @if (Storage::disk('local')->has($user->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                Your current profile picture:
                <img src="{{ route('account.image', ['filename' => $user->id . '.jpg']) }}" alt="" class="img-responsive">
            </div>
        </section>
    @endif
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3" align="center">
            <h3>Add a new schedule entry</h3>
            <form action="{{ route('schedule.add') }}" method="post">
                <div class="form-group">
                    <label for="start">Start date</label>
                    <input type="date" name="start" class="form-control" id="start">
                </div>
                <div class="form-group">
                    <label for="finish">Finish date</label>
                    <input type="date" name="finish" class="form-control" id="finish">
                </div>
                <div class="form-group">
                    <label for="entry_desc">Description</label>
                    <textarea name="entry_desc" class="form-control" rows="2" id="desc"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>

        <div class="col-md-6 col-md-offset-3" align="center">
                @if(!empty($dates))
                    <h3>Your schedule</h3>
                    <table class="table table-user-information">
                    <tbody>
                        <tr>
                            <td style="color:#f37014">Start date</td>
                            <td style="color:#f37014">Finish date</td>
                            <td style="color:#f37014">Description</td>
                            <td></td>
                        </tr>
                            @foreach($dates as $date)
                            <tr>
                                <td>{{$date->start}}</td>
                                <td>{{$date->finish}}</td>
                                <td>{{$date->desc}}</td>
                                <td><a data-toggle="tooltip" href="{{route('date.delete', ['date_id' => $date->id])}}" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
                            </tr>
                            @endforeach
                    </tbody>
                    </table>
                @endif

        </div>
    </section>

@endsection