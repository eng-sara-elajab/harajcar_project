@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-12 col-xs-12">
            <h2 style="text-align: center; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">عضوية معارض السيارات</h2>
        </div>
        <div class="col-md-12 col-xs-12 row">
            <div class="col-md-5 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; height: 400px">
                <i class="fa fa-star fa-3x" aria-hidden="true" style="display: inline-block; border-radius: 50%; box-shadow: 0px 0px 2px #0275d8; padding: 0.5em 0.6em; margin-left: 41%; margin-top: 5%; background-color: #cbe6ef; color: #0275d8"></i><br>
                <h4 style="text-align: center; color: #24a0ed; font-weight: bold">مزايا العضوية</h4><br>
                @if(count($membership_features) > 0)
                    <ul dir="rtl" style="font-family: 'Segoe UI'; font-size: 15px">
                        @foreach($membership_features as $membership_feature)
                            <li style="margin-top: 15px">{{$membership_feature->body}}</li>
                        @endforeach
                    </ul>
                @else
                    <h4 style="color: darkorange; margin-top: 2%; text-align: center">لم يتم إضافة مزايا حتى الآن</h4>
                @endif
                {{--<ul dir="rtl" style="font-family: 'Segoe UI'; font-size: 15px">--}}
                    {{--<li style="margin-top: 15px">العمولة مجانية على الاعلانات المعلن عنها خلال فترة الإشتراك. الاعلانات التي ليست خلال تلك الفترة توجد عليها عمولة.</li>--}}
                    {{--<li style="margin-top: 15px">امكانية اضافة 4 اعلانات في اليوم.</li>--}}
                    {{--<li style="margin-top: 15px">إمكانية حذف الردود.</li>--}}
                    {{--<li style="margin-top: 15px">وجود علامة تسجيل العمولة في رابط العضوية ممايزيد ثقة الزبائن.</li>--}}
                {{--</ul>--}}
            </div>
            <div class="col-md-5 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; height: 400px">
                <i class="fa fa-credit-card fa-3x" aria-hidden="true" style="display: inline-block; border-radius: 50%; box-shadow: 0px 0px 2px #0275d8; padding: 0.5em 0.6em; margin-left: 41%; margin-top: 5%; background-color: #cbe6ef; color: #0275d8"></i><br>
                <h4 style="text-align: center; color: #24a0ed; font-weight: bold">عن العضوية</h4><br>
                <ul dir="rtl" style="font-family: 'Segoe UI'; font-size: 15px">
                    <li style="margin-top: 15px">هذة العضوية هي عضوية مدفوعة تناسب احتياج كل معلن يقوم بتسويق سلع كثيرة و مرتفعة الثمن مثل السيارات و العقارات.</li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; height: 400px; width: 88%">
            <h4 style="text-align: center; font-family: 'Segoe UI'; font-weight: bold; color: #0275d8; margin-top: 5%">أسعار الاشتراكات</h4>
            <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true" style="display: inline-block; border-radius: 50%; box-shadow: 0px 0px 2px #0275d8; padding: 0.5em 0.6em; margin-left: 32%; margin-top: 5%; background-color: #e5f4fe; color: #0275d8"></i>
            </div>
            <div class="col-md-12 col-xs-12">
                <p style="text-align: center; font-family: 'Segoe UI'; font-weight: bold; color: #0275d8; margin-top: 3%; font-size: 22px"><span style="background-color: #e5f4fe; border-radius: 5px; padding-top: 10px; padding-bottom: 10px">&nbsp;&nbsp;&nbsp;&nbsp;اشتراك لمدة سنة بسعر {{$membership_price == null ? 'غير محدد' : $membership_price->price}} ريال&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
            </div>
            <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                <a class="btn btn-primary btn-block" href="/membership/subscribe" style="font-size: 18px; font-family: 'Segoe UI'; color: white; margin-top: 2%; border-radius: 5px">الاشتراك الآن لمدة سنة</a>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; height: 400px; width: 88%">
            <h4 style="text-align: right; color: #24a0ed; font-weight: bold; margin-top: 3%; margin-bottom: 3%">شروط العضوية</h4>
            @if(count($membership_terms) > 0)
                <ul dir="rtl" style="font-family: 'Segoe UI'; font-size: 15px">
                    @foreach($membership_terms as $membership_term)
                        <li style="margin-top: 15px">{{$membership_term->body}}</li>
                    @endforeach
                </ul>
            @else
                <h4 style="color: darkorange; margin-top: 2%; text-align: center">لم يتم إضافة شروط حتى الآن</h4>
            @endif
            {{--<ul dir="rtl" style="font-family: 'Segoe UI'; font-size: 15px">--}}
                {{--<li style="margin-top: 15px">يجب على المشترك وجود أكثر من 3 اعلانات مصورة كل أسبوع خلال فترة الاشتراك.</li>--}}
                {{--<li style="margin-top: 15px">عدم الاعلان للغير.</li>--}}
                {{--<li style="margin-top: 15px">عدم تكرار الإعلان عن نفس السلعة أكثر من مره خلال يومين.</li>--}}
                {{--<li style="margin-top: 15px">عدم التنازل عن العضوية لعضو آخر او بيع العضوية.</li>--}}
                {{--<li style="margin-top: 15px">ذكر سعر السلعة.</li>--}}
                {{--<li style="margin-top: 15px">الرد على رسائل اعضاء الموقع عبر الرسائل الخاصة.</li>--}}
                {{--<li style="margin-top: 15px">الرد على استفسارات اعضاء الموقع عبر الردود.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12" style="margin-bottom: 5%">
            @if(count($membership_faqs) > 0)
                @foreach($membership_faqs as $membership_faq)
                    <span style="opacity: 0">{{$i++}}</span>
                    <div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 4%; background-color: white; border-radius: 15px; display: inline-block; width: 90%">
                        <i class="fa fa-question-circle pull-right" style="font-size: 20px; margin-top: 45px; margin-bottom: 40px; display: inline-block; color: #0275d8" aria-hidden="true"></i>
                        <a class="pull-right" style="font-family: 'Segoe UI'; font-size: 20px; margin-top: 40px; margin-bottom: 40px; display: inline-block; text-decoration: none">{{$membership_faq->question}}</a>
                        <div class="pull-left" style="display: inline-block">
                            <a onclick="myFunction{{$i}}()"><i class="fa fa-angle-down fa-3x" style="color: white; margin-top: 45px; margin-bottom: 40px; border-radius: 50%; background-color: lightgrey; margin-left: 50%" aria-hidden="true"></i></a>
                        </div>
                        <div id="myDIV{{$i}}" style="display: none">
                            <br><br><br><br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: #5cb85c; margin-right: 1%">{{$membership_faq->answer}}</p><br>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        {{--<div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; width: 88%">--}}
            {{--<i class="fa fa-question-circle pull-right" style="font-size: 20px; margin-top: 45px; margin-bottom: 40px; display: inline-block; color: #0275d8" aria-hidden="true"></i>--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 20px; margin-top: 40px; margin-bottom: 40px; display: inline-block; text-decoration: none">هل الاشتراك اجباري؟</a>--}}
            {{--<div class="pull-left" style="display: inline-block">--}}
                {{--<a onclick="myFunction1()"><i class="fa fa-angle-down fa-3x" style="color: white; margin-top: 45px; margin-bottom: 40px; border-radius: 50%; background-color: lightgrey; margin-left: 50%" aria-hidden="true"></i></a>--}}
            {{--</div>--}}
            {{--<div id="myDIV1" style="display: none; margin-top: 10%">--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: #5cb85c; margin-right: 2%">الاشتراك اختياري وليس اجباري. الجهة التي لاترغب في الاشتراك في هذة الخدمة بالامكان ان تستمر باستخدام العضوية العادية (ذات العمولة)</p><br>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; width: 88%">--}}
            {{--<i class="fa fa-question-circle pull-right" style="font-size: 20px; margin-top: 45px; margin-bottom: 40px; display: inline-block; color: #0275d8" aria-hidden="true"></i>--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 20px; margin-top: 40px; margin-bottom: 40px; display: inline-block; text-decoration: none">هل هذة العضوية تناسبني؟</a>--}}
            {{--<div class="pull-left" style="display: inline-block">--}}
                {{--<a onclick="myFunction2()"><i class="fa fa-angle-down fa-3x" style="color: white; margin-top: 45px; margin-bottom: 40px; border-radius: 50%; background-color: lightgrey; margin-left: 50%" aria-hidden="true"></i></a>--}}
            {{--</div>--}}
            {{--<div id="myDIV2" style="display: none; margin-top: 10%">--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: #5cb85c; margin-right: 2%">. اذا كنت تقوم بتسويق سلع كثيرة و مرتفعة الثمن فإن هذة العضوية مناسبة لك</p><br>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; width: 88%">--}}
            {{--<i class="fa fa-question-circle pull-right" style="font-size: 20px; margin-top: 45px; margin-bottom: 40px; display: inline-block; color: #0275d8" aria-hidden="true"></i>--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 20px; margin-top: 40px; margin-bottom: 40px; display: inline-block; text-decoration: none">لايوجد لدي معرض أو مكتب فهل يحق لي الاشتراك؟</a>--}}
            {{--<div class="pull-left" style="display: inline-block">--}}
                {{--<a onclick="myFunction3()"><i class="fa fa-angle-down fa-3x" style="color: white; margin-top: 45px; margin-bottom: 40px; border-radius: 50%; background-color: lightgrey; margin-left: 50%" aria-hidden="true"></i></a>--}}
            {{--</div>--}}
            {{--<div id="myDIV3" style="display: none; margin-top: 10%">--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: #5cb85c; margin-right: 2%">نعم</p><br>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; width: 88%">--}}
            {{--<i class="fa fa-question-circle pull-right" style="font-size: 20px; margin-top: 45px; margin-bottom: 40px; display: inline-block; color: #0275d8" aria-hidden="true"></i>--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 20px; margin-top: 40px; margin-bottom: 40px; display: inline-block; text-decoration: none">هل سيتم إيقاف العضوية اذا لم يتم الاشتراك؟</a>--}}
            {{--<div class="pull-left" style="display: inline-block">--}}
                {{--<a onclick="myFunction4()"><i class="fa fa-angle-down fa-3x" style="color: white; margin-top: 45px; margin-bottom: 40px; border-radius: 50%; background-color: lightgrey; margin-left: 50%" aria-hidden="true"></i></a>--}}
            {{--</div>--}}
            {{--<div id="myDIV4" style="display: none; margin-top: 10%">--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: #5cb85c; margin-right: 2%">لا</p><br>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; width: 88%">--}}
            {{--<i class="fa fa-question-circle pull-right" style="font-size: 20px; margin-top: 45px; margin-bottom: 40px; display: inline-block; color: #0275d8" aria-hidden="true"></i>--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 20px; margin-top: 40px; margin-bottom: 40px; display: inline-block; text-decoration: none">هل سيتم إيقاف العضوية عند انتهاء الاشتراك؟</a>--}}
            {{--<div class="pull-left" style="display: inline-block">--}}
                {{--<a onclick="myFunction5()"><i class="fa fa-angle-down fa-3x" style="color: white; margin-top: 45px; margin-bottom: 40px; border-radius: 50%; background-color: lightgrey; margin-left: 50%" aria-hidden="true"></i></a>--}}
            {{--</div>--}}
            {{--<div id="myDIV5" style="display: none; margin-top: 10%">--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: #5cb85c; margin-right: 2%">. لن يتم إيقاف العضوية لكن العضوية سوف تتحول الى العضوية العادية ذات العمولة</p><br>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 20px; margin-left: 5%; background-color: white; border-radius: 15px; display: inline-block; width: 88%">--}}
            {{--<i class="fa fa-question-circle pull-right" style="font-size: 20px; margin-top: 45px; margin-bottom: 40px; display: inline-block; color: #0275d8" aria-hidden="true"></i>--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 20px; margin-top: 40px; margin-bottom: 40px; display: inline-block; text-decoration: none">هل يمكن أن يشترك أكثر من شخص في عضوية واحدة؟</a>--}}
            {{--<div class="pull-left" style="display: inline-block">--}}
                {{--<a onclick="myFunction6()"><i class="fa fa-angle-down fa-3x" style="color: white; margin-top: 45px; margin-bottom: 40px; border-radius: 50%; background-color: lightgrey; margin-left: 50%" aria-hidden="true"></i></a>--}}
            {{--</div>--}}
            {{--<div id="myDIV6" style="display: none; margin-top: 10%">--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right; color: #5cb85c; margin-right: 2%">. لا، العضوية خاصة بعضو واحد</p><br>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-12 col-xs-12" style="margin-top: 40px; text-align: center; margin-bottom: 80px">--}}
            {{--<a href="#" style="font-size: 16px; font-family: 'Segoe UI'; color: #0275d8">هل لديك استفسار او ملاحظة؟</a>--}}
        {{--</div>--}}
    </div>
@endsection