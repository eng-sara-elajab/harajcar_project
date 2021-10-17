@extends('layouts.admin_english')

@section('content')
    <section class="content row">
        <div class="container-fluid row">
            <div class="col-md-11 col-xs-12" style="margin-top: 10px; margin-bottom: 10px">
                <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p><br><br>
            </div>
            @if(count($admin_user_chats) > 0)
                <div class="col-md-10 offset-md-1 col-xs-10 offset-xs-1 row" style="background-color: whitesmoke; text-align: right; float:left; width:1000px; overflow-y: auto; height: 400px"><br>
                    @foreach($admin_user_chats as $admin_user_chat)
                        @foreach($users as $user)
                            @if($user->id == $admin_user_chat->user_id)
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10" style="margin-top: 10px">
                                    <a href="/admin/view_user_profile/{{$user->id}}" style="font-size: 18px; font-family: 'Segoe UI'; color: #0275d8; margin-top: 15px">{{$user->name}}</a><br>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                    @if($user->profile_photo != null)
                                        <img class="img-circle" style="border-radius: 50%; width: 60px; height: 60px; margin-right: 10px" src="{{asset('images/profiles/'.$user->profile_photo)}}">
                                    @else
                                        <img class="img-circle" style="border-radius: 50%; width: 60px; height: 60px; margin-right: 10px" src="{{asset('images/profiles/default_profile.jpg')}}">
                                    @endif
                                </div>

                                @foreach($admin_user_messages as $admin_user_message)
                                    @if($admin_user_message->chat_room == $admin_user_chat->id)
                                        <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                                            <a href="/admin/admin_user_one_chat/{{$admin_user_message->chat_room}}" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgray; margin-right: 30px">
                                                @if(strlen($admin_user_message->body) > 50)
                                                    ....
                                                    {{substr($admin_user_message->body,0,50)}}
                                                @else
                                                    {{$admin_user_message->body}}
                                                @endif
                                            </a><br><hr style="height: 1px; background-color: darkgray; border: none">
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endforeach
                    {{$admin_user_chats->links()}}
                </div>
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom: 300px; background-color: whitesmoke">
                    <h3 style="color: darkorange; text-align: center">لا توجد رسائل</h3>
                </div>
            @endif
        </div>
    </section>
@endsection