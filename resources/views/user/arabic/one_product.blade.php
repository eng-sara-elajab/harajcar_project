@extends('layouts.user_arabic')

@section('content')
    <div style="background-color: #F0F8FF">
        <div class="container-fluid row">
            <hr>
            <div class="col-md-3 offset-md-1 col-4 offset-1">
                <p style="font-family: 'Segoe UI'; color: #0275d8; text-align: right; font-size: 20px; margin-bottom: 20px">إعلانات مشابهة</p>
            </div>
            <div class="col-md-7 col-md-offset-1 col-2 offset-xs-4">
                <p style="text-align: right; margin-right: 20px; margin-bottom: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
            </div>
            @if (session('alert'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                    <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row">
                <div class="col-xl-3 col-xl-offset-1 col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-10 col-sm-offset-1 col-10 col-offset-1" style="margin-bottom: 30px">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            @if(count($posts) > 0)
                                @foreach($posts as $one_post)
                                    @foreach($all_images as $all_image)
                                        @if($all_image->post_id == $one_post->id)
                                            <a href="/one_product/{{$one_post->id}}">
												@if($all_image->name == "Mercedes Benz")
													<img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2019-mercedes-benz-a220-4matic-108-1544471119.jpg?crop=0.675xw:0.505xh;0.0442xw,0.464xh&resize=1200:*" style="width: 32%; height: 80px; margin-top: 3px">
												@elseif($all_image->name == "LandCruiser LC300")
													<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUZSQ__k41jJTEXJcWn7C1q4xfGASKs_YnuQ&usqp=CAU" style="width: 32%; height: 80px; margin-top: 3px">
												@elseif($all_image->name == "Toyota FJ Cruiser")
													<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIGP1I_XpnRUzx1zFB9DW7W1rwtFAccMh_sw&usqp=CAU" style="width: 32%; height: 80px; margin-top: 3px">
												@elseif($all_image->name == "BMW")
													<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzknhw9QV2pZSN7e2SEbfCWHxcMhsWOAknyQ&usqp=CAU" style="width: 32%; height: 80px; margin-top: 3px">
												@elseif($all_image->name == "Isuzu D-Max V-Cross")
													<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiFnZBnY2RdaEV0gWkrOO5S8GaOrrGPs9kyw&usqp=CAU" style="width: 32%; height: 80px; margin-top: 3px">
												@elseif($all_image->name == "Rolls-Royce")
													<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl34jmptlNxx2HYq5qIxQ3gbYtCon-hCB4pg&usqp=CAU" style="width: 32%; height: 80px; margin-top: 3px">
												@else
													<img src="{{asset('/images/posts/'.$all_image->name)}}" style="width: 32%; height: 80px; margin-top: 3px">
												@endif
											</a>
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                            @else
                                <br><br><a style="margin-left: 30%; font-size: 18px; color: darkgray; text-decoration: none; display: block">لا توجد اعلانات مشابهة</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xl-offset-1 col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1 col-10 col-offset-1">
                    <div style="background-color: white; border-radius: 25px">
                        <div style="height: 1px"></div>
                        <div style="width: 98%; background-color: #FFFAF0; border-radius: 25px; height: 150px; margin-left: 1%; margin-top: 1%"><br>
                            <p class="pull-right" style="color: #3CB371; margin-right: 15px; font-size: 18px; font-weight: bold; font-family: 'Segoe UI'">{{$post->title}}</p><br><br>
                            <div class="row">
                                <div class="col-md-6 col-xs-6" style="margin-top: 10px">
                                    <a href="/region/{region}" class="pull-right" style="font-size: 14px; font-family: 'Segoe UI'; color: #5cb85c">{{$post->region}}&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-md-6 col-xs-5" style="margin-top: 10px">
                                    <a href="/user/profile/{{$user->id}}" class="pull-right" style="font-size: 14px; margin-right: 10px">{{$user->name}}&nbsp;<i class="fa fa-h-square" style="color: darkgrey" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-md-6 col-xs-6" style="margin-top: 10px">
                                    <a class="pull-right" style="font-size: 14px; color: #5cb85c; font-family: 'Segoe UI'; text-decoration: none">{{$user->no_of_likes}}&nbsp;تقييم إيجابي&nbsp;<i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-md-6 col-xs-5" style="margin-top: 10px">
                                    <p class="pull-right" style="font-size: 14px; color: #696969; font-family: 'Segoe UI'; margin-right: 10px">{{$post->created_at->diffForHumans()}}&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></p>
                                </div>
                            </div>
                        </div><br><br>
                        <p style="text-align: right; font-family: 'Segoe UI'; font-size: 18px; font-weight: bold; color: #696969; margin: 7px">{{$post->body}}</p>
						@foreach($images as $image)
							@if($image->name == "Mercedes Benz")
								<img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2019-mercedes-benz-a220-4matic-108-1544471119.jpg?crop=0.675xw:0.505xh;0.0442xw,0.464xh&resize=1200:*" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoLaOPEXBIGlwmisAhL1er7mYjsZFrMNWY8w&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwbCLzadCJ6a4KmMjJ1fjNWiqd0heEo_OgEQ&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								@break
							@elseif($image->name == "LandCruiser LC300")
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUZSQ__k41jJTEXJcWn7C1q4xfGASKs_YnuQ&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTo-O5pf_GkJP822_qXIdEmvmSfeW_IwxCDpw&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwKyj1FkL1CYHwjaSmwWE_t7l67mkPTF8Icw&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								@break
							@elseif($image->name == "Toyota FJ Cruiser")
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIGP1I_XpnRUzx1zFB9DW7W1rwtFAccMh_sw&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBD3XwMX3WraGHDXC53coQoAyLnB4_LaRB-A&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3fHL3sNVcoVOR-XPMMjkIQ5IYIo9iy3wo7Q&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								@break
							@elseif($image->name == "BMW")
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzknhw9QV2pZSN7e2SEbfCWHxcMhsWOAknyQ&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiQjQRLG7_qIITdMkFNJusozs1OXl5jrAcww&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwEGmhmTc_Vm3EqyNFQnKwHXP3nEuNemgaPg&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								@break
							@elseif($image->name == "Isuzu D-Max V-Cross")
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiFnZBnY2RdaEV0gWkrOO5S8GaOrrGPs9kyw&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwMIRxwQA8R5nuN1QwZY4sHHvxOt9qrTTp6A&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtYVdBwegoSqPTeZhYFQHLV7rtC8J7nyyBig&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								@break
							@elseif($image->name == "Rolls-Royce")
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl34jmptlNxx2HYq5qIxQ3gbYtCon-hCB4pg&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzaPnu-uLFqUH2guvM2z0oaUsZAgk9Nhy09w&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-noVuk7keDB7GK77Q-jJRtFud9zuhDRsNMA&usqp=CAU" style="height: 350px; width: 96%; margin-left: 2%"><br>
								@break
							@else
								<img src="{{asset('/images/posts/'.$image->name)}}" style="height: 350px; width: 96%; margin-left: 2%"><br>
							@endif
                        @endforeach
                        <a href="tel://{{$post->phone}}" class="btn btn-default btn-lg pull-right" style="margin-top: 20px; margin-right: 2%; color: green; border-radius: 15px">{{$post->phone}}&nbsp;&nbsp;<i class="fa fa-phone circle-icon" style="color: #0275d8" aria-hidden="true"></i></a>
                        <br><br><br><br><br><br>
                        <a href="/one_product/{{($post->id)+1}}" class="btn btn-default pull-left next-page"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;الإعلان التالي</a>
                        <p class="btn-default pull-right next-page" style="font-size: 20px; text-align: center">{{$post->ads_no}}</p>
                    </div><br><br><br><br>
                    <div class="btn-group btn-group-justified" style="height: 60px">
                        @if(Auth::user())
                            <a href="{{count($reported_elements) >= 50 ? '#' : '/post/report/'.$post->id.'/'.$user->id}}" title="{{count($reported_elements) >= 50 ? "لا يمكنك التبليغ أكثر" : ''}}" class="btn btn-default select-action" style="border-radius: 10px 0 0 10px; border-left: 1px; border-top: 1px; border-bottom: 1px; border-left: 1px">إبلاغ&nbsp;&nbsp;<i class="fa fa-flag" aria-hidden="true"></i></a>
                        @endif
                        {{--<a href="#" class="btn btn-default select-action" style=" border-left: 1px; border-top: 1px; border-bottom: 1px; border-left: 1px">محادثة واتساب&nbsp;&nbsp;<i class="fa fa-whatsapp" aria-hidden="true"></i></a>--}}
                        <a class="btn btn-default select-action" data-toggle="modal" data-target="#myShareModal" id="open" style=" border-left: 1px; border-top: 1px; border-bottom: 1px; border-left: 1px">مشاركة&nbsp;&nbsp;<i class="fa fa-share-alt" aria-hidden="true"></i></a>
                        @if($favourite != null)
                            <a href="{{count($favourite) == 0 ? '/user/add_to_favourite/'.$post->id : '/user/remove_from_favourite/'.$post->id }}" class="btn btn-default select-action" style=" border-left: 1px; border-top: 1px; border-bottom: 1px; border-left: 1px">{{count($favourite) == 0 ? 'تفضيل' : 'إلغاء التفضيل' }}&nbsp;&nbsp;<i class="fa fa-heart" aria-hidden="true"></i></a>
                        @else
                            <a href="/login" class="btn btn-default select-action" style=" border-left: 1px; border-top: 1px; border-bottom: 1px; border-left: 1px">تفضيل&nbsp;&nbsp;<i class="fa fa-heart" aria-hidden="true"></i></a>
                        @endif
                        <a class="btn btn-default select-action" data-toggle="modal" data-target="#myModal" id="open" style="border-radius: 0 10px 10px 0; border-left: 1px; border-top: 1px; border-bottom: 1px; border-right: 1px">مراسلة&nbsp;&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-5 col-xs-10 col-xs-offset-2"><br>
                </div>
                @if(count($comments) > 0)
                    <div class="col-md-6 col-md-offset-5 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 10px; height: auto; margin-top: 20px"><br>
                        <br><h3 style="font-family: 'Segoe UI'; color: darkgrey; text-align: right">التعليقات</h3>
                        @foreach($comments as $comment)
                            @foreach($users as $user)
                                @if($comment->user_id == $user->id && $comment->post_id == $post->id)
                                    <div style="width: 98%; margin-left: 1%">
                                        <i class="fa fa-user pull-right rounded-icon" style="color: darkgrey" aria-hidden="true"></i>
                                        <a class="pull-right" href="/user/profile/{{$user->id}}" style="font-family: 'Segoe UI'">&nbsp;{{$user->name}}&nbsp;</a>
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
                                                            <a class="pull-right" href="/user/profile/{{$user->id}}" style="font-family: 'Segoe UI'">&nbsp;{{$user->name}}&nbsp;</a>
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
                                        <form action="/new_reply/{{$post->id}}/{{$comment->id}}" method="post" class="row">
                                            @csrf
                                            <button type="submit" class="btn btn-default col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1" style="background-color: #5cb85c; font-size: 18px; color: white; border-radius: 5px; height: 35px; width: 50px"><span style="margin-top: 2px"><span class="iconify" data-icon="fa-brands:telegram-plane" data-inline="false" style="margin-top: 2px"></span></span><span style="margin-top: 2px"></span></button>
                                            <textarea class="col-md-8 col-xs-8 placeholder-styling" name="body" style="background-color: white; height: 35px; border-radius: 5px; text-align: right" placeholder="أكتب ردك هنا" required></textarea>
                                        </form>
                                        <hr style="width: 100%; margin-top: 12%">
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                @endif
                <div class="col-md-6 col-md-offset-5 col-xs-10 col-xs-offset-1" style="border-radius: 10px; height: auto; margin-top: 12px">
                    <a class="btn btn-default pull-left next-page" style="margin-top: 20px; color: #5cb85c; border-radius: 15px; height: 45px; width: 140px; font-size: 17px; font-family: 'Segoe UI'; background-color: lightgrey; border: none"><i class="fa fa-rss" aria-hidden="true"></i>&nbsp;متابعة الردود</a>
                </div>

                <form action="/new_comment/{{$post->id}}" method="post">
                    @csrf
                    <textarea class="col-md-6 col-md-offset-5 col-xs-10 col-xs-offset-1 placeholder-styling" name="body" style="background-color: white; border-radius: 10px; height: 180px; border: none; margin-top: 20px; text-align: right" placeholder="أكتب سؤالك للمعلن هنا" required></textarea>
                    <button type="submit" class="btn btn-default pull-right next-page" style="margin-right: 9%; margin-bottom: 60px; background-color: #5cb85c; font-size: 18px; color: white; border-radius: 15px; height: 45px; width: 140px; margin-top: 15px"><span style="margin-top: 2px"><span class="iconify" data-icon="fa-brands:telegram-plane" data-inline="false" style="margin-top: 2px"></span></span><span style="margin-top: 2px">&nbsp;إرسال</span></button>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @foreach($users as $user)
                        @if($user->id == $post->user_id)
                            <p class="modal-title" style="font-size: 12px; text-align: center; font-family: 'Segoe UI'; color: darkgray">رسالة سريعة إلى</p>
                            <p style="font-size: 18px; font-weight: bold; color: black; text-align: center">عضو رقم {{$user->id}}</p>
                        @endif
                    @endforeach
                </div>
                @if(Auth::user())
                <form method="post" action="/chat/create/{{Auth::user()->id}}/{{$post->user_id}}" id="form">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
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
                @else
                    <form method="get" action="/login" id="form">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
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
                @endif
            </div>
        </div>
    </div>
    <!-- Share Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="myShareModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @foreach($users as $user)
                        @if($user->id == $post->user_id)
                            <p class="modal-title" style="font-size: 12px; text-align: center; font-family: 'Segoe UI'; color: darkgray">رابط المشاركة</p>
                        @endif
                    @endforeach
                </div>
                <form method="post" action="{{Auth::user() ? '/chat/create/'.Auth::user()->id/$post->user_id : '/login'}}" id="form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                @csrf
                                <label for="Name" class="pull-right">انسخ الرابط لمشاركة المنشور</label>
                                <textarea class="form-control input-field" name="body" id="body" style="height: 50px; font-size: 18px; color: #0275d8; text-align: left">{{url('/one_product/'.$post->id)}}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection