@extends('layouts.admin_english')

@section('content')
    <div style="background-color: #F0F8FF">
        <div class="container-fluid row">
            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12">
                @if (session('alert'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                        <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                    </div>
                @endif
                <div style="background-color: white; border-radius: 25px">
                    <div style="height: 1px"></div>
                    <div style="width: 98%; background-color: #FFFAF0; border-radius: 25px; height: 150px; margin-left: 1%; margin-top: 1%"><br>
                        <p style="color: #3CB371; margin-right: 15px; font-size: 18px; font-weight: bold; font-family: 'Segoe UI'; text-align: right">{{$post->title}}</p>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row">
                            <div class="col-xl-2 offset-xl-4 col-lg-3 offset-lg-3 col-md-4 offset-md-2 col-sm-4 offset-sm-2 col-4 offset-2" style="margin-top: 10px">
                                <a href="#" style="font-size: 14px; font-family: 'Segoe UI'; color: #5cb85c; margin-left: 20px">{{$post->region}}&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-xl-2 offset-xl-4 col-lg-3 offset-lg-3 col-md-4 offset-md-2 col-sm-4 offset-sm-2 col-4 offset-2" style="margin-top: 10px">
                                <a class="pull-right" href="/admin/view_user_profile/{{$post_owner->id}}" style="font-size: 14px; margin-right: 20px">{{$post_owner->name}}&nbsp;<i class="fa fa-h-square" style="color: darkgrey" aria-hidden="true"></i></a>
                            </div>

                            <div class="col-xl-2 offset-xl-4 col-lg-3 offset-lg-3 col-md-4 offset-md-2 col-sm-4 offset-sm-2 col-4 offset-2" style="margin-top: 10px">
                                <a href="#" style="font-size: 14px; color: #5cb85c; font-family: 'Segoe UI'; margin-left: 20px">{{$post_owner->no_of_likes}}&nbsp;تقييم إيجابي&nbsp;<i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-xl-2 offset-xl-4 col-lg-3 offset-lg-3 col-md-4 offset-md-2 col-sm-4 offset-sm-2 col-4 offset-2" style="margin-top: 10px">
                                <p class="pull-right" style="font-size: 14px; color: #696969; font-family: 'Segoe UI'; margin-right: 20px">{{$post->created_at->diffForHumans()}}&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></p>
                            </div>
                        </div>
                    </div><br><br>
                    <p style="text-align: right; font-family: 'Segoe UI'; font-size: 18px; font-weight: bold; color: #696969; margin: 15px">{{$post->body}}</p>
                    @foreach($images as $image)
                        <img src="{{asset('/images/posts/'.$image->name)}}" style="height: 350px; width: 96%; margin-left: 2%"><br>
                    @endforeach
                    <div class="col-xl-4 offset-xl-8 col-lg-4 offset-lg-8 col-md-6 offset-md-6 col-sm-5 offset-sm-7 col-6 offset-6">
                        <a href="tel://{{$post->phone}}" class="btn btn-default btn-lg pull-right" style="margin-top: 20px; margin-right: 2%; color: green; border-radius: 15px">{{$post->phone}}&nbsp;&nbsp;<i class="fa fa-phone circle-icon" style="color: #0275d8" aria-hidden="true"></i></a>
                    </div>
                    <br><br><br><br><br><br>
                </div><br>
            </div>
            @if(count($comments) > 0)
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12" style="background-color: white; border-radius: 10px; height: auto">
                    <h4 style="font-family: 'Segoe UI'; color: darkgrey; text-align: right; margin-top: 3%; margin-bottom: 3%">التعليقات</h4>
                    @foreach($comments as $comment)
                        @foreach($users as $user)
                            @if($comment->user_id == $user->id && $comment->post_id == $post->id)
                                <div style="width: 98%; margin-left: 1%">
                                    <i class="fa fa-user pull-right rounded-icon" style="color: darkgrey" aria-hidden="true"></i>
                                    <a class="pull-right" style="font-family: 'Segoe UI'">&nbsp;{{$user->name}}&nbsp;</a>
                                    <a href="/admin/delete_comment/{{$comment->id}}" class="pull-left" style="margin-left: 5%"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                    <i class="fa fa-envelope pull-right rounded-icon" style="color: darkgrey" aria-hidden="true"></i><br>
                                    <br><a href="#" style="color: darkgrey; font-family: 'Segoe UI'; font-size: 12px; margin-right: 15px" class="pull-right">{{$comment->created_at->diffForHumans()}}</a><br>
                                    <h4 style="width: 98%; margin-left: 1%; text-align: right; font-family: 'Segoe UI'; font-size: 16px">{{$comment->body}}</h4>
                                    <hr>
                                    @if(count($replies) > 0)
                                        @foreach($replies as $reply)
                                            @foreach($users as $user)
                                                @if($reply->user_id == $user->id && $reply->comment_id == $comment->id)
                                                    <div style="width: 88%; margin-right: 12%">
                                                        <i class="fa fa-user pull-right rounded-icon" style="color: darkgrey" aria-hidden="true"></i>
                                                        <a class="pull-right" style="font-family: 'Segoe UI'">&nbsp;{{$user->name}}&nbsp;</a>
                                                        <a href="/admin/delete_reply/{{$reply->id}}" class="pull-left" style="margin-left: 5%"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                                        <i class="fa fa-envelope pull-right rounded-icon" style="color: darkgrey" aria-hidden="true"></i><br>
                                                        <br><a href="#" style="color: darkgrey; font-family: 'Segoe UI'; font-size: 12px; margin-right: 15px" class="pull-right">{{$reply->created_at->diffForHumans()}}</a><br>
                                                        <h4 style="width: 98%; margin-left: 1%; text-align: right; font-family: 'Segoe UI'; font-size: 16px">{{$reply->body}}</h4>
                                                        <hr>
                                                    </div>
                                                    @break
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>
                                @break
                            @endif
                        @endforeach
                    @endforeach
                </div>
            @endif
            <div class="col-md-6 offset-md-3 col-xs-6 offset-xs-3">
                @if($post->active_status == 'active')
                    <a href="/post/delete/{{$post->id}}" class="btn btn-danger btn-block" style="color: white">حذف المنشور</a>
                @else
                    <a href="/post/restore/{{$post->id}}" class="btn btn-warning btn-block" style="color: white">استرجاع المنشور</a>
                @endif
            </div>
        </div>
    </div>
@endsection