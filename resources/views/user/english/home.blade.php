@extends('layouts.user_english')

@section('content')
    <div class="row">
        <div class="col-md-1 col-md-offset-1 col-xs-11 col-xs-offset-1">
            <a href="{{Auth::user() ? '/new_ads' : '/login'}}" class="btn btn-default btn-lg" style="width: 165px; text-align: center; margin-top: 15px; border-radius: 5px 0 0 5px; font-size: 18px; font-family: 'Segoe UI'; color: darkgreen; font-weight: bold">+ Add Your Post</a>
        </div>
        <div class="col-md-4 col-xs-8 col-xs-offset-2">
            <form action="{{ route('search.goods') }}" method="post" role="search" class="searchbox example" style="margin-top: 15px">
                @csrf
                <button type="submit" style="border-radius: 5px 0 0 5px"><i class="fa fa-search" style="color: lightgrey"></i></button>
                <input type="text" name="q" placeholder="Search for goods" style="border-radius: 0 5px 5px 0">
            </form>
        </div>
        <div class="col-md-3 col-md-offset-1 col-xs-10 col-xs-offset-1" style="margin-top: 18px">
            <a id="navbarDropdown" class="dropdown-toggle pull-left" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
               style="padding-left: 10%; width: 100%; height: 42px; font-weight: bold; color: #A9A9A9; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-decoration: none">
                &nbsp;Select Region&nbsp;<span class="caret"></span>
            </a>
            <div class="dropdown-menu styleSelect" aria-labelledby="navbarDropdown">
                @foreach($regions as $region)
                    <a class="dropdown-item pull-left" href="/region/{{$region->english_name}}">{{$region->english_name}}&nbsp;</a>
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
                            <div class="row" style="width: 100%; height: 10%; text-align: left; background-color: #F5FFFA; border: 1px solid lightgrey; border-style: none none solid none">
                                <div class="col-md-2 col-xs-3">
                                    @foreach($images as $image)
                                        @if($image->post_id == $post->id)
                                            @if($image->name == "Mercedes Benz")
												<img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2019-mercedes-benz-a220-4matic-108-1544471119.jpg?crop=0.675xw:0.505xh;0.0442xw,0.464xh&resize=1200:*" style="width: 100%; height: 110px">
											@elseif($image->name == "LandCruiser LC300")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUZSQ__k41jJTEXJcWn7C1q4xfGASKs_YnuQ&usqp=CAU" style="width: 100%; height: 110px">												
											@elseif($image->name == "Toyota FJ Cruiser")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIGP1I_XpnRUzx1zFB9DW7W1rwtFAccMh_sw&usqp=CAU" style="width: 100%; height: 110px">												
											@elseif($image->name == "BMW")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzknhw9QV2pZSN7e2SEbfCWHxcMhsWOAknyQ&usqp=CAU" style="width: 100%; height: 110px">												
											@elseif($image->name == "Isuzu D-Max V-Cross")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiFnZBnY2RdaEV0gWkrOO5S8GaOrrGPs9kyw&usqp=CAU" style="width: 100%; height: 110px">												
											@elseif($image->name == "Rolls-Royce")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl34jmptlNxx2HYq5qIxQ3gbYtCon-hCB4pg&usqp=CAU" style="width: 100%; height: 110px">												
											@else
												<img src="{{asset('/images/posts/'.$image->name)}}" style="width: 100%; height: 110px">
											@endif
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-8 col-md-offset-1 col-xs-8 col-xs-offset-1" style="margin-top: 10px; margin-bottom: 10px">
                                    <a href="/one_product/{{$post->id}}" style="color: black; font-size: 22px; font-weight: bold; margin-left: 0">{{$post->title}}</a>
                                </div>
                                <div class="col-md-8 col-md-offset-1 col-xs-8 col-xs-offset-1">
                                    <p style="color: lightgrey; font-size: 14px; font-weight: bold" class="pull-left"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                                </div>
                                <div class="col-md-8 col-md-offset-1 col-xs-8 col-xs-offset-1">
                                    @foreach($users as $user)
                                        @if($post->user_id == $user->id)
                                            <p>
                                                <span class="pull-left"><a href="/user/profile/{{$user->id}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold"><i class="fa fa-user"></i>{{$user->name}}</a></span>
                                                @foreach($countries as $country)
                                                    @if($country->english_name == $post->region || $country->arabic_name == $post->region)
                                                        <a href="/region/{{$country->english_name}}" style="color: lightgrey; font-size: 14px; font-weight: bold" class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$country->english_name}}</a>
                                                    @endif
                                                @endforeach
                                            </p>
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="row" style="width: 100%; height: 10%; text-align: left; border: 1px solid lightgrey; border-style: none none solid none">
                                <div class="col-md-2 col-xs-3">
                                    @foreach($images as $image)
                                        @if($image->post_id == $post->id)
											@if($image->name == "Mercedes Benz")
												<img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2019-mercedes-benz-a220-4matic-108-1544471119.jpg?crop=0.675xw:0.505xh;0.0442xw,0.464xh&resize=1200:*" style="width: 100%; height: 110px">
											@elseif($image->name == "LandCruiser LC300")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUZSQ__k41jJTEXJcWn7C1q4xfGASKs_YnuQ&usqp=CAU" style="width: 100%; height: 110px">												
											@elseif($image->name == "Toyota FJ Cruiser")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIGP1I_XpnRUzx1zFB9DW7W1rwtFAccMh_sw&usqp=CAU" style="width: 100%; height: 110px">												
											@elseif($image->name == "BMW")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzknhw9QV2pZSN7e2SEbfCWHxcMhsWOAknyQ&usqp=CAU" style="width: 100%; height: 110px">												
											@elseif($image->name == "Isuzu D-Max V-Cross")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiFnZBnY2RdaEV0gWkrOO5S8GaOrrGPs9kyw&usqp=CAU" style="width: 100%; height: 110px">												
											@elseif($image->name == "Rolls-Royce")
												<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl34jmptlNxx2HYq5qIxQ3gbYtCon-hCB4pg&usqp=CAU" style="width: 100%; height: 110px">												
											@else
												<img src="{{asset('/images/posts/'.$image->name)}}" style="width: 100%; height: 110px">
											@endif
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-8 col-md-offset-1 col-xs-8 col-xs-offset-1" style="margin-top: 10px; margin-bottom: 10px">
                                    <a href="/one_product/{{$post->id}}" style="color: black; font-size: 22px; font-weight: bold; margin-left: 0">{{$post->title}}</a>
                                </div>
                                <div class="col-md-8 col-md-offset-1 col-xs-8 col-xs-offset-1">
                                    <p style="color: lightgrey; font-size: 14px; font-weight: bold" class="pull-left"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                                </div>
                                <div class="col-md-8 col-md-offset-1 col-xs-8 col-xs-offset-1">
                                    @foreach($users as $user)
                                        @if($post->user_id == $user->id)
                                            <p>
                                                <span class="pull-left"><a href="/user/profile/{{$user->id}}" style="color: lightgrey; font-size: 14px; margin-right: 5px; font-weight: bold"><i class="fa fa-user"></i>{{$user->name}}</a></span>
                                                @foreach($countries as $country)
                                                    @if($country->english_name == $post->region || $country->arabic_name == $post->region)
                                                        <a href="/region/{{$country->english_name}}" style="color: lightgrey; font-size: 14px; font-weight: bold" class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$country->english_name}}</a>
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
                    {{--<a href="#" class="btn btn-default btn-lg pull-right" style="margin-top: 10px; margin-right: 15px; color: #5cb85c; border-color: #5cb85c">Load more...</a>--}}
                @else
                    <h3 style="text-align: center; color: darkorange; margin-bottom: 15%">No posts</h3>
                @endif
                <span class="pull-left" style="margin-left: 50px; margin-top: 20px">
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
                                    <a href="/one_product/{{$post->id}}">
										@if($image->name == "Mercedes Benz")
											<img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2019-mercedes-benz-a220-4matic-108-1544471119.jpg?crop=0.675xw:0.505xh;0.0442xw,0.464xh&resize=1200:*" class="img-thumbnail" style="width: 100%; height: 70px; border: 1px solid lightgrey">
										@elseif($image->name == "LandCruiser LC300")
											<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUZSQ__k41jJTEXJcWn7C1q4xfGASKs_YnuQ&usqp=CAU" class="img-thumbnail" style="width: 100%; height: 70px; border: 1px solid lightgrey">
										@elseif($image->name == "Toyota FJ Cruiser")
											<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIGP1I_XpnRUzx1zFB9DW7W1rwtFAccMh_sw&usqp=CAU" class="img-thumbnail" style="width: 100%; height: 70px; border: 1px solid lightgrey">
										@elseif($image->name == "BMW")
											<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzknhw9QV2pZSN7e2SEbfCWHxcMhsWOAknyQ&usqp=CAU" class="img-thumbnail" style="width: 100%; height: 70px; border: 1px solid lightgrey">
										@elseif($image->name == "Isuzu D-Max V-Cross")
											<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiFnZBnY2RdaEV0gWkrOO5S8GaOrrGPs9kyw&usqp=CAU" class="img-thumbnail" style="width: 100%; height: 70px; border: 1px solid lightgrey">
										@elseif($image->name == "Rolls-Royce")
											<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl34jmptlNxx2HYq5qIxQ3gbYtCon-hCB4pg&usqp=CAU" class="img-thumbnail" style="width: 100%; height: 70px; border: 1px solid lightgrey">
										@else
											<img src="{{asset('/images/posts/'.$image->name)}}" class="img-thumbnail" style="width: 100%; height: 70px; border: 1px solid lightgrey">
										@endif
									</a>
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