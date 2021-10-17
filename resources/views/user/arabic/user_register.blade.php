@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <h2 style="text-align: right; color: black; font-family: 'Segoe UI'; opacity: 0.5; font-weight: bold">التسجيل بالموقع</h2><br>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-1">
            <hr>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <form method="post" action="{{ route('register') }}" style="margin-bottom: 60px">
                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: الإسم</label>
                <input type="text" placeholder="مثلاً : أيمن الشيخ" class="input-field" required>

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: إسم المستخدم</label>
                <input type="text" placeholder="eg : ayman_elshaikh" class="input-field" required>

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: رقم الهاتف</label>
                <input type="tel" placeholder="مثال : 056" class="input-field" required>

                <label class="pull-right" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: البريد الإلكتروني</label>
                <input type="tel" placeholder="eg : test@sample.eg" class="input-field" required>

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5">: البلد</label>
                <select dir="rtl" class="input-field" style="font-size: 18px; font-family: 'Segoe UI'; padding-right: 5px; opacity: 0.7" required>
                    <option value="السعودية" selected>السعودية</option>
                    <option value="البحرين">البحرين</option>
                    <option value="الكويت">الكويت</option>
                </select>

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: الصورة الشخصية</label>
                <input type="file" name="profile_photo" class="input-field">

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: صورة الغلاف</label>
                <input type="file" name="cover_photo" class="input-field">

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: الرقم السري</label>
                <input type="password" class="input-field" required>

                <input type="checkbox" style="margin-top: 22px; margin-right: 1%" class="pull-right" required>
                <label class="pull-right" style="margin-top: 18px; margin-right: 10px; color: green; font-size: 18px; font-family: 'Segoe UI'"> أتعهد بأن أدفع نسبة 1% لكل صفقة بيع مكتملة</label><br><br><br><br>

                <input type="submit" class="btn btn-default btn-lg pull-right" onclick="move()" style="width: 100px; color: darkgreen; font-family: 'Segoe UI'; font-size: 20px; opacity: 0.7; font-weight: bold; margin-top: 12px; margin-right: 12px" value="« إنشاء"><br><br>
            </form>
        </div>
    </div>

@endsection