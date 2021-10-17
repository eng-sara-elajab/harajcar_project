@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: white; height: 100%">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
            <h2 style="text-align: right; color: black; font-family: 'Segoe UI'; opacity: 0.5; font-weight: bold">تسجيل الدخول</h2>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <hr>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
            <form method="post" action="{{ route('login') }}">
                @csrf
                @if($errors->any())
                    <input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid @enderror input-field" name="email" style="border: solid 1px red; text-align: left" value={{$email}} required autocomplete="email" autofocus>
                @else
                    <input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid @enderror input-field" name="email" style="text-align: left" value="{{ old('email') }}" required autocomplete="email">
                @endif
                @if($errors->any())
                    <div class="form-group row">
                        <div class="col-md-12">
                            <p style="color: red; font-size: 12px; margin-right: 250px">{{$errors->first()}}</p>
                        </div>
                    </div>
                @endif
                <input type="password" name="password" id="myInput" style="text-align: left; color: darkgrey" placeholder="الرقم السري" class="input-field" required>
                <input type="checkbox" class="pull-right" style="margin-top: 7px" onclick="myFunction()">
                <label style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-right: 10px" class="pull-right">إظهار الرقم السري</label>
                <br><br><br><input type="submit" class="btn btn-default btn-lg pull-right" style="width: 100px; color: darkgreen; font-family: 'Segoe UI'; font-size: 20px; opacity: 0.7; font-weight: bold" value="« دخــول"><br><br>
            </form>
            <br>
            <a href="/register" class="pull-right" style="font-size: 18px; font-family: 'Segoe UI'; color: #0275d8">إنشاء حساب جديد</a><br><br>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="pull-right" style="font-size: 18px; margin-bottom: 50px;  font-family: 'Segoe UI'; color: #0275d8">هل نسيت الرقم السري</a>
            @endif
        </div>
    </div>

@endsection