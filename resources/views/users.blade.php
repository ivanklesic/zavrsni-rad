@extends('layouts.master')
@section('title')
    Guides
@endsection
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 top" >

                @foreach($users as $user)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$user->first_name}} {{$user->last_name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center">

                                <img alt="User Picture" src="{{route('account.image', ['filename' => $user->id . '-resize.jpg'])}}" class="img img-responsive">

                            </div>

                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>E-mail:</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    {{$user->desc}}
                                    </tbody>
                                </table>
                                    <h3>Schedule</h3>
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td style="color:#f37014">Start date</td>
                                            <td style="color:#f37014">Finish date</td>
                                            <td style="color:#f37014">Description</td>

                                        </tr>
                                        @foreach($user->dates()->get() as $date)
                                            <tr>
                                                <td>{{$date->start}}</td>
                                                <td>{{$date->finish}}</td>
                                                <td>{{$date->desc}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        @if(Auth::user() != null)
                        @if(Auth::user()->isAdmin())
                            @unless(Auth::user() == $user)
                                <a data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                            @endunless
                        @endif
                        @endif

                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection