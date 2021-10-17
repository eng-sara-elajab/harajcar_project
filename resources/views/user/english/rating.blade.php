@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h3 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">نظام التقييم - موقع حراج</h3>
            <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">التقييم هو خلاصة تجربة المشتري في الشراء من البائع. هذا الأمر يتطلب أن يكون المشتري فعلا قام بالشراء من البائع. حاليا حسب نظام الموقع لايوجد ضمان بأن المشتري قد قام بالشراء من البائع لذلك تم الإعتماد على الذمة بناء على تجربتنا في التعامل مع المشتري والبائع.</p>
        </div>
        <div class="col-md-12 col-xs-12 pull-right" style="margin-top: 2%">
            <h4 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">شروط الإنضمام لنظام التقييم للتجار</h4>
            @if(count($rating_joining_terms))
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($rating_joining_terms as $rating_joining_term)
                        <li style="margin-top: 10px">{{$rating_joining_term->body}}</li>
                    @endforeach
                </ul>
            @else
                <h3 style="text-align: right; color: darkorange; margin-right: 7%; margin-top: 2%">لم يتم إدخال الشروط بعد</h3>
            @endif
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
            {{--<li style="margin-top: 10px">توثيق العضوية بالجوال.</li>--}}
            {{--<li style="margin-top: 10px">يجب أن تكون مضت مدة ٣ شهور على إنضمام التاجر للموقع.</li>--}}
            {{--<li style="margin-top: 10px">يجب أن يكون مجموع عمولات البائع أكثر من الحد الأدنى لجموع العمولات. نعتذر عن نشر الحد الأدنى لتفادي محاولات التلاعب بالنظام.</li>--}}
            {{--<li style="margin-top: 10px">يجب أن يكون عدد عمولات البائع أكثر من الحد الأدنى من العمولات. نعتذر عن نشر الحد الأدنى لتفادي محاولات التلاعب بالنظام.</li>--}}
            {{--<li style="margin-top: 10px">يجب وجود إعلانات للبائع.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; margin-right: 4%; font-weight: bold">شروط قبول تقييم عضو</h4>
            @if(count($rating_acceptance_terms))
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($rating_acceptance_terms as $rating_acceptance_term)
                        <li style="margin-top: 10px">{{$rating_acceptance_term->body}}</li>
                    @endforeach
                </ul>
            @else
                <h3 style="text-align: right; color: darkorange; margin-right: 7%; margin-top: 2%">لم يتم إدخال الشروط بعد</h3>
            @endif
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey; margin-top: 1%; margin-bottom: 3%">--}}
            {{--<li style="margin-top: 10px">توثيق العضوية بالجوال.</li>--}}
            {{--<li style="margin-top: 10px">التعهد بقيام المٌقيم بالشراء سابقا من البائع وذكر معلومات صحيحة.</li>--}}
            {{--<li style="margin-top: 10px">يجب أن يكون مضت مدة ٣ شهور على إنضمام المٌقيم للموقع.</li>--}}
            {{--<li style="margin-top: 10px">مجموع عمولات المٌقيم يجب أن يكون أكثر من الحد الأدنى لجموع العمولات. نعتذر عن نشر الحد الأدنى لتفادي محاولات التلاعب بالنظام.</li>--}}
            {{--<li style="margin-top: 10px">في حالة التقييم السلبي، يجب أن يكون عدد عمولات المٌقيم أكثر من الحد الأدنى من العمولات. نعتذر عن نشر الحد الأدنى لتفادي محاولات التلاعب بالنظام.</li>--}}
            {{--<li style="margin-top: 10px">في حالة التقييم السلبي،يجب ان يكون سبق للمٌقيم الإعلان في الموقع.</li>--}}
            {{--<li style="margin-top: 10px">يجب أن لايكون للمٌقيم أكثر من ٤ بلاغات عن ردود مخالفة خلال آخر ١٥ يوم.</li>--}}
            {{--<li style="margin-top: 10px">يجب أن يكون التاجر الذي يرغب المٌقيم بتقييمه لم يقم بتقييم المٌقيم خلال آخر أسبوعين عن طريق عضويته أو العضويات المرتبطة بعضويته.</li>--}}
            {{--<li style="margin-top: 10px">يجب أن لايكون للمٌقيم تقييم سابق لنفس التاجر بعضويته أو للعضويات المرتبطة بعضويته.</li>--}}
            {{--<li style="margin-top: 10px">لايمكن للمٌقيم تقييم تاجر قام بمنعه من الرد على إعلاناته.</li>--}}
            {{--<li style="margin-top: 10px">لايمكن للمٌقيم التقييم اذا قام بالتقييم السلبي بشكل غير طبيعي لتجار آخرين.</li>--}}
            {{--<li style="margin-top: 10px">لايمكن للمٌقيم التقييم في حالة قيام عدد كبير من الاعضاء بتقييمه بشكل سلبي.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right" style="margin-bottom: 20px">
            @if($rating_faqs !== null)
                @foreach($rating_faqs as $rating_faq)
                    <span style="opacity: 0">{{$i++}}</span>
                    <div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">
                        <a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">{{$rating_faq->question}}</a>
                        <a class="pull-right" onclick="myFunction{{$i}}()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>
                        <div id="myDIV{{$i}}" style="display: none">
                            <br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">{{$rating_faq->answer}}</p><br>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 style="text-align: right; color: darkorange; margin-right: 7%; margin-top: 2%">لا توجد أسئلة حتى الآن</h3>
            @endif
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">هل نظام التقييم مضمون؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction7()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV7" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">. نظام التقييم ليس دقيقا للدرجة التي تصل إلى ضمان عملية البيع. نحن لانقدم أي ضمان لأي نوع من البيع حاليا</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">هل يقوم الموقع بتغيير تقييم معين؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction8()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV8" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">الموقع لايقوم بتغيير أي تقييم.</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">هل يقوم الموقع برفض تقييم معين؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction9()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV9" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">جميع التقييمات تخضع لمراجعة المشرفين قبل تفعيلها وذلك لغرض التأكد من صحة المعلومات الموجودة. يقوم الموقع برفض أي تقييم يحتوي على أي معلومة خاطئة او أي معلومة مشكوك فيها.</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">هل يستطيع البائع تغيير تقييم معين؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction10()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV10" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">البائع لايستطيع تغيير أي تقييم. يستطيع البائع الرد على أي تقييم سلبي.</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">هل يستطيع البائع إزالة تقييم سلبي؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction11()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV11" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">البائع لايستطيع إزالة أي تقييم سلبي.</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">ماذا يترتب على الغش في عملية التقييم؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction12()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV12" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">عند قيام أي عضو بمحاولة الغش او الغش فعلا في نظام التقييم سوف نقوم بحظر عضويته وإضافة أرقامه للقائمة السوداء ورفع قضية ضده إن لزم الإمر حسب قوانين مكافحة جرائم المعلوماتية في السعودية.</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">كيف أقوم بتقييم عضو معين؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction13()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV13" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">لتقييم عضو نرجو الضغط على أسم العضو وستجد رابط التقييم.</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">هل معلوماتي الشخصية مثل رقم الجوال ستظهر في التقييم؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction14()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV14" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">عندما تقوم بالتقييم سوف يظهر أسمك ولن يظهر رقم جوالك.</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 pull-right" style="margin-right: 4%; margin-top: 1%">--}}
            {{--<a class="pull-right" style="font-family: 'Segoe UI'; font-size: 16px; text-decoration: none; color: #0275d8">كيف اعترض على تقييم سلبي؟</a>--}}
            {{--<a class="pull-right" onclick="myFunction15()"><i class="fa fa-angle-down fa-1x" style="color: #0275d8; margin-right: 10px; margin-top: 7px" aria-hidden="true"></i></a>--}}
            {{--<div id="myDIV15" style="display: none">--}}
            {{--<br><br><p class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">للاعتراض على تقييم سلبي، يجب اولا الرد على التقييم ثم الضغط على زر الاعتراض الذي سيظهر اسفل ردك.</p><br>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection