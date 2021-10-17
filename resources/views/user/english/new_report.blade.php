@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 35px; margin-bottom: 5%">
            <h2 style="text-align: center; color: #007500; font-weight: bold; margin-top: 5%; font-family: 'Segoe UI'">طلب تقرير السيارة</h2>
            <form class="col-md-12 col-xs-12" method="post" action="/store_new_report" style="margin-bottom: 50px; margin-top: 10%">
                @csrf
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; font-size: 15px">: رقم المركبة التسلسلي</label><br>
                    <input class="form-control pull-right" type="number" name="serial_no" placeholder="أكتب رقم المركبة التسلسلي" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%; font-size: 15px">: معلومات اللوحة - بالأرقام العربية</label><br>
                    <input class="form-control pull-right" type="text" name="plate_info_in_arabic" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%; font-size: 15px">: معلومات اللوحة - بالأرقام الإنجليزية</label><br>
                    <input class="form-control pull-right" type="text" name="plate_info_in_english" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%; font-size: 15px">: رقـــم الـجـــوال</label><br><br>
                    <input class="form-control pull-right" type="tel" name="phone_no" placeholder="اختياري" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px">
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%; margin-bottom: 3%; font-size: 15px">: رقـــم الإعــــلان</label><br><br>
                    <input class="form-control pull-right" type="number" name="ads_no" placeholder="اختياري" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px">
                </div>
                    <input type="submit" value="طلب" class="btn btn-primary btn-block pull-right" style="margin-top: 30px; height: 42px; width: 82%; font-family: 'Segoe UI'; font-size: 18px; text-align: center; border-radius: 5px; margin-right: 5%">
                    <a href="/car_report" class="btn btn-default btn-block pull-right" style="margin-top: 15px; height: 42px; width: 82%; font-family: 'Segoe UI'; font-size: 18px; text-align: center; border-radius: 5px; margin-right: 5%">إلغاء</a>
            </form>
        </div>
    </div>
@endsection