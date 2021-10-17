@extends('layouts.admin_english')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 row" style="background-color: white; margin-bottom: 5%">
            @if(count($license_requests) > 0)
                @foreach($license_requests as $license_request)
                    <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-5 col-sm-5 col-12" style="margin-bottom: 20px"><br>
                        <a data-toggle="modal" data-target="#myModal" data-mybill="{{asset('images/documentation/'.$license_request->document_img)}}" id="open"><img src="{{asset('images/documentation/'.$license_request->document_img)}}" style="height: 250px; width: 100%" title="اضغط للعرض"></a>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-7 col-sm-7 col-12" style="margin-bottom: 20px"><br><br>
                        @foreach($users as $user)
                            @if($user->id == $license_request->user_id)
                                <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$user->name}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: إسم المستخدم</span></p>
                            @endif
                        @endforeach
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$license_request->document_no}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: رقم الوثيقة</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">
                            @if($license_request->status == 'read')
                                {{ __('قيد الانتظار') }}
                            @elseif($license_request->status == 'documented')
                                {{ __('تم التوثيق') }}
                            @elseif($license_request->status == 'rejected')
                                {{ __('تم الرفض') }}
                            @endif
                            <span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: الحالة</span>
                        </p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$license_request->notes == null ? 'لا توجد' : $license_request->notes}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: ملاحظات</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-bottom: 10%"></p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row">
                        <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-5 offset-1">
                            @foreach($users as $user)
                                @if($user->id == $license_request->user_id)
                                    <a data-toggle="modal" data-target="#rejectModal" data-myid="{{$license_request->user_id}}" id="open" class="btn btn-default btn-block" style="color: darkgrey; text-align: center; font-family: 'Segoe UI'; font-size: 18px; margin-top: 20px">رفض</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                            @foreach($users as $user)
                                @if($user->id == $license_request->user_id)
                                    <a href="{{$user->documentation_status == 1 ? '#' : '/admin/document_user/'.$license_request->id}}" class="btn btn-primary btn-block" style="color: white; text-align: center; font-family: 'Segoe UI'; font-size: 18px; margin-top: 20px">{{$user->documentation_status == 1 ? 'تم التوثيق مسبقاً' : 'توثيق'}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <hr style="color: black; opacity: 0.7">
                    </div>
                @endforeach
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3 style="color: darkorange; text-align: center">لا توجد طلبات توثيق جديدة</h3>
                </div>
            @endif
            @if(count($all_licenses) > 0)
                <table class="table table-responsive" style="margin-top: 15px; text-align: center">
                    <tr style="font-size: 20px; font-weight: bold; text-align: center">
                        <th style="border:1px solid black; border-collapse:collapse">الغاء التوثيق</th>
                        <th style="border:1px solid black; border-collapse:collapse">صورة الوثيقة</th>
                        <th style="border:1px solid black; border-collapse:collapse">الحالة</th>
                        <th style="border:1px solid black; border-collapse:collapse">الملاحظات</th>
                        <th style="border:1px solid black; border-collapse:collapse">رقم الوثيقة</th>
                        <th style="border:1px solid black; border-collapse:collapse">إسم المستخدم</th>
                    </tr>
                    @foreach($all_licenses as $license)
                        <tr style="text-align: center">
                            <td>
                                @if($license->status !== 'canceled')
                                    <a href="/admin/cancel_documentation/{{$license->id}}" style="color: darkorange"><i class="fa fa-minus-circle"></i></a>
                                @else
                                    <a style="color: lightgrey"><i class="fa fa-ban"></i></a>
                                @endif
                            </td>
                            <td><a data-toggle="modal" data-target="#myModal" data-mybill="{{asset('images/documentation/'.$license->document_img)}}" id="open"><img src="{{asset('images/documentation/'.$license->document_img)}}" style="height: 60px; width: 60px" title="اضغط للعرض"></a></td>
                            <td>
                                @if($license->status == 'read')
                                    {{ __('قيد الانتظار') }}
                                @elseif($license->status == 'documented')
                                    {{ __('تم التوثيق') }}
                                @elseif($license->status == 'rejected')
                                    {{ __('تم الرفض') }}
                                @elseif($license->status == 'canceled')
                                    {{ __('تم الالغاء') }}
                                @endif
                            </td>
                            <td>{{$license->notes == null ? 'لا توجد ملاحظات' : $license->notes}}</td>
                            <td>{{$license->document_no}}</td>
                            @foreach($users as $user)
                                @if($user->id == $license->user_id)
                                    <td>{{$user->name}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            {{$all_licenses->links()}}
        @endif
        <!-- Modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
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
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <img src="bill" style="width: 100%; height: 400px">
                                    {{--<input id="bill">--}}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
            <!-- Reject Modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="rejectModal">
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
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <form method="post" action="/admin/reject_license">
                                        @csrf
                                        <label for="body" class="pull-right">: سبب الرفض</label>
                                        <textarea class="form-control input-field" name="body" id="body" style="height: 150px" placeholder="أكتب رسالتك هنا"></textarea>
                                        <input type="hidden" id="id" name="id">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                        <button type="submit" class="btn btn-success">إرسال</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection