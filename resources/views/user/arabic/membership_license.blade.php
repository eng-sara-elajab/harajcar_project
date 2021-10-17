@extends('layouts.user_arabic')

@section('content')
    <div class="row container-fluid" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12" style="margin-top: 3%">
            <h3 style="font-family: 'Segoe UI'; color: darkgrey; font-weight: bold; text-align: center">توثيق العضوية</h3>
            <p style="font-family: 'Segoe UI'; font-size: 14px; color: darkgrey; font-weight: bold; text-align: center; margin-top: 3%; margin-bottom: 2%">عند توثيق حسابك ستظهر علامة&nbsp;<i class="fa fa-check-circle" style="color: #0275d8"></i>&nbsp;بجانب اسم الحساب</p>
        </div>
        <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="margin-top: 3%; margin-bottom: 4%; font-family: 'Segoe UI'">
            <div style="background-color: white; width: 100%; border-radius: 15px; color: #0275d8; font-size: 18px; text-align: right">
                <br><a href="#" style="margin: 20px">توثيق الحساب عبر أبشر<i class="fa fa-arrow-left pull-left" aria-hidden="true" style="margin-left: 20px"></i></a><br><br>
            </div>
            <div style="background-color: white; width: 100%; border-radius: 15px; color: #0275d8; font-size: 18px; text-align: right; margin-top: 5%">
                <br><a href="/view_license" style="margin: 20px">توثيق بإضافة التراخيص<i class="fa fa-arrow-left pull-left" aria-hidden="true" style="margin-left: 20px"></i></a><br><br>
            </div>
        </div>
    </div>
@endsection