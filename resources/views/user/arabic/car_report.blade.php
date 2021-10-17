@extends('layouts.user_arabic')

@section('content')
    <div class="row container-fluid" style="background-color: whitesmoke">
        <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="background-color: white; margin-top: 3%; border-radius: 30px; margin-bottom: 3%">
            <div class="col-md-12 col-xs-12">
                <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; border: solid 1px #0275d8; border-radius: 50%">&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;</a></p>
            </div>
            <div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2" style="margin-bottom: 10%">
                <img src="{{asset('images/logos/mojaz_logo.png')}}" style="height: 100%; width: 100%">
            </div>
            <div class="col-md-12 col-xs-12">
                <p style="font-family: 'Segoe UI'; font-weight: bold; font-size: 18px; text-align: center">هذه الخدمة توفر معلومات عن السيارة تشمل الملاك و حالة الاستهلاك و الحوادث</p>
            </div>
            <div class="col-xl-4 col-xl-offset-4 col-lg-5 col-lg-offset-4 col-md-5 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-7 col-xs-offset-4" style="margin-top: 1%; margin-bottom: 1%">
                <a href="{{$report_template != null ? '/view_report' : '#'}}" title="{{$report_template != null ? '' : 'لا يوجد نموذج للتقارير'}}" target="{{$report_template == null ? '' : '_blank'}}" style="font-family: 'Segoe UI'; font-weight: bold; font-size: 16px; text-align: center; color: #24a0ed; display: block">انظر الى مثال من التقرير</a>
                <a style="font-family: 'Segoe UI'; font-weight: bold; font-size: 16px; text-align: center; color: red; text-decoration: none; display: block">SAR {{$report_price != null ? $report_price->price : 'غير محدد'}}<span>&nbsp;سعر التقرير</span></a>
            </div>
            <div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2" style="margin-top: 1%;margin-bottom: 7%">
                <a href="/new_report" class="btn btn-block black_list_submit_button">طلب تقرير جديد</a>
                <a href="/previous_reports" class="btn btn-block black_list_submit_button" style="background-color: #f7f7f7; color: #0275d8; margin-top: 4%">تقارير سابقة</a>
            </div>
        </div>
    </div>
@endsection