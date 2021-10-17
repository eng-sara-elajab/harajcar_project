@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-11 col-xs-12" style="margin-top: 10px; margin-bottom: 10px">
            <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p><br><br>
        </div><br><br>
        @if(count($messages) > 0)
            <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="margin-bottom: 30%; background-color: whitesmoke">
                <div class="col-md-12 col-xs-12" style="text-align: center"><br>
                    <a href="#" style="color: #0275d8; font-size: 20px; text-decoration: none">{{$chat_admin->name}}</a><br><br>
                </div>
                @foreach($messages as $message)
                    @if($message->sender_id == Auth::user()->id && $message->sender_type == 'user')
                        <div class="col-md-1 col-xs-1" style="background-color: whitesmoke">
                            @if($chat_user->profile_photo != null)
                                <img class="img-circle" style="border-radius: 50%; width: 40px; height: 40px" src="{{asset('images/profiles/'.$chat_user->profile_photo)}}">
                            @else
                                <img class="img-circle" style="border-radius: 50%; width: 40px; height: 40px" src="{{asset('images/profiles/default_profile.jpg')}}">
                            @endif
                        </div>
                        <div class="col-md-7 col-xs-7" style="background-color: whitesmoke; text-align: left; margin-top: 5px">
                            <div style="background-color: #5cb85c; height: auto; border-radius: 5px; min-height: 30px">
                                <p style="margin-left: 10px; color: white">{{$message->body}}</p>
                                <em class="pull-right" style="color: darkgrey; font-size: 10px">{{$message->created_at}}</em>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12" style="opacity: 0; font-size: 1px">
                            <p>Test text Test text Test text Test text Test text Test text Test text Test text </p>
                        </div>
                    @else
                        <div class="col-md-1 col-xs-1 pull-right" style="background-color: whitesmoke">
                            @if($chat_admin->profile_photo != null)
                                <img class="img-circle" style="border-radius: 50%; width: 40px; height: 40px" src="{{asset('images/profiles/'.$chat_admin->profile_photo)}}">
                            @else
                                <img class="img-circle" style="border-radius: 50%; width: 40px; height: 40px" src="{{asset('images/profiles/default_profile.jpg')}}">
                            @endif
                        </div>
                        <div class="col-md-7 col-xs-7 pull-right" style="background-color: whitesmoke; text-align: right; margin-top: 5px">
                            <div style="background-color: white; height: auto; border-radius: 5px; min-height: 30px">
                                <p style="font-size: 14px; margin-right: 10px; color: darkgray">{{$message->body}}</p>
                                <em class="pull-right" style="color: darkgrey; font-size: 10px">{{$message->created_at}}</em>
                            </div>
                            {{--<hr style="border: solid 1px darkgray; opacity: 0.2">--}}
                        </div>
                        <div class="col-md-12 col-xs-12" style="opacity: 0; font-size: 1px">
                            <p>Test text Test text Test text Test text Test text Test text Test text Test text </p>
                        </div>
                    @endif
                @endforeach
                <form action="/new_admin_user_message_reply/{{$message->chat_room}}/{{$chat_user->id}}/{{$chat_admin->id}}" method="post" class="row">
                    @csrf
                    <textarea class="col-md-11 col-xs-11 placeholder-styling" name="body" style="background-color: white; height: 35px; text-align: left; margin-bottom: 10px" placeholder="Reply here" required></textarea>
                    <button type="submit" class="btn btn-default col-md-1 col-xs-1" style="background-color: #5cb85c; font-size: 18px; color: white; height: 35px; margin-bottom: 20px"><span class="iconify" data-icon="fa-brands:telegram-plane" data-inline="false"></span></button>
                </form>
            </div>
        @else
            <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="margin-bottom: 300px; background-color: whitesmoke"><h4 style="text-align: center; font-family: 'Segoe UI'; color: darkgray">No messages</h4></div>
        @endif
    </div>
@endsection