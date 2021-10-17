@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h3 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">السلع والإعلانات الممنوعة</h3>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">السلع الممنوعة</h4>
            <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">السلعة الموضحة هي السلع الممنوعة في الموقع. هذه السلع ممنوع الاعلان عنها في الموقع و ممنوع ايضا شرائها عبر الموقع. نحن نقوم بحظر المعلن الذي يقوم بالاعلان عن هذه السلع و نقوم بحظر من يتجاوب معه عبر الرسائل الخاصة أو عبر الردود. نرجو ملاحظة ان ليس هناك تنبيه قبل الحظر وان الحظر نهائي لانقاش فيه</p>
            @if(count($not_allowed_goods) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: السلع الممنوعة هي</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($not_allowed_goods as $not_allowed_good)
                        <li style="margin-top: 10px">{{$not_allowed_good->description}}</li>
                    @endforeach
                </ul>
            @else
                <div class="col-md-12 col-xs-12" style="text-align: center; font-size: 25px; font-family: 'Segoe UI'; margin-bottom: 60px; color: darkgray; margin-bottom: 300px">لم يتم ادخال سلعة ممنوعة حتى الان</div>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: السلع الممنوعة هي</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">جميع السلع الممنوعة حسب قوانين المملكة العربية السعودية.</li>--}}
                {{--<li style="margin-top: 10px">التقسيط و المنتجات البنكية. هذه السلع ممنوعه حتى لوكانت تعتبر شرعية.</li>--}}
                {{--<li style="margin-top: 10px">الأدوية والمنتجات الطبية والصحية‫.‬ هذه السلع ممنوعه حتى لو كان مسموح بها في قوانين وزارة الصحة وحتى لو كانت سلع موصى بها من الوازرة.</li>--}}
                {{--<li style="margin-top: 10px">التسويق الشبكي‫.‬ يمنع نهائيا اي نوع من التسويق الشبكي مهما كان نوعه او صفته أو طريقته.</li>--}}
                {{--<li style="margin-top: 10px">الأسلحة بمافيها الصواعق والمسدسات و الرشاشات واسلحة الحماية الشخصية و مستلزماتها حتى لو كانت مرخصة.</li>--}}
                {{--<li style="margin-top: 10px">المنتجات الجنسية بكافة أشكالها وأنواعها‫.‬</li>--}}
                {{--<li style="margin-top: 10px">الأسهم و إدارة المحافظ والعملات وتسويقها وجميع مايتعلق بذلك.</li>--}}
                {{--<li style="margin-top: 10px">أجهزة الليزر وأجهزة التجسس و التنصت.</li>--}}
                {{--<li style="margin-top: 10px">المواقع والمنتديات والخدمات الإلكترونية والإيميلات وبيع العضويات والبرامج.</li>--}}
                {{--<li style="margin-top: 10px">بيع أي سلعه مجانية. مثال على ذلك الإيميلات وحسابات تويتر وانستقرام وغيرها.</li>--}}
                {{--<li style="margin-top: 10px">السلع التي فيها إعتداء على حقوق الملكية الفكرية مثلا البرامج المنسوخة والأفلام المنسوخة.</li>--}}
                {{--<li style="margin-top: 10px">منتجات التبغ</li>--}}
                {{--<li style="margin-top: 10px">الإعلان عن منتجات أو خدمات تتطلب ترخيص من دون الحصول على الترخيص من الجهة المنظمة.</li>--}}
                {{--<li style="margin-top: 10px">الأجهزة الممنوعة مثل: أجهزة التشويش أو التشفير أو تقوية إشارة الجوال.</li>--}}
                {{--<li style="margin-top: 10px">الأجهزة ذات المخاطر الأمنية.</li>--}}
                {{--<li style="margin-top: 10px">الإعلان عن شرائح اتصال او خدمات اتصالات من دون الحصول على التراخيص اللازمة و من دون رفعها <a href="/license" style="color: #0275d8;">لنظام التراخيص</a> بالموقع.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">الإعلانات الممنوعه</h4>
            @if(count($not_allowed_ads) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: القائمة التالية تحتوي على أغلب أساليب وطرق الإعلانات الممنوعه في الموقع</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($not_allowed_ads as $not_allowed_ad)
                        <li style="margin-top: 10px">{{$not_allowed_ad->description}}</li>
                    @endforeach
                </ul>
            @else
                <div class="col-md-12 col-xs-12" style="text-align: center; font-size: 25px; font-family: 'Segoe UI'; margin-bottom: 60px; color: darkgray; margin-bottom: 300px">لم يتم ادخال اعلانات ممنوعة حتى الان</div>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">القائمة التالية تحتوي على أغلب أساليب وطرق الإعلانات الممنوعه في الموقع:</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">جميع الإعلانات التي لاتتعلق بالبيع والشراء.</li>--}}
                {{--<li style="margin-top: 10px">طرح مواضيع في الموقع.</li>--}}
                {{--<li style="margin-top: 10px">الإعلان لأجل إضافة إقتراح او مناقشة مشكلة مع الإدارة في الموقع‫.‬ الإعلانات مخصصة للبيع والشراء فقط‫.‬ إضافة إعلانات عن إقتراحات لتطوير الموقع في المعروضات يلحق الضرر بإعلانات المعلنين في الموقع‫.‬ أفضل طريقة للإقتراح أو الشكوى هي الإتصال بنا عبر نموذج اتصل بنا‫.‬</li>--}}
                {{--<li style="margin-top: 10px">الإعلان غير مكتمل التفاصيل.</li>--}}
                {{--<li style="margin-top: 10px">إعلان ضعيف الجودة‫.‬</li>--}}
                {{--<li style="margin-top: 10px">ضعف تواصل المعلن مع الاعضاء المهتمين بالسلعه المعروضة‫.‬ مثلا معلن يعلن بيع سياره ثم لايقوم بالرد على الاتصالات او الرد على الرسائل الخاصة‫.‬</li>--}}
                {{--<li style="margin-top: 10px">الإعلان في قسم خطأ‫.‬ مثلا الإعلان عن طلب سياره في المعروضات‫.‬ أو مثلا إعلان عن بيع أثاث في قسم حراج السيارات‫.‬ او مثلا الإعلان عن جيب شيروكي للبيع في قسم فورد‫.‬</li>--}}
                {{--<li style="margin-top: 10px">إضافة إعلان ولديك عضوية أخرى محظورة. يجب أولا مناقشة الحظر معنا قبل إضافة إي اعلان جديد.</li>--}}
                {{--<li style="margin-top: 10px">إضافة صورة ليست لنفس السلعه إذا كانت السلعة سيارة حتى لو كان لغرض التوضيح.</li>--}}
                {{--<li style="margin-top: 10px">إضافة صور لسلعة أخرى غير المعروضة. مثلا معلن يعلن عن بيع جوال مستعمل ثم يعرض صورة لجوال مستعمل اخر من نفس النوع.</li>--}}
                {{--<li style="margin-top: 10px">إي إعلان يحتوي على إشارة لأي أمر عنصري بكافة أشكاله.</li>--}}
                {{--<li style="margin-top: 10px">إي إعلان يحتوي على معلومات خطأ سواء كان الخطأ مقصود أو غير مقصود‫.‬ مثلا معلن يعلن عن سياره ويذكر انها لم تتعرض لحادث ثم بعد ذلك يثبت أن السياره قد تعرضت لحادث‫.‬ يجب على المعلن عدم إضافة أي معلومة عن السلعه إلا التي هو متأكد منها‫.‬</li>--}}
                {{--<li style="margin-top: 10px">إضافة إعلان بغرض التشهير. إذا كانت لديك شكوى ضد معلن لدينا نرجو مراسلتنا وتوضيح المشكلة. إذا كانت لديك مشكلة مع جهة لاعلاقه لنا بها نرجو الشكوى لدى الجهة المسؤولة عن ذلك.</li>--}}
                {{--<li style="margin-top: 10px">إضافة عنوان إعلان مخالف لمحتوى الإعلان‫.‬ مثلا معلن يكتب في العنوان‫:‬ كامري 2011 ثم في الإعلان يعلن عن طلب كامري 2011‫.‬ الزائر عندما يرى العنوان سيعتقد ان هناك عرض عن كامري 2011</li>--}}
                {{--<li style="margin-top: 10px">نسخ إعلان لمعلن آخر او جزء منه.</li>--}}
                {{--<li style="margin-top: 10px">الإعلانات العامة التي لايتم تحديد السلعه بعينها مثل‫:‬ الإعلان بعنوان ‫(‬يوجد لدينا اراضي للبيع‫)‬ او مثلا الإعلان بعنوان يوجد في معرضنا سيارات للبيع‫.‬ الصحيح هو الإعلان عن السلعه ذاتها مثلا يوجد لدينا ارض للبيع مساحة كذا وكذا في حي كذا وكذا بمدينة الرياض مثلا‫.‬ او يوجد لدينا سياره موديل كذا وكذا‫.‬</li>--}}
                {{--<li style="margin-top: 10px">إعلانات التبرع وطلب المساعدة. نظام الدوله يمنع التبرع والعمل الخيري خارج النطاق القانوني المحدد المخصص لذلك.</li>--}}
                {{--<li style="margin-top: 10px">الإعلانات عن مساهمات وإشتراكات.</li>--}}
                {{--<li style="margin-top: 10px">التوسل ومساعدة المتسولين . نحن نقوم بحظر العضو الذي يقوم مساعدة المتسولين في الموقع.</li>--}}
                {{--<li style="margin-top: 10px">طلب الواسطة والمساعدات سواء كانت مشروعه أو غير مشروعه. الموقع للسلع فقط.</li>--}}
                {{--<li style="margin-top: 10px">الإعلانات التي تحتوي على سوء إستغلال سلطة.</li>--}}
                {{--<li style="margin-top: 10px">الإعلان في الردود.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">الردود الممنوعة</h4>
            @if(count($not_allowed_replies) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: القائمة التالية تحتوي على أغلب الردود الممنوعة</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($not_allowed_replies as $not_allowed_reply)
                        <li style="margin-top: 10px">{{$not_allowed_reply->description}}</li>
                    @endforeach
                </ul>
            @else
                <div class="col-md-12 col-xs-12" style="text-align: center; font-size: 25px; font-family: 'Segoe UI'; margin-bottom: 60px; color: darkgray; margin-bottom: 300px">لم يتم ادخال ردود ممنوعة حتى الان</div>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">القائمة التالية تحتوي على أغلب الردود الممنوعة:</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">الإعلان في الردود.</li>--}}
                {{--<li style="margin-top: 10px">البخس.</li>--}}
                {{--<li style="margin-top: 10px">السب و الشتم سواء كان هناك مبرر ام يكن هناك مبرر.</li>--}}
                {{--<li style="margin-top: 10px">عدم الجدية و عدم الرغبة في الشراء.</li>--}}
                {{--<li style="margin-top: 10px">التعليق لاجل اضافة نكته او سالفة او خبر. الموقع للبيع والشراء فقط.</li>--}}
                {{--<li style="margin-top: 10px">الاستهزاء بالسلعة او المعلن.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right" style="margin-bottom: 40px">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">الرسائل الخاصة الممنوعة</h4>
            @if(count($not_allowed_messages) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: القائمة التالية تحتوي على أغلب الرسائل الخاصة الممنوعة</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($not_allowed_messages as $not_allowed_message)
                        <li style="margin-top: 10px">{{$not_allowed_message->description}}</li>
                    @endforeach
                </ul>
            @else
                <div class="col-md-12 col-xs-12" style="text-align: center; font-size: 25px; font-family: 'Segoe UI'; margin-bottom: 60px; color: darkgray; margin-bottom: 300px">لم يتم ادخال رسائل ممنوعة حتى الان</div>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">القائمة التالية تحتوي على أغلب الرسائل الخاصة الممنوعة:</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">الإعلان في الرسائل الخاصة.</li>--}}
                {{--<li style="margin-top: 10px">السب و الشتم سواء كان هناك مبرر ام يكن هناك مبرر.</li>--}}
            {{--</ul>--}}
        </div>
    </div>
@endsection