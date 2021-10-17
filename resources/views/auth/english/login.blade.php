@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row" style="background-color: white">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
            <h2 style="text-align: left; color: black; font-family: 'Segoe UI'; opacity: 0.5; font-weight: bold">Login</h2>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <hr>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
            <form method="post" action="{{ route('login') }}">
                @csrf
                @if($errors->any())
                    <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror input-field" name="email" style="border: solid 1px red" value={{$email}} required autocomplete="username" autofocus>
                @else
                    <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror input-field" name="email" value="{{ old('email') }}" required autocomplete="username">
                @endif
                @if($errors->any())
                    <div class="form-group row">
                        <div class="col-md-12">
                            <p style="color: red; font-size: 12px; margin-left: 250px">{{$errors->first()}}</p>
                        </div>
                    </div>
                @endif
                <input type="password" name="password" id="myInput" placeholder="password" style="color: darkgrey" class="input-field" required>
                <input type="checkbox" class="pull-left" style="margin-top: 7px" onclick="myFunction()">
                <label style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-left: 10px" class="pull-left">Show password</label>
                <br><br><br><input type="submit" class="btn btn-default btn-lg pull-left" style="width: 100px; color: darkgreen; font-family: 'Segoe UI'; font-size: 20px; opacity: 0.7; font-weight: bold" value="Login »"><br><br>
            </form>
            <br>
            <a href="/register" class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: #0275d8">Create account</a><br><br>
            {{--<a href="#" class="pull-left" style="font-size: 18px; margin-bottom: 50px;  font-family: 'Segoe UI'; color: #0275d8">Forgot your password?</a>--}}
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="pull-left" style="font-size: 18px; margin-bottom: 50px;  font-family: 'Segoe UI'; color: #0275d8">Forgot your password?</a>
            @endif
        </div>
    </div>

@endsection