@extends('layouts.user_arabic')

@section('content')
    <div class="row">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <form method="post" action="/user/update_profile/{{ $user->id }}" style="margin-top: 5%" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2"  style="border: solid 1px lightgrey; text-align: right; border-radius: 15px; opacity: 0.9; margin-bottom: 30px">
                    <div class="col-md-6 col-xs-6 form-group">
                        <label style="margin-top: 10px">: إسم المستخدم</label>
                        <input type="text" class="form-control input-field" name="username" value="{{$user->username}}">
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label style="margin-top: 10px">: الإسم الكامل</label>
                        <input type="text" class="form-control input-field" name="name" value="{{$user->name}}">
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label style="margin-top: 10px">: رقم الهاتف</label>
                        <input type="tel" class="form-control input-field" name="phone" value="{{$user->phone}}">
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label style="margin-top: 10px">: البريد الإلكتروني</label>
                        <input type="email" class="form-control input-field" name="email" value="{{$user->email}}">
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label style="margin-top: 10px">: الصورة الشخصية</label>
                        @if($user->profile_photo == null)
                            <img src="/images/profiles/default_profile.jpg" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                        @else
                            <img src="/images/profiles/{{$user->profile_photo}}" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                        @endif
                        <input type='file' onchange="readURL(this)" name="profile_photo" class="input-field" value="{{$user->profile_photo}}">
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label style="margin-top: 10px">: صورة الغلاف</label>
                        @if($user->profile_photo == null)
                            <img src="/images/covers/default_cover.jpg" id="blah_1" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                        @else
                            <img src="/images/covers/{{$user->cover_photo}}" id="blah_1" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                        @endif
                        <input type='file' onchange="read_URL(this)" name="cover_photo" class="input-field" value="{{$user->cover_photo}}">
                    </div>
                    <div class="col-md-12 col-xs-12 form-group">
                        <label style="margin-top: 10px">: البلد</label>
                        <select dir="rtl" name="country" class="form-control input-field" style="font-size: 18px; font-family: 'Segoe UI'; padding-right: 5px; opacity: 0.7">
                            <option value="ksa" selected>السعودية</option>
                            <option value="bahrain">البحرين</option>
                            <option value="kuwait">الكويت</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label style="margin-top: 10px">: كلمة السر</label>
                        <input type="password" class="form-control input-field" name="password" style="text-align: left" required>
                    </div>
                    <div class="col-md-6 col-xs-6 form-group">
                        <label style="margin-top: 10px">: أعد كتابة كلمة السر</label>
                        <input type="password" class="form-control input-field" name="password_1" style="text-align: left" required><br>
                    </div>
                    <div class="col-md-12 col-xs-12 form-group">
                        <input type="submit" class="btn btn-success btn-block" style="font-size: 20px" value="تحديث">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection