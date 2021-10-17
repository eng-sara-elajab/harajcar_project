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
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: red; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <form method="post" action="{{ route('register') }}" style="margin-bottom: 60px" enctype="multipart/form-data">
                @csrf
                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: الإسم</label>
                <input type="text" name="name" placeholder="مثلاً : أيمن الشيخ" class="input-field" required>

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: إسم المستخدم</label>
                <input type="text" name="username" placeholder="eg : ayman_elshaikh" class="input-field" required>

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: رقم الهاتف</label>
                <input type="tel" name="phone" placeholder="مثال : 056" class="input-field" style="text-align: left" required>

                <label class="pull-right" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: البريد الإلكتروني</label>
                <input type="email" name="email" placeholder="eg : test@sample.eg" class="input-field" style="text-align: left" required>

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5">: البلد</label>
                <select dir="rtl" name="country" class="input-field" style="font-size: 18px; font-family: 'Segoe UI'; padding-right: 5px; opacity: 0.7" required>
                    <option value="">اختر المنطقة</option>
                    @foreach($countries as $country)
                        <option value="{{$country->arabic_name}}">{{$country->arabic_name}}</option>
                    @endforeach
                </select>

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: الصورة الشخصية</label>
                <input type="file" name="profile_photo" class="input-field" style="direction: rtl">

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: صورة الغلاف</label>
                <input type="file" name="cover_photo" class="input-field" style="direction: rtl">

                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: الرقم السري</label>
                @if($errors->any())
                    <input type="password" name="password" class="input-field" style="border: solid 1px red" autofocus required>
                @else
                    <input type="password" name="password" class="input-field" required>
                @endif


                @if($errors->any())
                    <div class="form-group row">
                        <div class="col-md-12">
                            <p style="color: red; font-size: 16px" class="pull-right">{{$errors->first()}}</p>
                        </div>
                    </div>
                @endif


                <label class="pull-right" style="font-size: 20px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">: أعد كتابة الرقم السري</label>
                @if($errors->any())
                    <input type="password" name="password_1" class="input-field" style="border: solid 1px red" required>
                @else
                    <input type="password" name="password_1" class="input-field" required>
                @endif

                <input type="checkbox" name="payment_acceptance" style="margin-top: 22px; margin-right: 1%" class="pull-right" required>
                <label class="pull-right" style="margin-top: 18px; margin-right: 10px; color: green; font-size: 18px; font-family: 'Segoe UI'"> أتعهد بأن أدفع نسبة 1% لكل صفقة بيع مكتملة</label><br><br><br><br>

                <input type="submit" class="btn btn-default btn-lg pull-right" onclick="move()" style="width: 100px; color: darkgreen; font-family: 'Segoe UI'; font-size: 20px; opacity: 0.7; font-weight: bold; margin-top: 12px; margin-right: 12px" value="« إنشاء"><br><br>
            </form>
        </div>
    </div>

@endsection