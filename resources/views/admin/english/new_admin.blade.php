@extends('layouts.admin_english')

@section('content')
    <div class="container-fluid row">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <form method="post" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" action="/admins/store" enctype="multipart/form-data">
            @csrf
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1 form-group" style="border: solid 1px lightgrey; text-align: right; background-color: whitesmoke">
                <label style="margin-top: 10px">: الإسم</label>
                <input type="text" class="form-control input-field" name="name">
                <label style="margin-top: 10px">: البريد الإلكتروني</label>
                <input type="email" class="form-control input-field" name="email">
                <label style="margin-top: 10px">: الصورة الشخصية</label>
                <img src="/images/profiles/default_profile.jpg" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                <input type='file' onchange="readURL(this)" name="profile_photo" class="input-field">
                <label style="margin-top: 10px">: كلمة السر</label>
                <input type="password" class="form-control" name="password" required>
                <label style="margin-top: 10px">: أعد كتابة كلمة السر</label>
                <input type="password" class="form-control" name="password_1" required><br>
                <input type="submit" class="btn btn-success btn-block" value="إضافة"><br>
            </div>
        </form>
    </div>
@endsection