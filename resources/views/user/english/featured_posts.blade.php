@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h3 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">"الإعلانات المميزة "المثبتة</h3>
            <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">. هي خدمة تتيح للتاجر تثبيت إعلانه في القسم ليظهر بشكل مميز ممايؤدي الى زيادة المبيعات</p>
        </div>
        <div class="col-md-12 col-xs-12 pull-right" style="margin-top: 2%">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">? ماهي تكلفة التثبيت؟ ماهي شروط تثبيت الإعلان</h4>
            @if(count($ads_terms) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: تثبيت الإعلانات خدمة مجانية. شروط تثبيت الإعلان هي</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($ads_terms as $ads_term)
                        <li style="margin-top: 10px">{{$ads_term->body}}</li>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال شروط بعد</h5>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: تثبيت الإعلانات خدمة مجانية. شروط تثبيت الإعلان هي</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li>يجب أن تحصل على 20 تقييم إيجابي خلال آخر سنه .</li>--}}
                {{--<li style="margin-top: 10px">يجب أن تكون السلعة تحتوي على صور و في القسم الصحيح .</li>--}}
                {{--<li style="margin-top: 10px">يجب أن تكون السلعة لنفس التاجر وليست لشخص آخر .</li>--}}
            {{--</ul>--}}
        </div>
        @if(!Auth::user())
            <div class="col-md-12 col-xs-12 pull-right" style="margin-top: 2%">
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; color: darkgrey">. للمزيد من المعلومات، يجب تسجيل الدخول بعضويتك</p>
            </div>
        @endif
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <hr style="opacity: 0.3; border: solid 1px darkgrey">
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h3 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; margin-right: 4%; font-weight: bold">ميزة الرتبة</h3>
            <a class="btn btn-default pull-right" style="margin-right: 4%; margin-top: 5px; width: 80px; height: 35px; color: darkgrey; background-color: whitesmoke; font-family: 'Segoe UI'">رتبة&nbsp;<i class="fa fa-star" style="color: #FFDF00;" aria-hidden="true"></i></a><br><br>
            <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">. الرتبة هي علامة تشجيعية و تقديرية مقدمة من الموقع للتاجر</p>
            @if(count($rank_terms) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; color: darkgrey">: يمنح الموقع رتبة تاجر  <a class="btn btn-default" style="width: 80px; height: 35px; color: darkgrey; font-size: 16px; background-color: whitesmoke; font-family: 'Segoe UI'; font-weight: bold">تاجر&nbsp;<i class="fa fa-star" style="color: #FFDF00;" aria-hidden="true"></i></a> خلال كل سنة. الحصول على رتبة تاجر يتطلب الحصول على</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey; margin-top: 1%; margin-bottom: 3%">
                    @foreach($rank_terms as $rank_term)
                        <li style="margin-top: 10px">{{$rank_term->body}}</li>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال شروط بعد</h5>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; color: darkgrey">: يمنح الموقع رتبة تاجر  <a class="btn btn-default" style="width: 80px; height: 35px; color: darkgrey; font-size: 16px; background-color: whitesmoke; font-family: 'Segoe UI'; font-weight: bold">تاجر&nbsp;<i class="fa fa-star" style="color: #FFDF00;" aria-hidden="true"></i></a> خلال كل سنة. الحصول على رتبة تاجر يتطلب الحصول على</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey; margin-top: 1%; margin-bottom: 3%">--}}
                {{--<li>الحصول على أكثر من 30 تقييم إيجابي خلال السنة.</li>--}}
                {{--<li style="margin-top: 10px">دفع العمولة المستحقة.</li>--}}
            {{--</ul>--}}
        </div>
    </div>
@endsection