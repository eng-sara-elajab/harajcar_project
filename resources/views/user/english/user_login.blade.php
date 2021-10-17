@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
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
            <form method="post" action="#">
                <input type="text" placeholder="username or phone number" class="input-field">
                <input type="password" placeholder="password" class="input-field">
                <input type="checkbox" id="horns" name="horns" class="pull-left" style="margin-top: 7px">
                <label style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-left: 10px" class="pull-left">Show password</label>
                <br><br><br><input type="submit" class="btn btn-default btn-lg pull-left" style="width: 100px; color: darkgreen; font-family: 'Segoe UI'; font-size: 20px; opacity: 0.7; font-weight: bold" value="Login »"><br><br>
            </form>
            <br>
            <a href="/user_register" class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: #0275d8">Create account</a><br><br>
            <a href="#" class="pull-left" style="font-size: 18px; margin-bottom: 50px;  font-family: 'Segoe UI'; color: #0275d8">Forgot your password?</a>
        </div>
    </div>

@endsection