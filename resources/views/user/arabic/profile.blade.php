@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-md-12 col-xs-12 row" style="background-color: lightgrey; width: 96%; margin-left: 2%; margin-top: 5px; position:relative; margin-bottom: 85px">
            <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>

            <div class="col-md-12 col-xs-12">
                @if($user->cover_photo != null)
                    <img src="{{asset('images/covers/'.$user->cover_photo)}}" style="width: 100%; height: 450px">
                @else
                    <img src="{{asset('images/covers/default_cover.jpg')}}" style="width: 100%; height: 450px">
                @endif
            </div>
            <div class="col-xl-2 col-xl-offset-4 col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-sm-2 col-sm-offset-4 col-xs-2 col-xs-offset-3" style="position: absolute">
                @if($user->profile_photo != null)
                    <img src="{{asset('images/profiles/'.$user->profile_photo)}}" style="border-radius: 100px; height: 200px; width: 200px; position: absolute; left: 38%; top: 330px">
                @else
                    <img src="{{asset('images/profiles/default_profile.jpg')}}" style="border-radius: 100px; height: 200px; width: 200px; position: absolute; left: 38%; top: 330px">
                @endif
            </div>
        </div>
        <div class="col-md-2 col-xs-3 pull-left" style="margin-bottom: 20px">
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
            <a href="/user/evaluations/{{$user->id}}"><p style="text-align: left; font-family: 'Segoe UI'; margin-left: 30px; color: #0275d8"><span class="pull-left">??????????</span>&nbsp;{{$user->no_of_likes + $user->no_of_dislikes}}</p></a>
        </div>
        <div class="col-xl-2 col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-6" style="margin-bottom: 20px">
            <a href="#"><h3 style="text-align: center; font-family: 'Segoe UI'"><i class="{{$user->documentation_status == 1 ? 'fa fa-check-circle' : ''}}" aria-hidden="true" style="color: #0275d8"></i>&nbsp;&nbsp;{{$user->name}}</h3></a>
        </div>
        <div class="col-md-1 col-md-offset-1 col-xs-2 col-xs-offset-1 pull-right" style="margin-bottom: 20px">
            @if($user->followers != null)
                <form method="post" action="{{in_array(Auth::user()->id, $user->followers) ? '/user/unfollow/'.$user->id : '/user/follow/'.$user->id}}" style="width: 80px">
                    @csrf
                    <input class="btn btn-default btn-sm pull-right follow_button" type="submit" value="{{in_array(Auth::user()->id, $user->followers) ? '??????????' : '????????????'}}"><br>
                    <p style="text-align: left; font-family: 'Segoe UI'; margin-right: 35px; color: darkgray; font-size: 14px"><span class="pull-right">{{count($array)-1}}</span>??????????&nbsp;</p>
                </form>
            @else
                @if(Auth::user()->id != $user->id)
                    <form method="post" action="/user/follow/{{$user->id}}" style="width: 80px">
                        @csrf
                        <input class="btn btn-default btn-sm pull-right follow_button" type="submit" value="????????????"><br>
                        <p style="text-align: left; font-family: 'Segoe UI'; margin-right: 35px; color: darkgray; font-size: 14px"><span class="pull-right">0</span>??????????&nbsp;</p>
                    </form>
                @else
                    <form method="" action="#" style="width: 80px">
                        <p style="text-align: left; font-family: 'Segoe UI'; margin-right: 35px; color: darkgray; font-size: 14px"><span class="pull-right">0</span>??????????&nbsp;</p>
                    </form>
                @endif
            @endif
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="col-md-6 col-xs-6 pull-right" style="margin-bottom: 20px; text-align: center">
                <p style="text-align: center; font-family: 'Segoe UI'; color: darkgray; font-size: 15px; margin-right: 8%">{{$user->created_at->diffForHumans()}}&nbsp;<i class="fa fa-calendar" aria-hidden="true" style="font-size: 22px"></i></p>
            </div>

            @if($user->id !== Auth::user()->id)
                <div class="col-md-6 col-xs-6 pull-left" style="margin-bottom: 60px; text-align: center; font-size: 18px; font-family: 'Segoe UI'; color:#0275d8">
                    <a style="text-decoration: none; margin-right: 8%" data-toggle="modal" data-target="#myModal" id="open">  ????????????&nbsp;<i class='fa fa-comments'></i></a>
                </div>
            @endif
            <!-- Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p class="modal-title" style="font-size: 12px; text-align: center; font-family: 'Segoe UI'; color: darkgray">?????????? ?????????? ??????</p>
                            <p style="font-size: 18px; font-weight: bold; color: black; text-align: center">?????? ?????? {{$user->id}}</p>
                        </div>
                        <form method="post" action="/chat/create/{{Auth::user()->id}}/{{$user->id}}" id="form">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        @csrf
                                        <label for="Name" class="pull-right">: ??????????????</label>
                                        <textarea class="form-control input-field" name="body" id="body" style="height: 150px" placeholder="???????? ???????????? ??????"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="pull-left">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">??????????</button>
                                    <button type="submit" class="btn btn-success">??????????</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="col-md-12 col-xs-12" style="width: 100%; height: 10%; text-align: right; background-color: #F5FFFA; border: 1px solid lightgrey; border-style: none none solid none; margin-bottom: 20px">
                    @foreach($images as $image)
                        @if($image->post_id == $post->id)
                            <div class="col-md-2 col-xs-3">
                                <img src="{{asset('/images/posts/'.$image->name)}}" style="width: 100%; height: 110px">
                            </div>
                            @break
                        @endif
                    @endforeach
                    <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1">
                        <a href="/one_product/{{$post->id}}" style="color: #3CB371; margin-right: 10px; font-size: 22px; font-weight: bold">{{$post->title}}</a>
                    </div>
                    <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1" style="margin-top: 15px">
                        <p style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold" class="pull-left">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></p>
                    </div>
                    @foreach($users as $user)
                        @if($user->id == $post->user_id)
                            <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1">
                                <p><span class="pull-left"><a href="/user/profile/{{$user->id}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold">{{$user->name}}</a><i class="fa fa-user"></i></span><a href="/region/{{$post->region}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold"> {{$post->region}}&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i></a></p>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
            <span class="pull-left" style="margin-left: 50px">
                {{$posts->links()}}
            </span>
            {{--<div class="col-md-12 col-xs-12" style="text-align: center; font-size: 25px; font-family: 'Segoe UI'; margin-bottom: 60px; color: darkgray">???? ???????? ?????????????? ????????</div>--}}
        @else
            <div class="col-md-12 col-xs-12" style="text-align: center; font-size: 25px; font-family: 'Segoe UI'; margin-bottom: 60px; color: darkgray">???? ???????? ??????????????</div>
        @endif
    </div>
@endsection