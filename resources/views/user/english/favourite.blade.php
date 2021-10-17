@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-11 col-xs-12" style="margin-top: 10px; margin-bottom: 30px">
            <p style="text-align: right; margin-right: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; position: absolute; margin-left: 10px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p><br><br>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <div class="col-md-12 col-xs-12">
                @if(count($favourits) > 0)
                    @foreach($favourits as $favourit)
                        <div class="col-md-12 col-xs-12" style="width: 100%; height: 10%; text-align: right; background-color: #F5FFFA; border: 1px solid lightgrey; border-style: none none solid none">
                            @foreach($posts as $post)
                                @if($favourit->favourite_id == $post->id && $favourit->user_id == Auth::user()->id)
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
                                        <p style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold" class="pull-left">{{$post->created_at->diffForHumans()}}&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></p>
                                    </div>
                                    @foreach($users as $user)
                                        @if($user->id == $favourit->user_id)
                                            <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1">
                                                <p><span class="pull-left"><a href="/user/profile/{{$user->id}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold">{{$user->name}}</a><i class="fa fa-user"></i></span><a href="#" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold"> {{$post->region}}&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i></a></p>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 col-xs-12" style="text-align: center; font-size: 25px; font-family: 'Segoe UI'; margin-bottom: 15%; color: darkgray; margin-bottom: 300px">لا توجد مفضلة</div>
                @endif
            </div>
        </div>
    </div>
@endsection