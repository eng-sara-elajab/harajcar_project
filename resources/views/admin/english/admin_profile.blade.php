@extends('layouts.admin_english')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            @if (session('alert'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                    <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                </div>
            @endif
            <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" method="post" action="/admins/{{ $admin->id }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-4 offset-sm-1 col-4 offset-1 form-group" style="border: solid 1px lightgrey; border-right: none; text-align: center; background-color: #8ac1ef; border-radius: 15px; opacity: 0.9">
                    <label style="margin-top: 10px">الصورة الشخصية</label>
                    @if($admin->profile_photo == null)
                        <img src="/images/profiles/default_profile.jpg" id="blah_1" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @else
                        <img src="/images/profiles/{{$admin->profile_photo}}" id="blah_1" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @endif
                    <input type='file' onchange="readURL(this)" name="profile_photo" class="input-field" value="{{$admin->profile_photo}}">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 form-group" style="border: solid 1px lightgrey; border-left: none; text-align: right; background-color: #8ac1ef; border-radius: 15px; opacity: 0.9">
                    <label style="margin-top: 10px">الإسم</label>
                    <input type="text" class="form-control input-field" name="name" value="{{$admin->name}}">
                    <label style="margin-top: 10px">البريد الإلكتروني</label>
                    <input type="email" class="form-control input-field" name="email" value="{{$admin->email}}">
                    <label style="margin-top: 10px">كلمة السر</label>
                    <input type="password" class="form-control input-field" name="password" required>
                    <label style="margin-top: 10px">أعد كتابة كلمة السر</label>
                    <input type="password" class="form-control input-field" name="password_1" required><br>
                    <input type="submit" class="btn btn-success btn-block" value="تحديث"><br>
                </div>
            </form>
        </div>
    </section>
@endsection