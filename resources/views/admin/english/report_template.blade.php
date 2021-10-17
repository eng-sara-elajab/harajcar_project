@extends('layouts.admin_english')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1">
                @if (session('alert'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                        <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                    </div>
                @endif
                @if($report_template != null)
                    <ul dir="rtl">
                        <li style="text-align: right; font-size: 18px; font-family: 'Segoe UI'; color: darkgrey"><a href="/admin/view_report/{{$report_template->id}}" target="_blank">{{$report_template->name}}</a></li><hr>
                    </ul>
                @else
                    <h3 style="color: darkorange; text-align: center">لم يتم رفع النموذج حتى الآن</h3>
                @endif
            </div>
            @if($report_template != null)
                <form class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1" method="post" action="/admin/update_report_template" enctype="multipart/form-data" style="margin-top: 3%">
                    @csrf
                    {{method_field('put')}}
                    <h5 class="pull-right" style="text-align: right; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: تعديل نموذج التقرير</h5>
                    <input type="file" dir="rtl" name="name" value="{{$report_template->name}}" class="input-field" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <p style="color: darkgrey; font-size: 13px; text-align: right">يجب أن يكون الملف بصيغة pdf<span style="color: darkorange; font-size: 16px">*</span></p>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="تأكيد">
                </form>
            @else
                <form class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1" method="post" action="/admin/store_report_template" enctype="multipart/form-data" style="margin-top: 3%">
                    @csrf
                    <h5 class="pull-right" style="text-align: right; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: رفع نموذج التقرير</h5>
                    <input type="file" dir="rtl" name="name" value="" class="input-field" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <p style="color: darkgrey; font-size: 13px; text-align: right">يجب أن يكون الملف بصيغة pdf<span style="color: darkorange; font-size: 16px">*</span></p>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="تأكيد">
                </form>
            @endif
        </div>
    </section>
@endsection