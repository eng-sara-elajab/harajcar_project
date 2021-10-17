@extends('layouts.admin_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12 row" style="background-color: white; margin-bottom: 5%">
            @if(count($read_commissions) > 0)
                @foreach($read_commissions as $read_commission)
                    <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-3 col-sm-4 offset-sm-1 col-5" style="margin-bottom: 20px"><br>
                        <a data-toggle="modal" data-target="#myModal" data-mybill="{{asset('images/bills/'.$read_commission->bill)}}" id="open"><img src="{{asset('images/bills/'.$read_commission->bill)}}" style="height: 250px; width: 100%" title="اضغط للعرض"></a>
                    </div>
                    <div class="col-xl-4 offset-xl-1 col-lg-5 offset-lg-1 col-md-7 col-sm-6 offset-sm-1 col-6 offset-1" style="margin-bottom: 20px"><br>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$read_commission->username}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: إسم المستخدم</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$read_commission->commission}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: العمولة بالريال</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$read_commission->bank_name}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: البنك المحول</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$read_commission->phone}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: رقم الهاتف</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$read_commission->ads_no}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: رقم الاعلان</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$read_commission->notes == null ? 'لا توجد' : $read_commission->notes}}<span class="pull-right" style="color: #24a0ed">&nbsp;&nbsp;: ملاحظات</span></p>
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-bottom: 10%"></p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row">
                        <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-6">
                            @foreach($posts as $post)
                                @if($post->ads_no == $read_commission->ads_no)
                                    <a data-toggle="modal" data-target="#rejectModal" data-myid="{{$read_commission->id}}" id="open" class="btn btn-default btn-block" style="color: darkgrey; text-align: center; font-family: 'Segoe UI'; font-size: 18px; margin-top: 20px">رفض</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6">
                            @foreach($posts as $post)
                                @if($post->ads_no == $read_commission->ads_no)
                                    <a href="{{$post->commission == 'payed' ? '#' : '/admin/accept_commission/'.$read_commission->id}}" class="btn btn-primary btn-block" style="color: white; text-align: center; font-family: 'Segoe UI'; font-size: 18px; margin-top: 20px">{{$post->commission == 'payed' ? 'تم الدفع مسبقاً' : 'قبول'}}</a>
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
                    <h3 style="color: darkorange; text-align: center">لا توجد فواتير سداد جديدة</h3>
                </div>
            @endif
            @if(count($all_commissions) > 0)
                <table class="table table-bordered table-responsive" style="margin-top: 15px; text-align: center">
                    <tr style="font-size: 20px; font-weight: bold; border:1px solid black;border-collapse:collapse; text-align: center">
                        <th>صورة الفاتورة</th>
                        <th>الحالة</th>
                        <th>الملاحظات</th>
                        <th>رقم الاعلان</th>
                        <th>العمولة (بالريال)</th>
                        <th>رقم الهاتف</th>
                        <th>اسم البنك</th>
                        <th>إسم المستخدم</th>
                    </tr>
                    @foreach($all_commissions as $commission)
                        <tr style="text-align: center">
                            <td><a data-toggle="modal" data-target="#myModal" data-mybill="{{asset('images/bills/'.$commission->bill)}}" id="open"><img src="{{asset('images/bills/'.$commission->bill)}}" style="height: 60px; width: 60px" title="اضغط للعرض"></a></td>
                            <td>{{$commission->status}}</td>
                            <td>{{$commission->notes == null ? 'لا توجد ملاحظات' : $commission->notes}}</td>
                            <td>{{$commission->ads_no}}</td>
                            <td>{{$commission->commission}}</td>
                            <td>{{$commission->phone}}</td>
                            <td>{{$commission->bank_name}}</td>
                            <td>{{$commission->username}}</td>
                        </tr>
                    @endforeach
                </table>
                {{$all_commissions->links()}}
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
                                <div class="form-group col-md-12">
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
                                <div class="form-group col-md-12">
                                    <form method="post" action="/admin/reject_commission">
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