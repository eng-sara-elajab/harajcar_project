@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-8 col-md-offset-4 col-xs-12" style="margin-bottom: 40px">
            @if (session('alert'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                    <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                </div>
            @endif
            <form method="{{Auth::user() ? 'post' : 'get'}}" action="{{Auth::user() ? '/contact_us' : '/login'}}" enctype="multipart/form-data" style="margin-top: 1%; font-family: 'Segoe UI'">
                @csrf
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%">سبب الإتصال</label>
                <select class="pull-right ContactUsSelect" dir="rtl" name="contact_reason" required>
                    <option selected>&nbsp;&nbsp;السبب</option>
                    @foreach($contact_reasons as $contact_reason)
                        <option value="{{$contact_reason->contact_reason}}">&nbsp;&nbsp;{{$contact_reason->contact_reason}}</option>
                    @endforeach
                </select>
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%">البريد الإلكتروني</label>
                <input type="email" name="email" class="pull-right ContactUsSelect" style="height: 40px" required>
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%">رقم جوالك المرتبط بعضويتك</label>
                <input type="tel" name="phone" class="pull-right ContactUsSelect" style="height: 40px" required>
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%">نص الرساله</label>
                <textarea class="pull-right ContactUsSelect" name="body" style="height: 100px" required></textarea>
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%">صوره او فيديو لتوضيح المشكلة (إختياري)</label>
                <input type="file" name="illustration" class="pull-right" style="margin-top: 1%; width: 200px; margin-left: 50%; margin-right: 4%" dir="rtl">
                <input type="submit" class="btn btn-primary pull-right" style="margin-top: 3%; width: 100px; margin-left: 50%; margin-right: 4%" value="إرسال">
            </form>
        </div>
    </div>
@endsection