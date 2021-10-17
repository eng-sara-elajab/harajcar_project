@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-6 col-xs-12 pull-right" style="margin-bottom: 40px">
            @if (session('alert'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                    <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                </div>
            @endif
            <form method="post" action="/store_license" title="{{Auth::user()->documentation_status == 1 ? 'هذا المستخدم موثق مسبقاً' : ''}}" enctype="multipart/form-data" style="margin-top: 1%; font-family: 'Segoe UI'">
                @csrf
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%"><span style="color: red">*</span>الاسم المسجل</label>
                <input type="text" class="pull-right ContactUsSelect" style="height: 40px; border-radius: 0" value="{{Auth::user()->name}}" readonly>
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%"><span style="color: red">*</span>رقم المستند</label>
                <input type="number" name="document_no" class="pull-right ContactUsSelect" style="height: 40px; border-radius: 0" required>
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%"><span style="color: red">*</span>صورة الوثيقة</label>
                <input type="file" name="document_img" class="pull-right ContactUsSelect" style="height: 40px; border-radius: 0" dir="rtl" required>
                <label class="pull-right" style="text-align: right; font-size: 14px; margin-right: 4%">ملاحظات</label>
                <textarea name="notes" class="pull-right ContactUsSelect" style="height: 100px; border-radius: 0" placeholder="اختياري"></textarea>
                <input type="submit" class="btn btn-default pull-right" style="margin-top: 3%; width: 200px; margin-left: 50%; margin-right: 4%; height: 50px; background-color: whitesmoke; color: darkgreen; font-size: 18px; text-align: center" value="إضافة توثيق العضوية">
            </form>
        </div>
    </div>
@endsection