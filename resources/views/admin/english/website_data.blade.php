@extends('layouts.admin_english')

@section('content')
    <div class="container-fluid row">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <form method="post" action="/admin/update_website_data" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12"  style="border: solid 1px lightgrey; text-align: right; border-radius: 15px; opacity: 0.9; margin-bottom: 30px">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <label style="margin-top: 10px">: إسم الموقع باللغة العربية</label>
                        <input type="text" class="form-control input-field" name="arabic_name" value="{{$website_data->arabic_name}}">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <label style="margin-top: 10px">: إسم الموقع باللغة الإنجليزية</label>
                        <input type="text" class="form-control input-field" name="english_name" value="{{$website_data->english_name}}">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <label style="margin-top: 10px">: شعار الموقع</label>
                        @if($website_data->logo == null)
                            <img src="{{asset('images/logos/default_logo.png')}}" id="blah_1" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                        @else
                            <img src="/images/logos/{{$website_data->logo}}" id="blah_1" style="width: 100%; height: 300px; margin-top: 10px; margin-bottom: 10px">
                        @endif
                        <input type='file' onchange="readURL(this)" name="logo" class="input-field" value="{{$website_data->logo}}">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <input type="submit" class="btn btn-success btn-block" style="font-size: 20px" value="تحديث">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection