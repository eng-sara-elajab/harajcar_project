@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-11 col-xs-12" style="margin-top: 10px; margin-bottom: 10px">
            <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p><br><br>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            @if(count($notifications) > 0)
                <div style="margin-bottom: 350px">
                    @foreach($notifications as $notification)
                        @if(str_contains($notification->body, 'Welcome to the greatest') || str_contains($notification->body, 'مرحباً بك في أكبر سوق لعرض وبيع'))
                            <div class="col-md-12 col-xs-12">
                                <h4 style="text-align: left">Welcome to the greatest online car accessories platform</h4><hr style="border: solid 1px darkgray">
                            </div>
                        @elseif(str_contains($notification->body, 'You have new follower') || str_contains($notification->body, 'لديك متابع جديد'))
                            <div class="col-md-12 col-xs-12">
                                <h4 style="text-align: left">You have new follower&nbsp;<span><a href="/user/profile/{{$notification->notifier_id}}" target="_blank" style="color:darkblue">Click to view</a></span></h4><hr style="border: solid 1px darkgray">
                            </div>
                        @elseif(str_contains($notification->body, 'You have new comment') || str_contains($notification->body, 'لديك تعليق جديد'))
                            <div class="col-md-12 col-xs-12">
                                <h4 style="text-align: left">You have new comment&nbsp;<span><a href="/one_product/{{$notification->notification_content_id}}" target="_blank" style="color:darkblue">Click to view</a></span></h4><hr style="border: solid 1px darkgray">
                            </div>
                        @elseif(str_contains($notification->body, 'You have new reply') || str_contains($notification->body, 'لديك رد جديد'))
                            <div class="col-md-12 col-xs-12">
                                <h4 style="text-align: left">You have new reply&nbsp;<span><a href="/one_product/{{$notification->notification_content_id}}" target="_blank" style="color:darkblue">Click to view</a></span></h4><hr style="border: solid 1px darkgray">
                            </div>
                        @elseif(str_contains($notification->body, 'You have comment from favourite post') || str_contains($notification->body, 'لديك تعليق من اعلان في المفضلة'))
                            <div class="col-md-12 col-xs-12">
                                <h4 style="text-align: left">You have comment from favourite post &nbsp;<span><a href="/one_product/{{$notification->notification_content_id}}" target="_blank" style="color:darkblue">Click to view</a></span></h4><hr style="border: solid 1px darkgray">
                            </div>
                        @elseif(str_contains($notification->body, 'Your membership has been activated successfully'))
                            <div class="col-md-12 col-xs-12">
                                <h4 style="text-align: left">{{$notification->body}}&nbsp;</h4><hr style="border: solid 1px darkgray">
                            </div>
                        @else
                            <div class="col-md-12 col-xs-12">
                                <h4 style="text-align: left">{{$notification->body}}&nbsp;</h4><hr style="border: solid 1px darkgray">
                            </div>
                        @endif
                    @endforeach
                </div>
                {{$notifications->links()}}
            @else
                <div class="col-md-12 col-xs-12" style="margin-bottom: 260px"><h4 style="text-align: center; font-family: 'Segoe UI'; color: darkgray">No notifications yet!</h4></div>
            @endif
        </div>
    </div>
@endsection