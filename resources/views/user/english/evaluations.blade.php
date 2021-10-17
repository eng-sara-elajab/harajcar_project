@extends('layouts.user_english')

@section('content')
    <div class="row" style="margin-bottom: 20px; margin-top: 20px">
        <div class="col-md-2 col-md-offset-5 col-xs-2 col-xs-offset-8">
            <a href="/user/evaluate/{{$user->id}}" class="btn btn-lg btn-default" style="width: 120px; height: 50px"><p style="text-align: center; font-family: 'Segoe UI'; color: #0275d8; font-size: 22px">Add rate</p></a><br><br><br>
        </div>
        @if(count($evaluations) > 0)
            @foreach($evaluations as $evaluation)
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1" style="border: solid 1px lightgrey; border-radius: 15px">
                    @foreach($users as $user)
                        @if($user->id == $evaluation->user_id)
                            <span><a href="/user/profile/{{$user->id}}" class="pull-right" style="margin-top: 7px; color: #24a0ed">{{$user->name}}&nbsp;<i class="fa fa-user" aria-hidden="true"></i></a></span>
                            @break
                        @endif
                    @endforeach
                    <span class="pull-left" style="margin-top: 7px; color: darkgray; font-family: 'Segoe UI'; font-weight: bold">&nbsp;&nbsp;{{$evaluation->created_at->format('m/d/Y')}}</span>
                    <div style="margin-top: 40px; color: darkgray; font-family: 'Segoe UI'; font-weight: bold">
                        <span class="pull-right" style="margin-right: 20px">{{$evaluation->description}}</span>
                        <span class="pull-left" style="margin-bottom: 20px; border-radius: 10px; background-color: #c7f2ce"><a class="btn" style="width: 90px; height: 25px; margin-bottom: 10px"><i class="{{$evaluation->recommendations == 1 ? 'fa fa-thumbs-up fa-lg' : 'fa fa-thumbs-down fa-lg'}}" style="color: #5cb85c" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4" style="margin-bottom: 15%">
                <h6 style="text-align: left">No rates yet</h6>
            </div>
        @endif
    </div>
@endsection