@extends('layouts.admin_english')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" style="background-color: white; margin-bottom: 5%">
            @if (session('alert'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                    <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                </div>
            @endif
            <form class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1" method="post" action="/admin/store_reason"><br>
                @csrf
                <h5 class="pull-right" style="text-align: right; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: أضف سبب جديد للتواصل</h5>
                <input type="text" name="contact_reason" class="input-field" placeholder="سبب التواصل" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="إضافة">
            </form>
            @if(count($contact_reasons) > 0)
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1">
                    <ul dir="rtl" style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; font-size: 16px; margin-top: 5%">
                        @foreach($contact_reasons as $contact_reason)
                            <li style="margin-top: 5px; margin-right: 15px" class="row">
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">{{$contact_reason->contact_reason}}</div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">
                                    <a href="/admin/delete_reason/{{$contact_reason->id}}" class="pull-left"><i class="fas fa-minus-circle" aria-hidden="true" style="color: red; margin-left: 30px"></i></a>
                                </div>
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                    {{$contact_reasons->links()}}
                </div>
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <br><h3 style="color: darkorange; text-align: center">لا توجد أسباب مدخلة حتى الآن</h3>
                </div>
            @endif
        </div>
    </div>
@endsection