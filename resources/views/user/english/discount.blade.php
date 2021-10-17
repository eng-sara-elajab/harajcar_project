@extends('layouts.user_english')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h2 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">نظام الخصم</h2>
        </div>
        <div class="col-md-12 col-xs-12 pull-right" style="margin-top: 1%">
            <h4 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">ماهو نظام الخصم؟</h4>
            <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkgrey">. نظام الخصم هو نظام خصم من العمولة من النسبة الأساسية 1% إلى نسبة أقل يحددها نظام الخصم بناء على تعامل المعلن معنا. الخصم خاص بعملاء السيارات والشاحنات والعقارات فقط</p>
        </div>
        <div class="col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1">
            <hr style="opacity: 0.2; border: solid 1px darkgrey; margin-right: 4%">
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">لمن نظام الخصم؟</h4>
            <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkgrey">. نظام الخصم موجه لجميع المعلنين في مجال السيارات والعقارات سواء كانوا أفراد مستخدمين أو تجار أو مسوقين أو معارض سيارات أو وكلاء سيارات</p>
        </div>
        <div class="col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1">
            <hr style="opacity: 0.2; border: solid 1px darkgrey; margin-right: 4%">
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">ماهي العوامل التي يعتمد عليها الخصم؟</h4>
            @if(count($discount_factors) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkgrey">: العوامل التي يعتمد عليها نظام الخصم هي</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($discount_factors as $discount_factor)
                        <li style="margin-top: 10px">{{$discount_factor->body}}</li>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkorange">لا توجد عوامل مدخلة حتى الآن</h5>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkgrey">: العوامل التي يعتمد عليها نظام الخصم هي</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
            {{--<li style="margin-top: 10px">عدد المبيعات وقيمتها.</li>--}}
            {{--<li style="margin-top: 10px">دفع العمولة في وقتها يزيد من نسبة الخصم. تأخير دفع العمولة يقلل من نسبة الخصم أو ربما يلغيها.</li>--}}
            {{--<li style="margin-top: 10px">عدم وجود أو قلة وجود شكاوي من الاعضاء ضد المعلن.</li>--}}
            {{--<li style="margin-top: 10px">عدم بخس سلع المعلنين الاخرين.</li>--}}
            {{--<li style="margin-top: 10px">عدم طلب الخصم خارج نطاق نظام الخصم.</li>--}}
            {{--<li style="margin-top: 10px">عدم طلب العمولة من المشتري. سيتم الغاء الخصم في هذه الحالة وعدم اعطاء خصم مستقبلا.</li>--}}
            {{--<li style="margin-top: 10px">التناسب بين عدد الاعلانات والبيع. عندما يكون عدد الاعلانات قليل والبيع عالي تزيد نسبة الخصم والعكس صحيح.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1">
            <hr style="opacity: 0.2; border: solid 1px darkgrey; margin-right: 4%">
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">كيف ومتى أحصل على الخصم؟</h4>
            <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkgrey">. يتم الحصول على الخصم بعد دفع أول عمولة بيع. نظام الخصم يقوم بإحتساب الخصم بشكل الي كل أسبوع ويتم إبلاغك عند دفع العمولة و قبل الإعلان وعبر نظام الإشعارات عند الحصول على خصم</p>
        </div>
        <div class="col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1">
            <hr style="opacity: 0.2; border: solid 1px darkgrey; margin-right: 4%">
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">هل لدي خصم في الوقت الحالي؟</h4>
            @if(Auth::user())
                @if(Auth::user()->discount == null || Auth::user()->discount == 0)
                    <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkgrey">&nbsp;&nbsp;نعتذر لايوجد لك خصم في الوقت الحالي. مستقبلا سيتم إحتساب الخصم لك بشكل الي بناء على العوامل التي يعتمد عليها نظام الخصم والموضحة في الأعلى&nbsp;&nbsp;</p>
                @else
                    <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkgrey">&nbsp;&nbsp;نعم لديك خصم بنسبة {{Auth::user()->discount.'%'}} يتغير كل فترة بناءاً على العوامل المذكورة أعلاه&nbsp;&nbsp;</p>
                @endif
            @else
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: black; font-weight: bold"><span style="background-color: #FFC0CB">&nbsp;&nbsp;نرجو تسجيل الدخول اذا كانت لديك عضوية في الموقع حتى إذا كان لك خصم يتم حسابه لك&nbsp;&nbsp;</span></p>
            @endif
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey; margin-bottom: 2%"><span style="background-color: #d4ebf2; color: #696969; font-weight: bold; font-family: 'Segoe UI'">&nbsp;&nbsp;:ملاحظات&nbsp;&nbsp;</span></p>
            @if(count($discount_notes) > 0)
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($discount_notes as $discount_note)
                        <li style="margin-top: 10px">{{$discount_note->body}}</li>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkorange">لا توجد ملاحظات مدخلة حتى الآن</h5>
            @endif
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
            {{--<li style="margin-top: 10px">الخصم المعطى هو لعضوية واحدة لمعلن واحد. اي ان الخصم المعطى لعضو هو خاص بالعضو ولايشمل الاعضاء الآخرين.</li>--}}
            {{--<li style="margin-top: 10px">نسبة الخصم نسبة متغيرة وليست ثابته ، قد ترتفع مع الوقت أو قد تنقص</li>--}}
            {{--</ul>--}}
        </div>
    </div>
@endsection