@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-11 col-xs-12" style="margin-top: 10px; margin-bottom: 10px">
            <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p><br><br>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-bottom: 5%">
            <h3 style="text-align: left; font-family: 'Segoe UI'; font-weight: bold; color: darkgray">Members you are following</h3><hr>
            @if(count($user_followings) > 0)
                <div class="col-md-12 col-xs-12" style="margin-bottom: 70px">
                    @foreach($user_followings as $user_following)
                        @foreach($users as $user)
                            @if($user_following->following_id == $user->id)
                                <div class="col-md-11 col-md-offset-1 col-xs-7 col-xs-offset-1"><a href="/user/profile/{{$user->id}}" style="text-align: left">{{$user->name}}</a><br><br></div>
                            @endif
                        @endforeach
                    @endforeach
                    {{$user_followings->links()}}
                </div>
            @else
                <div class="col-md-12 col-xs-12 pull-right" style="margin-bottom: 15%"><h4 style="text-align: left; font-family: 'Segoe UI'; color: darkgray">You are not following any member yet!</h4></div>
            @endif
        </div>
    </div>
@endsection