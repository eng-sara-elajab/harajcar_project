@extends('layouts.user_arabic')

@section('content')
    <div class="row">
        <div class="col-md-1 col-md-offset-1 col-xs-11 col-xs-offset-1">
            <a href="{{Auth::user() ? '/new_ads' : '/login'}}" class="btn btn-default btn-lg" style="width: 150px; text-align: center; margin-top: 15px; border-radius: 5px; font-size: 20px; font-family: 'Segoe UI'; color: darkgreen; font-weight: bold">+ أضف إعلانك</a>
        </div>
        <div class="col-md-4 col-xs-5 col-xs-offset-1">
            <form action="{{ route('search.goods') }}" method="post" role="search" class="searchbox example" style="margin-top: 15px">
                @csrf
                <button type="submit" style="border-radius: 5px 0 0 5px"><i class="fa fa-search" style="color: lightgrey"></i></button>
                <input type="text" name="q" placeholder="...ابحث عن سلعة" style="border-radius: 0 5px 5px 0">
            </form>
        </div>
        <div class="col-md-3 col-md-offset-1 col-xs-5" style="margin-top: 18px">
            <a id="navbarDropdown" class="dropdown-toggle pull-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
               style="height: 42px; width: 100%; padding-left: 30%; font-weight: bold; color: #A9A9A9; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-decoration: none">
                <span class="caret"></span>&nbsp;إختر المنطقة&nbsp;
            </a>
            <div class="dropdown-menu styleSelect" aria-labelledby="navbarDropdown">
                @foreach($regions as $region)
                    <a class="dropdown-item pull-right" href="/region/{{$region->english_name}}">{{$region->arabic_name}}&nbsp;</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 35px">
        <div class="row">
            @if (session('alert'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                    <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                </div>
            @endif
            <div class="col-md-7 col-md-offset-1 col-xs-12" style="margin-top: 60px; margin-bottom: 50px">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        @if($post->id%2 == 0)
                            <div class="row" style="width: 100%; height: 10%; text-align: right; background-color: #F5FFFA; border: 1px solid lightgrey; border-style: none none solid none">
                                <div class="col-md-2 col-xs-3">
                                    @foreach($images as $image)
                                        @if($image->post_id == $post->id)
                                            <img src="{{secure_asset('/images/posts/'.$image->name)}}" style="width: 100%; height: 110px">
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1">
                                    <a href="/one_product/{{$post->id}}" style="color: black; margin-right: 10px; font-size: 22px; font-weight: bold">{{$post->title}}</a>
                                </div>
                                <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1" style="margin-top: 15px">
                                    <p style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold" class="pull-left">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></p>
                                </div>
                                <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1">
                                    @foreach($users as $user)
                                        @if($post->user_id == $user->id)
                                            <p>
                                                <span class="pull-left"><a href="/user/profile/{{$user->id}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold"><i class="fa fa-user"></i>{{$user->name}}</a></span>
                                                @foreach($countries as $country)
                                                    @if($country->english_name == $post->region || $country->arabic_name == $post->region)
                                                        <a href="/region/{{$country->english_name}}" style="color: lightgrey; font-size: 14px; font-weight: bold" class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$country->arabic_name}}</a>
                                                    @endif
                                                @endforeach
                                            </p>
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="row" style="width: 100%; height: 10%; text-align: right; border: 1px solid lightgrey; border-style: none none solid none">
                                <div class="col-md-2 col-xs-3">
                                    @foreach($images as $image)
                                        @if($image->post_id == $post->id)
                                            <img src="{{secure_asset('/images/posts/'.$image->name)}}" style="width: 100%; height: 110px">
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1">
                                    <a href="/one_product/{{$post->id}}" style="color: black; margin-right: 10px; font-size: 22px; font-weight: bold">{{$post->title}}</a>
                                </div>
                                <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1" style="margin-top: 15px">
                                    <p style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold" class="pull-left">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></p>
                                </div>
                                <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-1">
                                    @foreach($users as $user)
                                        @if($post->user_id == $user->id)
                                            <p>
                                                <span class="pull-left"><a href="/user/profile/{{$user->id}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold"><i class="fa fa-user"></i>{{$user->name}}</a></span>
                                                @foreach($countries as $country)
                                                    @if($country->english_name == $post->region || $country->arabic_name == $post->region)
                                                        <a href="/region/{{$country->english_name}}" style="color: lightgrey; font-size: 14px; font-weight: bold" class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$country->arabic_name}}</a>
                                                    @endif
                                                @endforeach
                                            </p>
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{--<a href="#" class="btn btn-default btn-lg pull-right" style="margin-top: 10px; margin-right: 15px; color: #5cb85c; border-color: #5cb85c">مشاهدة المزيد</a>--}}
                @else
                    <h3 style="text-align: center; color: darkorange; margin-bottom: 15%">لا توجد منشورات</h3>
                @endif
                <span class="pull-right" style="margin-right: 50px; margin-top: 20px">
                    {{$posts->links()}}
                </span>
            </div>
            <div class="col-md-3 col-xs-12" style="margin-top: 15px">
                <hr>
                <div class="row">
                    @foreach($posts as $post)
                        @foreach($images as $image)
                            @if($image->post_id == $post->id)
                                <div class="col-md-4 col-xs-4" style="margin-top: 5px; margin-bottom: 5px">
                                    <a href="/one_product/{{$post->id}}"><img src="{{secure_asset('/images/posts/'.$image->name)}}" class="img-thumbnail" style="width: 100%; height: 70px; border: 1px solid lightgrey"></a>
                                </div>
                                @break
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection