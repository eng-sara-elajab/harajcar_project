@extends('layouts.admin_english')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1">
                @if (session('alert'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                        <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                    </div>
                @endif
                <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" method="post" action="/admin/store_country">
                    @csrf
                    <input type="text" name="arabic_name" class="input-field" placeholder="الإسم بالعربية" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <input type="text" name="english_name" class="input-field" placeholder="الإسم بالإنجليزية" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="إضافة">
                </form>
                @if(count($allowed_countries) > 0)
                    <ul dir="rtl" style="margin-top: 5%" class="row">
                        @foreach($allowed_countries as $country)
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: #24a0ed">{{$country->arabic_name}}</p>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: #24a0ed">{{$country->english_name}}</p>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">
                                <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: darkgrey"><a href="/admin/delete_country/{{$country->id}}" class="pull-left" style="margin-left: 35px; text-align: left"><i class="fa fa-minus-circle" style="color: red"></i></a></p>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                            </div>
                        @endforeach
                    </ul>
                    {{$allowed_countries->links()}}
                @else
                    <br><h3 style="color: darkorange; text-align: center">لا توجد دول مدخلة حتى الآن</h3>
                @endif
            </div>
        </div>
    </section>
@endsection