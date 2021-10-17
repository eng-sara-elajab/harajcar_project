@extends('layouts.admin_arabic')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1">
                    @if (session('alert'))
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                            <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                        </div>
                    @endif
                    @if(count($contacts) > 0)
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: white; height: auto"><br>
                            @foreach($contacts as $contact)
                                <div class="message_hover row">
                                    <a data-toggle="modal" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-target="#contactModal" data-myid="{{$contact->id}}" data-mybody="{{$contact->body}}" data-myemail="{{$contact->email}}" data-myphone="{{$contact->phone}}" data-myillustration="{{asset('illustrations/'.$contact->illustration)}}" id="open">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: darkgrey; margin-right: 20px">{{strlen($contact->body) > 50 ? '...'.substr($contact->body, 0, 50) : $contact->body}}</p>
                                        </div>
                                        {{--<p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: darkgrey; margin-right: 10px">{{$contact->body}}</p>--}}
                                        @if($contact->illustration != null && str_contains($contact->illustration, 'mp4'))
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <video style="width: 90%; height: 250px; margin-left: 5%" controls>
                                                    <source src="{{asset('illustrations/'.$contact->illustration)}}" type="video/mp4">
                                                </video><br><br>
                                            </div>
                                        @elseif($contact->illustration != null && (str_contains($contact->illustration, 'jpg') ||  str_contains($contact->illustration, 'jpeg') ||  str_contains($contact->illustration, 'png')))
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <img src="{{asset('illustrations/'.$contact->illustration)}}" style="width: 90%; height: 250px; margin-left: 5%"><br><br>
                                            </div>
                                        @endif
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <span style="opacity: 0.7"><a href="tel://{{$contact->phone}}" style="font-size: 13px">{{$contact->phone}}</a><span style="font-size: 13px"> : رقم الهاتف</span></span>
                                        </div>
                                        <div class="col-xl-6 offset-xl-2 col-lg-6 offset-lg-2 col-md-12 col-sm-12 col-12">
                                            <span class="pull-right" style="font-size: 13px; opacity: 0.7"><a href="https://accounts.google.com/AccountChooser/signinchooser?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&flowName=GlifWebSignIn&flowEntry=AccountChooser" target="_blank">{{$contact->email}}</a> : البريد الالكتروني</span><br>
                                        </div>
                                    </a>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><hr></div>
                                </div>
                            @endforeach
                            {{$contacts->links()}}
                        </div>
                    @else
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 style="color: darkorange; text-align: center">لا توجد رسائل حتى الآن</h3>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Contact Modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="contactModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="height: auto; min-height: 150px">
                                    <textarea id="body" style="height: 100%; width: 100%; border: none; text-align: right" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection