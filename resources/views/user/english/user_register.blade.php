@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <h2 style="text-align: left; color: black; font-family: 'Segoe UI'; opacity: 0.5; font-weight: bold">Create new account</h2><br>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-1">
            <hr>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <form method="post" action="{{ route('register') }}">
                <label class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">Name :</label>
                <input type="text" placeholder="eg : Edwin Diaz" class="input-field" required>

                <label class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">Username :</label>
                <input type="text" placeholder="eg : edwin_diaz" class="input-field" required>

                <label class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">Phone number :</label>
                <input type="tel" placeholder="eg : 056" class="input-field" required>

                <label class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">Email Address :</label>
                <input type="tel" placeholder="eg : test@sample.eg" class="input-field" required>

                <label class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5">Country :</label>
                <select class="input-field" style="font-size: 18px; font-family: 'Segoe UI'; padding-left: 5px; opacity: 0.7" required>
                    <option value="saudi_arabia" selected>Saudi_Arabia</option>
                    <option value="bahrain">Bahrain</option>
                    <option value="kuwait">Kuwait</option>
                </select>

                <label class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">Profile photo :</label>
                <input type="file" name="profile_photo" class="input-field">

                <label class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">Cover photo :</label>
                <input type="file" name="cover_photo" class="input-field">

                <label class="pull-left" style="font-size: 18px; font-family: 'Segoe UI'; color: black; opacity: 0.5; margin-top: 12px">Password :</label>
                <input type="password" class="input-field" required>

                <input type="checkbox" style="margin-top: 22px; margin-left: 1%" class="pull-left" required>
                <label style="margin-top: 18px; margin-left: 10px; color: green; font-size: 18px; font-family: 'Segoe UI'">I agree to commit paying 1% of each completed deal</label><br>

                <input type="submit" class="btn btn-default btn-lg pull-left" onclick="move()" style="width: 150px; color: darkgreen; font-family: 'Segoe UI'; font-size: 20px; opacity: 0.7; font-weight: bold; margin-top: 12px" value="Create »"><br><br>
            </form>
            <br><br>
            {{--<div class="w3-container" style="margin-bottom: 50px">--}}
                {{--<br><div class="w3-light-grey">--}}
                    {{--<div id="myBar" class="w3-blue" style="height:25px;width:33%; float: right"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

@endsection