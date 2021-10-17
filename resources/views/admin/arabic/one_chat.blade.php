@extends('layouts.admin_arabic')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12" style="margin-top: 10px; margin-bottom: 10px">
                <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p><br>
            </div><br><br>
            @if(count($admin_user_messages) > 0)
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1" style="margin-bottom: 30%; background-color: lightgrey; border: solid 1px darkgrey; float:left; width:1000px; overflow-y: auto; height: 500px" id="scrolldiv">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center"><br>
                        <a href="/admin/view_user_profile/{{$chat_user->id}}" style="color: #0275d8; font-size: 20px">{{$chat_user->name}}</a><br><br>
                    </div>
                    <div class="row">
                        @foreach($admin_user_messages as $admin_user_message)
                            @if($admin_user_message->sender_id == $chat_admin->id && $admin_user_message->sender_type == 'admin')
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2" style="background-color: whitesmoke; margin-left: 10px">
                                    @if(Auth::guard('admin')->user()->profile_photo != null)
                                        <img class="img-circle" style="border-radius: 50%; width: 40px; height: 40px" src="{{asset('images/profiles/'.Auth::guard('admin')->user()->profile_photo)}}">
                                    @else
                                        <img class="img-circle" style="border-radius: 50%; width: 40px; height: 40px" src="{{asset('images/profiles/default_profile.jpg')}}">
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6" style="background-color: whitesmoke; text-align: left">
                                    <div style="background-color: #5cb85c; height: auto; border-radius: 5px; min-height: 30px; margin-top: 5px">
                                        <p style="font-size: 14px; margin-left: 10px; color: white">{{$admin_user_message->body}}</p>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="opacity: 0; font-size: 1px">
                                    <p>Test text Test text Test text Test text Test text Test text Test text Test text </p>
                                </div>
                            @else
                                <div class="col-xl-4 offset-xl-6 col-lg-4 offset-lg-6 col-md-4 offset-md-6 col-sm-4 offset-sm-6 col-6 offset-4" style="background-color: whitesmoke; text-align: right">
                                    <div style="background-color: white; height: auto; border-radius: 5px; min-height: 30px; margin-top: 5px">
                                        <p style="font-size: 14px; color: darkgray; text-align: right">{{$admin_user_message->body}}</p>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2" style="background-color: whitesmoke; margin-left: 0">
                                    @if($chat_user->profile_photo != null)
                                        <img class="img-circle" style="border-radius: 50%; width: 40px; height: 40px" src="{{asset('images/profiles/'.$chat_user->profile_photo)}}">
                                    @else
                                        <img class="img-circle" style="border-radius: 50%; width: 40px; height: 40px" src="{{asset('images/profiles/default_profile.jpg')}}">
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="opacity: 0; font-size: 1px">
                                    <p>Test text Test text Test text Test text Test text Test text Test text Test text </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <form action="/admin/new_admin_user_message_reply/{{$admin_user_message->chat_room}}/{{$chat_admin->id}}/{{$chat_user->id}}" method="post" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" style="position: relative; bottom: 0">
                        @csrf
                        <textarea class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 placeholder-styling" name="body" style="background-color: white; height: 35px; text-align: right; margin-bottom: 10px" placeholder="أكتب ردك هنا" required></textarea>
                        <button type="submit" class="btn btn-default col-lg-1 col-lg-1 col-md-1 col-sm-1 col-1" style="background-color: #5cb85c; font-size: 18px; color: white; height: 35px; margin-bottom: 20px"><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </div>
            @else
                <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-10 offset-sm-1 col-10 offset-1" style="margin-bottom: 300px; background-color: whitesmoke">
                    <h3 style="color: darkorange; text-align: center">لا توجد رسائل</h3>
                </div>
            @endif
        </div>
    </section>
@endsection