@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-11 col-xs-12" style="margin-top: 10px; margin-bottom: 10px">
            <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p><br><br>
        </div>
        <div style="margin-bottom: 50%">
            @if(count($admin_user_chats) > 0)
                <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="background-color: whitesmoke; text-align: right; border: dashed orange 1px"><br>
                    @foreach($admin_user_chats as $admin_user_chat)
                        @foreach($admins as $admin)
                            @if($admin->id == $admin_user_chat->admin_id)
                                <div class="col-md-2 col-xs-2 pull-right">
                                    @if($admin->profile_photo != null)
                                        <img class="img-circle" style="border-radius: 50%; width: 60px; height: 60px; margin-right: 10px" src="{{asset('images/profiles/'.$admin->profile_photo)}}">
                                    @else
                                        <img class="img-circle" style="border-radius: 50%; width: 60px; height: 60px; margin-right: 10px" src="{{asset('images/profiles/default_profile.jpg')}}">
                                    @endif
                                </div>
                                <div class="col-md-10 col-xs-10 pull-right" style="margin-top: 10px">
                                    <a href="#" style="font-size: 18px; font-family: 'Segoe UI'; color: #0275d8; margin-top: 15px; text-decoration: none">{{$admin->name}}</a><br>
                                </div>
                                @foreach($admin_user_messages as $admin_user_message)
                                    @if($admin_user_message->chat_room == $admin_user_chat->id)
                                        <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                                            <a href="/admin/one_chat/{{$admin_user_message->chat_room}}" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgray; margin-right: 40px">
                                                @if(strlen($admin_user_message->body) > 50)
                                                    ....
                                                    {{substr($admin_user_message->body,0,50)}}
                                                @else
                                                    {{$admin_user_message->body}}
                                                @endif
                                            </a><br>
                                            <em class="pull-left" style="color: darkgrey">{{$admin_user_chat->updated_at->diffForHumans()}}</em>
                                            <hr style="height: 1px; background-color: darkgray; border: none">
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endforeach
                </div>
            @endif
            @if(count($chats) > 0)
                <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="background-color: whitesmoke; text-align: right"><br>
                    @foreach($chats as $chat)
                        @foreach($users as $user)
                            @if(($user->id == $chat->owner_id || $user->id == $chat->starter_id) && $user->id != Auth::user()->id)
                                <div class="col-md-2 col-xs-2 pull-right">
                                    @if($user->profile_photo != null)
                                        <img class="img-circle" style="border-radius: 50%; width: 60px; height: 60px; margin-right: 10px" src="{{asset('images/profiles/'.$user->profile_photo)}}">
                                    @else
                                        <img class="img-circle" style="border-radius: 50%; width: 60px; height: 60px; margin-right: 10px" src="{{asset('images/profiles/default_profile.jpg')}}">
                                    @endif
                                </div>
                            @endif
                            @if($user->id != Auth::user()->id)
                                @if($user->id == $chat->owner_id || $user->id == $chat->starter_id)
                                    <div class="col-md-10 col-xs-10" style="margin-top: 10px">
                                        <a href="/user/profile/{{$user->id}}" style="font-size: 18px; font-family: 'Segoe UI'; color: #0275d8; margin-top: 15px">{{$user->name}}</a><br>
                                    </div>
                                @endif
                            @endif
                            @if($user->id == $chat->sender_id || $user->id == $chat->starter_id)
                                @foreach($messages as $message)
                                    @if($message->chat_room == $chat->id)
                                        <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                                            <a href="/user/one_chat/{{$message->chat_room}}" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgray; margin-right: 40px">
                                                @if(strlen($message->body) > 50)
                                                    ....
                                                    {{substr($message->body,0,50)}}
                                                @else
                                                    {{$message->body}}
                                                @endif
                                            </a><br>
                                            <em class="pull-left" style="color: darkgrey">{{$chat->updated_at->diffForHumans()}}</em>
                                            <hr style="height: 1px; background-color: darkgray; border: none">
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                                @break
                            @endif
                        @endforeach
                    @endforeach
                </div>
            @endif
            @if(count($admin_user_chats) == 0 && count($chats) == 0)
                <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="margin-bottom: 300px; background-color: whitesmoke"><h4 style="text-align: center; font-family: 'Segoe UI'; color: darkgray">لا توجد رسائل</h4></div>
            @endif
        </div>
    </div>
@endsection