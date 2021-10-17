@extends('layouts.user_english')

@section('content')
    @if (session('alert'))
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
            <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
        </div>
    @endif
    <form method="post" action="/user/update_profile/{{ $user->id }}" style="margin-top: 5%" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2"  style="border: solid 1px lightgrey; text-align: left; border-radius: 15px; opacity: 0.9; margin-bottom: 30px">
                <div class="col-md-6 col-xs-6 form-group">
                    <label style="margin-top: 10px">Full Name :</label>
                    <input type="text" class="form-control input-field" name="name" value="{{$user->name}}">
                </div>
                <div class="col-md-6 col-xs-6 form-group">
                    <label style="margin-top: 10px">Username :</label>
                    <input type="text" class="form-control input-field" name="username" value="{{$user->username}}">
                </div>
                <div class="col-md-6 col-xs-6 form-group">
                    <label style="margin-top: 10px">Phone Number :</label>
                    <input type="tel" class="form-control input-field" name="phone" value="{{$user->phone}}">
                </div>
                <div class="col-md-6 col-xs-6 form-group">
                    <label style="margin-top: 10px">Email Address :</label>
                    <input type="email" class="form-control input-field" name="email" value="{{$user->email}}">
                </div>
                <div class="col-md-6 col-xs-6 form-group">
                    <label style="margin-top: 10px">Profile Photo :</label>
                    @if($user->profile_photo == null)
                        <img src="/images/profiles/default_profile.jpg" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @else
                        <img src="/images/profiles/{{$user->profile_photo}}" id="blah" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @endif
                    <input type='file' onchange="readURL(this)" name="profile_photo" class="input-field" value="{{$user->profile_photo}}">
                </div>
                <div class="col-md-6 col-xs-6 form-group">
                    <label style="margin-top: 10px">Cover Photo</label>
                    @if($user->profile_photo == null)
                        <img src="/images/covers/default_cover.jpg" id="blah_1" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @else
                        <img src="/images/covers/{{$user->cover_photo}}" id="blah_1" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                    @endif
                    <input type='file' onchange="read_URL(this)" name="cover_photo" class="input-field" value="{{$user->cover_photo}}">
                </div>
                <div class="col-md-12 col-xs-12 form-group">
                    <label style="margin-top: 10px">Country :</label>
                    <select name="country" class="form-control input-field" style="font-size: 18px; font-family: 'Segoe UI'; padding-right: 5px; opacity: 0.7">
                        <option value="ksa" selected>KSA</option>
                        <option value="bahrain">Bahrain</option>
                        <option value="kuwait">Kuwait</option>
                    </select>
                </div>
                <div class="col-md-6 col-xs-6 form-group">
                    <label style="margin-top: 10px">Password :</label>
                    <input type="password" class="form-control input-field" name="password" required>
                </div>
                <div class="col-md-6 col-xs-6 form-group">
                    <label style="margin-top: 10px">Retype Password :</label>
                    <input type="password" class="form-control input-field" name="password_1" required><br>
                </div>
                <div class="col-md-12 col-xs-12 form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Update">
                </div>
            </div>
        </div>
    </form>
@endsection