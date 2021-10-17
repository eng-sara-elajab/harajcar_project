@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-11 col-xs-12" style="margin-top: 10px; margin-bottom: 10px">
            <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p><br><br>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-bottom: 5%">
            <h3 style="text-align: right; font-family: 'Segoe UI'; font-weight: bold; color: darkgray">أعضاء تتابعهم</h3><hr>
            @if(count($user_followings) > 0)
                <div class="col-md-12 col-xs-12" style="margin-bottom: 70px">
                    @foreach($user_followings as $user_following)
                        @foreach($users as $user)
                            @if($user_following->following_id == $user->id)
                                <div class="col-md-2 col-md-offset-10 col-xs-4 col-xs-offset-8"><a href="/user/profile/{{$user->id}}" style="text-align: right">{{$user->name}}</a><br><br></div>
                            @endif
                        @endforeach
                    @endforeach
                    {{$user_followings->links()}}
                </div>
            @else
                <div class="col-md-12 col-xs-12 pull-right" style="margin-bottom: 15%">
                    <h4 style="text-align: right; font-family: 'Segoe UI'; color: darkgray">لم تقم بمتابعة أي عضو حتى الآن</h4>
                </div>
            @endif


            {{--@if(Auth::user()->following != NULL)--}}
                {{--<div style="margin-bottom: 300px">--}}
                    {{--@foreach($users as $in_array_user)--}}
                        {{--@if(in_array($in_array_user->id, $user_following))--}}
                            {{--<div class="col-md-2 col-md-offset-10 col-xs-4 col-xs-offset-8"><a href="/user/profile/{{$in_array_user->id}}" style="text-align: right">{{$in_array_user->name}}</a><br><br></div>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--@else--}}
                {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-bottom: 260px"><h4 style="text-align: right; font-family: 'Segoe UI'; color: darkgray">لم تقم بمتابعة أي عضو حتى الآن</h4></div>--}}
            {{--@endif--}}
        </div>
    </div>
@endsection