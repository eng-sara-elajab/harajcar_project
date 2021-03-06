@extends('layouts.admin_english')

@section('content')
    <div class="container-fluid row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @if (session('alert'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                    <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-6 offset-3">
            @if($user->active_status == 'active')
                <a href="/user/block/{{$user->id}}" class="btn btn-danger btn-block" style="color: white">حظر</a>
            @else
                <a href="/user/unblock/{{$user->id}}" class="btn btn-warning btn-block" style="color: white">فك الحظر</a>
            @endif
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" style="background-color: lightgrey; width: 96%; margin-left: 2%; margin-top: 5px; position:relative; margin-bottom: 85px">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @if($user->cover_photo != null)
                    <img src="{{asset('images/covers/'.$user->cover_photo)}}" style="width: 100%; height: 450px">
                @else
                    <img src="{{asset('images/covers/default_cover.jpg')}}" style="width: 100%; height: 450px">
                @endif
            </div>
            <div class="col-xl-4 offset-xl-3 col-lg-4 offset-lg-3 col-md-4 offset-md-3 col-sm-5 offset-sm-2 col-4 offset-2" style="position: absolute">
                @if($user->profile_photo != null)
                    <img src="{{asset('images/profiles/'.$user->profile_photo)}}" style="border-radius: 100px; height: 200px; width: 200px; position: absolute; left: 38%; top: 330px">
                @else
                    <img src="{{asset('images/profiles/default_profile.jpg')}}" style="border-radius: 100px; height: 200px; width: 200px; position: absolute; left: 38%; top: 330px">
                @endif
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pull-left" style="margin-bottom: 20px">
            <p style="text-align: left; font-family: 'Segoe UI'; margin-left: 20px">
                @if($r == 0)
                    <i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i>
                @elseif($r > 0 && $r <= 20)
                    <i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i>
                @elseif($r > 20 && $r <= 40)
                    <i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i>
                @elseif($r > 40 && $r <= 60)
                    <i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i>
                @elseif($r > 60 && $r <= 80)
                    <i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star-o" aria-hidden="true" style="color: orange"></i>
                @else
                    <i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i><i class="fa fa-star" aria-hidden="true" style="color: orange"></i>
                @endif
            </p>
            <p style="text-align: left; font-family: 'Segoe UI'; margin-left: 30px; color: #0275d8"><span class="pull-left">تقييم</span>&nbsp;{{$user->no_of_likes + $user->no_of_dislikes}}</p>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4" style="margin-bottom: 20px">
            <a href="#"><p style="text-align: center; font-family: 'Segoe UI'; font-size: large">{{$user->name}}</p></a>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pull-right" style="margin-bottom: 20px">
            @if($array == null)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 35px; color: darkgray; font-size: 14px"><span class="pull-right">0</span>متابع&nbsp;</p>
            @else
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 35px; color: darkgray; font-size: 14px"><span class="pull-right">{{count($array)-1}}</span>متابع&nbsp;</p>
            @endif
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style="margin-bottom: 20px; text-align: center">
            <p style="text-align: center; font-family: 'Segoe UI'; color: darkgray; font-size: 15px">{{$user->created_at->diffForHumans()}}&nbsp;<i class="fa fa-calendar" aria-hidden="true" style="font-size: 22px"></i></p>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style="margin-bottom: 60px; text-align: center; font-size: 18px; font-family: 'Segoe UI'; color:#0275d8">
            <a data-toggle="modal" data-target="#chatModal" id="open" style="text-decoration: none">  محادثة&nbsp;<i class='fa fa-comments'></i></a>
        </div>
        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="chatModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">
                        <button type="button" class="pull-left close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/admin/admin_user_chat/create/{{Auth::guard('admin')->user()->id}}/{{$user->id}}" id="form">
                        <div class="modal-body">
                            <p class="modal-title" style="font-size: 12px; font-family: 'Segoe UI'; color: darkgray; text-align: center">رسالة سريعة إلى</p>
                            <p style="font-size: 16px; font-weight: bold; color: black; text-align: center">عضو رقم {{$user->id}}</p>
                            <div class="row">
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    @csrf
                                    <label for="Name" class="pull-right">: الرسالة</label>
                                    <textarea class="form-control input-field" name="body" id="body" style="height: 150px" placeholder="أكتب رسالتك هنا"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="pull-left">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-success">إرسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="col-md-12 col-xs-12 row" style="width: 100%; height: 10%; text-align: right; background-color: #F5FFFA; border: 1px solid lightgrey; border-style: none none solid none; margin-bottom: 20px">
                    @foreach($images as $image)
                        @if($image->post_id == $post->id)
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                <img src="{{asset('/images/posts/'.$image->name)}}" style="width: 100%; height: 110px">
                            </div>
                            @break
                        @endif
                    @endforeach
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <a href="/one_product/{{$post->id}}" style="color: #3CB371; margin-right: 10px; font-size: 22px; font-weight: bold">{{$post->title}}</a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <p style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold" class="pull-left">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></p>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                @if($user->id == $post->user_id)
                                    <p><span><a href="/user/profile/{{$user->id}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold">{{$user->name}}</a><i class="fa fa-user"></i></span></p>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <p><a href="/region/{{$post->region}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold"> {{$post->region}}&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$posts->links()}}
        @else
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="font-family: 'Segoe UI'; margin-bottom: 60px">
                <h3 style="color: darkorange; text-align: center">لا توجد معروضات</h3>
            </div>
        @endif
    </div>
@endsection