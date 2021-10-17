@extends('layouts.admin_english')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 row" style="background-color: white; margin-bottom: 5%">
            @if(count($previous_reports) > 0)
                @foreach($previous_reports as $previous_report)
                    <div class="col-xl-5 col-lg-4 col-md-11 col-sm-11 col-11">
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$previous_report->serial_no}}<span>&nbsp;&nbsp;: الرقم التسلسلي</span></p>
                    </div>
                    @foreach($users as $user)
                        @if($user->id == $previous_report->user_id)
                            <div class="col-xl-6 col-lg-7 col-md-11 col-sm-11 col-11">
                                <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$user->name}}<span>&nbsp;&nbsp;: إسم مقدم الطلب</span></p>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-xl-5 col-lg-4 col-md-11 col-sm-11 col-11">
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$previous_report->ads_no}}<span>&nbsp;&nbsp;: رقم الإعلان</span></p>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-11 col-sm-11 col-11 pull-right">
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$previous_report->plate_info_in_arabic}}<span>&nbsp;&nbsp;: معلومات اللوحة - باللغة العربية</span></p>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-11 col-sm-11 col-11">
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$previous_report->phone_no}}<span>&nbsp;&nbsp;: رقم الهاتف</span></p>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-11 col-sm-11 col-11 pull-right">
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px">{{$previous_report->plate_info_in_english}}<span>&nbsp;&nbsp;: معلومات اللوحة - باللغة الإنجليزية</span></p>
                    </div>
                    <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11">
                        <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-top: 5px; display: inline-block" class="pull-right"><span>&nbsp;&nbsp;الحالة :&nbsp;&nbsp;</span>{{$previous_report->status == 'read' ? 'بانتظار التسليم' : 'تم التسليم'}}</p>
                        @if($previous_report->status == 'read')
                            <form method="post" action="/admin/deliver_report/{{$previous_report->id}}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="report_file_name" required>
                                <button type="submit" class="btn btn-danger pull-left" style="width: 150px; text-align: center; color: white; margin-left: 10%">تسليم</button>
                            </form>
                        @else
                            <a href="/admin/view_report/{{$previous_report->id}}" target="_blank" class="btn btn-success pull-left" style="width: 150px; text-align: center; color: white; margin-left: 20%; display: inline">عرض التقرير</a>
                        @endif
                    </div>
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12">
                        <hr>
                    </div>
                @endforeach
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
                    {{$previous_reports->links()}}
                </div>
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3 style="color: darkorange; text-align: center">لا توجد طلبات تقارير جديدة</h3>
                </div>
            @endif
        </div>
    </div>
@endsection