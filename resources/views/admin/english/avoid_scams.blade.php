@extends('layouts.admin_english')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            @if (session('alert'))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                    <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                </div>
            @endif
            <form class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12" method="post" action="/admin/store_avoid_scam" style="margin-top: 3%">
                @csrf
                <h5 class="pull-right" style="text-align: right; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: أضف تعليمات تجنب العميل النصب والاحتيال</h5>
                <input type="text" name="description" class="input-field" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                <p style="color: darkgrey; font-size: 13px; text-align: right">التعليمات يجب أن تكون مكتوبة بصيغة واضحة ومفهومة وبعيدة عن اللبس<span style="color: darkorange; font-size: 16px">*</span></p>
                <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="إضافة">
            </form>
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12" style="margin-top: 5%">
                @if(count($avoid_scams) > 0)
                    <ul dir="rtl">
                        @foreach($avoid_scams as $avoid_scam)
                            <li style="text-align: right; font-size: 18px; font-family: 'Segoe UI'; color: darkgrey" class="row">
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">{{$avoid_scam->description}}</div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">
                                    <a href="/admin/delete_avoid_scam/{{$avoid_scam->id}}" class="pull-left" style="margin-left: 30%"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                </div>
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                @else
                    <h3 style="color: darkorange; text-align: center">لم يتم ادخال تعليمات لتجنب النصب والاحتيال حتى الآن</h3>
                @endif
            </div>
        </div>
    </section>
@endsection