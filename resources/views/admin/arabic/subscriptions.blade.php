@extends('layouts.admin_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 row" style="background-color: white; margin-bottom: 5%">
            @if(count($read_subscription_requests) > 0)
                @foreach($read_subscription_requests as $read_subscription_request)
                    <div class="col-xl-4 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-12"><br>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$read_subscription_request->phone}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: رقم الهاتف</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px"><span class="pull-right" style="color: #24a0ed">زمن التحويل :</span>&nbsp;&nbsp;{{$read_subscription_request->transformation_time}}</p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px"><span class="pull-right" style="color: #24a0ed" class="pull-right">اسم المحول :</span>&nbsp;&nbsp;{{$read_subscription_request->transformer_name}}</p>
                    </div>
                    <div class="col-xl-4 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-xs-12"><br>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">
                            @foreach($users as $user)
                                @if($user->id == $read_subscription_request->user_id)
                                     {{$user->name}}
                                @endif
                            @endforeach
                            <span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: إسم المستخدم</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$read_subscription_request->money_amount}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: المبلغ المدفوع بالريال</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px"><span class="pull-right" style="color: #24a0ed">البنك المحول :</span>&nbsp;&nbsp;{{$read_subscription_request->bank_name}}</p>
                    </div>
                    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom: 20px">
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right"><span class="pull-right" style="color: #24a0ed">ملاحظات :</span>&nbsp;&nbsp;{{$read_subscription_request->notes == null ? 'لا توجد' : $read_subscription_request->notes}}</p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row">
                        <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-5 offset-1">
                            @foreach($users as $user)
                                @if($user->id == $read_subscription_request->user_id)
                                    <a data-toggle="modal" data-target="#rejectModal" data-myid="{{$read_subscription_request->id}}" id="open" class="btn btn-default btn-block" style="color: darkgrey; text-align: center; font-family: 'Segoe UI'; font-size: 18px; margin-top: 20px">رفض</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                            @foreach($users as $user)
                                @if($user->id == $read_subscription_request->user_id)
                                    <a href="{{$user->membership_status == 0 ? '/admin/accept_membership_request/'.$read_subscription_request->id : '#'}}" class="btn btn-primary btn-block" style="color: white; text-align: center; font-family: 'Segoe UI'; font-size: 18px; margin-top: 20px">{{$user->membership_status == 1 ? 'تم الاشتراك مسبقاً' : 'قبول'}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><hr style="color: black; opacity: 0.7"></div>
                @endforeach
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3 style="color: darkorange; text-align: center">لا توجد طلبات اشتراك جديدة</h3>
                </div>
            @endif
            @if(count($all_subscriptions) > 0)
                <table class="table table-bordered table-responsive" style="margin-top: 15px; text-align: center">
                    <tr style="font-size: 20px; font-weight: bold; border:1px solid black;border-collapse:collapse; text-align: center">
                        <th>الحالة</th>
                        <th>الملاحظات</th>
                        <th>اسم المحول</th>
                        <th>زمن التحويل</th>
                        <th>المبلغ المدفوع بالريال</th>
                        <th>رقم الهاتف</th>
                        <th>اسم البنك</th>
                        <th>إسم المستخدم</th>
                    </tr>
                    @foreach($all_subscriptions as $subscription)
                        <tr style="text-align: center">
                            @if($subscription->status == 'read')
                                <td>قيد الانتظار</td>
                            @elseif($subscription->status == 'canceled')
                                <td>تم الرفض</td>
                            @elseif($subscription->status == 'accepted')
                                <td>تم الاستلام</td>
                            @endif
                            <td>{{$subscription->notes == null ? 'لا توجد ملاحظات' : $commission->notes}}</td>
                            <td>{{$subscription->transformer_name}}</td>
                            <td>{{$subscription->transformation_time}}</td>
                            <td>{{$subscription->money_amount}}</td>
                            <td>{{$subscription->phone}}</td>
                            <td>{{$subscription->bank_name}}</td>
                                @foreach($users as $user)
                                    @if($user->id == $subscription->user_id)
                                        <td>{{$user->name}}</td>
                                    @endif
                                @endforeach
                        </tr>
                    @endforeach
                </table>
                {{$all_subscriptions->links()}}
        @endif
        {{--rejectModal--}}
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
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <p for="body" class="pull-right" style="text-align: right; margin-bottom: 3%">: سبب الرفض</p>
                                </div>
                                <form method="post" action="/admin/reject_membership_request">
                                    @csrf
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