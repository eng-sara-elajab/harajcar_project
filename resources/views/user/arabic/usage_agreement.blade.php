@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h3 style="text-align: right; color: darkgrey; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%">اتفاقية الاستخدام</h3>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">مقدمة</h4>
            @if($definition !== null)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">{{$definition->introduction}}</p>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال المقدمة بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">. إن اتفاقية الاستخدام هذه وخصوصية الاستخدام ، والشروط والبنود ، وجميع السياسات التي تم نشرها على <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> وضعت لحماية وحفظ حقوق كل من ( <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> ) و ( <span style="font-weight: bold">المستخدم</span> الذي يصل إلى الموقع بتسجيل او من دون تسجيل )أو ( العميل المستفيد من الإعلانات بتسجيل أو من دون تسجيل)</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">. تم إنشاء الاتفاقية بناء على نظام التعاملات الإلكترونية. تخضع البنود والشروط والأحكام والمنازعات القانونية للقوانين والتشريعات والأنظمة المعمول بها في المملكة العربية السعودية</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">. لكونك مستخدم فأنك توافق على الالتزام بكل ما يرد بهذه الاتفاقية في حال استخدامك للموقع او في حال الوصول اليه او في حالة التسجيل في الخدمة. يحق لموقع حراج التعديل على هذه الاتفاقية في أي وقت وتعتبر ملزمة لجميع الأطراف بعد الإعلان عن التحديث في الموقع أو في أي وسيلة أخرى</p>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">تعريف</h4>
            @if($definition !== null)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">{{$definition->definition}}</p>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال التعريف بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> هي الجهة المالكة لموقع حراج ، مؤسسة سعودية ١٠٠ ٪ مقرها الرئيسي الرياض وهي منصة الكترونية تمكن المستخدم (منشئ السجل الإلكتروني ) من فتح محل إلكتروني لتقديم خدماته وإيصالها للعميل المستهدف (مستقبل السجل الإلكتروني ) وفق شروط وضوابط محددة وتحت مسؤوليته. ويشار إليها بهذه الاتفاقية باسم ( <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> ) أو ( نحن ) أو ( لنا ) أو ( موقع حراج ) ، وتمثل هنا الطرف الأول.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">المستخدم هو ( الفرد او المؤسسة أو الشركة ) المنشئ للسجل الإلكتروني الذي يصل إلى الموقع ويستفيد من خدماته بشكل مباشر أو غير مباشر ، ويشار إليه بالعضو أو الطرف الثاني, ويعتبر هو المسؤول عن محتوى الإعلان مسؤولية كاملة وملتزم بضوابط وشروط المحتوى الموضحة من قبل الموقع ويتحمل تبعات وأضرار محتوى الإعلان.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">العميل: هو الجهة (الفرد أو المؤسسة أو الشركة) التي ينتهي إليه السجل الإلكتروني ، والمستهدفة من قبل المستخدم (منشئ السجل الإلكتروني ). السجل الإلكتروني: هو البيانات التي تنشأ أو تحفظ أو ترسل من قبل المستخدم ( منشئ السجل الإلكتروني ) وتكون على شكل تقديم خدمة أو طلب خدمة او ردود او رسائل خاصة.</p>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">شروط الاستخدام</h4>
            @if(count($usage_terms)>0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: بصفتك طرف ثاني في هذه الاتفاقية فإنه بموافقتك على الاستفادة من خدمات الموقع فعليك الالتزام بما يلي</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($usage_terms as $term)
                        <li style="margin-top: 10px">{{$term->body}}</li>
                    @endforeach
                </ul>
                <p style="text-align: right; font-family: 'Segoe UI'; margin-top: 2%; color: darkgrey; margin-right: 5%">إن عدم التزامك بتلك الشروط يمنح <span style="font-weight: bold">{{$website_data->arabic_name}}</span> الحق كاملا بحجب عضويتك ومنعك من الوصول للموقع دون الحاجة لإخطارك بذلك وأنت هنا تتعهد بعدم العودة لاستخدام الموقع إلى بعد موافقة الموقع على ذلك.</p>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال شروط الاستخدام بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: بصفتك طرف ثاني في هذه الاتفاقية فإنه بموافقتك على الاستفادة من خدمات الموقع فعليك الالتزام بما يلي</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li>بعدم الإعلان أو تحميل محتوى أو عناصر غير ملائمة للتصنيفات المتاحة في الموقع و المسموح ببيعها. وعليك مراجعة شروط الإعلان و السلع الممنوعة. بعدم الاختراق أو التحايل على قوانين وسياسة وأنظمة الموقع أو أي حقوق تتعلق بطرف ثالث.</li>--}}
                {{--<li style="margin-top: 10px">بعدم نسخ الإعلان من <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> هي الجهة المالكة لموقع حراج ، مؤسسة سعودية ١٠٠ ٪ مقرها الرئيسي الرياض وهي منصة الكترونية تمكن المستخدم (منشئ السجل الإلكتروني ) من فتح محل إلكتروني لتقديم خدماته وإيصالها للعميل المستهدف (مستقبل السجل الإلكتروني ) وفق شروط وضوابط محددة وتحت مسؤوليته. ويشار إليها بهذه الاتفاقية باسم (  وإعادة نشرها في مواقع أخرى.</li>--}}
                {{--<li style="margin-top: 10px">بعدم استخدام أي وسيلة غير شرعية للوصول للإعلانات أو لبيانات المستخدمين الآخرين أو انتهاك لسياسة وحقوق <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> هي الجهة المالكة لموقع حراج ، مؤسسة سعودية ١٠٠ ٪ مقرها الرئيسي الرياض وهي منصة الكترونية تمكن المستخدم (منشئ السجل الإلكتروني ) من فتح محل إلكتروني لتقديم خدماته وإيصالها للعميل المستهدف (مستقبل السجل الإلكتروني ) وفق شروط وضوابط محددة وتحت مسؤوليته. ويشار إليها بهذه الاتفاقية باسم ( ،أو الوصول لمحتوى الموقع أو تجميع وتحصيل معلومات وبيانات تخص موقع حراج أو عملاء الموقع والاستفادة منها بأي شكل من الأشكال أو إعادة نشرها.</li>--}}
                {{--<li style="margin-top: 10px">بعدم الإعلان أو تحميل محتوى أو عناصر غير ملائمة للتصنيفات المتاحة في الموقع و المسموح ببيعها. وعليك مراجعة شروط الإعلان و السلع الممنوعة. بعدم الاختراق أو التحايل على قوانين وسياسة وأنظمة الموقع أو أي حقوق تتعلق بطرف ثالث.</li>--}}
                {{--<li style="margin-top: 10px">بعدم استخدام خدماتنا إذا كنت غير مؤهل قانونيا لإتمام هذه الاتفاقية. على سبيل المثال أنك أقل من 18 سنة أو أنك محجوب بشكل مؤقت أو دائم من استخدام الموقع.</li>--}}
                {{--<li style="margin-top: 10px">بعدم التلاعب بأسعار السلع سواء في البيع او الشراء وإلحاق الضرر بالمستخدمين الآخرين.</li>--}}
                {{--<li style="margin-top: 10px">بعدم نشر إعلانات أو تعليقات كاذبة أو غير دقيقة أو مضللة أو خادعة أو قذف ، أو تشهير.</li>--}}
                {{--<li style="margin-top: 10px">بعدم التعرض للسياسات أو السيادات الدولية أو الشخصيات المعتبرة أو أي مناقشات لا تتعلق بالبيع والشراء المشروعة في <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span>.</li>--}}
                {{--<li style="margin-top: 10px">بعدم نقل حسابك أو نشاطك إلى مواقع اخرى بالوقت الذي هو يحمل شعار أو خدمات المؤسسة .</li>--}}
                {{--<li style="margin-top: 10px">بعدم انتهاك حقوق الطبع والنشر والعلامات التجارية، وبراءات الاختراع، والدعاية وقواعد البيانات أو غيرها من حقوق الملكية أو الفكرية التي تنتمي <span style="font-weight: bold">لمؤسسة موقع حراج للتسويق الإلكتروني</span> أو مرخصة <span style="font-weight: bold">لمؤسسة موقع حراج للتسويق الإلكتروني</span>.</li>--}}
                {{--<li style="margin-top: 10px">بعدم انتهاك حقوق الآخرين الملكية أو الفكرية أو براءة الاختراع.</li>--}}
                {{--<li style="margin-top: 10px">بعدم الاعلان عن منتجات التبغ والدخان (هذه السلع تعرضك للحصول على مخالفة من قبل الجهات المختصة)</li>--}}
                {{--<li style="margin-top: 10px">بعدم انتهاك أنظمة حقوق الإنسان وبعدم المتاجرة بالأشخاص بأي شكل من الأشكال ويجب عليك الإلتزام <a href="#labor_services" style="color: #0275d8">بضوابط الإعلان عن تقديم الخدمات العمالية</a>.</li>--}}
                {{--<li style="margin-top: 10px">بعدم انتهاك أنظمة حقوق الإنسان وبعدم المتاجرة بالأشخاص بأي شكل من الأشكال.</li>--}}
                {{--<li style="margin-top: 10px">بعدم انتهاك أنظمة حماية الحياة الفطرية.</li>--}}
                {{--<li style="margin-top: 10px">بعدم انتهاك أنظمة حقوق الإنسان أو أنظمة حماية الحياة الفطرية.</li>--}}
                {{--<li style="margin-top: 10px">بعدم جمع معلومات عن مستخدمي الموقع الآخرين لأغراض تجارية أو غيرها.</li>--}}
                {{--<li style="margin-top: 10px">بعدم الإقدام على أي ما من شأنه إلحاق الضرر بسمعة <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span>.</li>--}}
                {{--<li style="margin-top: 10px">بعدم انتحال صفة <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> أو ممثل لها أو موظف فيها أو أي صفة توحي بأنك تابع للمؤسسة ما لم يكون لديك أذن رسمي من المؤسسة.</li>--}}
                {{--<li style="margin-top: 10px">يُمنع إستخدام هذه الخدمة من قِبل أي مستخدم غير بشري ويستثنى من ذلك المستخدمين الغير بشريين التابعين للشركات التالية فقط:</li>--}}
                {{--<ul>--}}
                    {{--<li style="margin-top: 10px">Google</li>--}}
                    {{--<li style="margin-top: 10px">Facebook</li>--}}
                    {{--<li style="margin-top: 10px">Twitter</li>--}}
                {{--</ul>--}}
                {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-top: 2%; color: darkgrey">إن عدم التزامك بتلك الشروط يمنح <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> الحق كاملا بحجب عضويتك ومنعك من الوصول للموقع دون الحاجة لإخطارك بذلك وأنت هنا تتعهد بعدم العودة لاستخدام الموقع إلى بعد موافقة الموقع على ذلك.</p>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">مسؤولية {{$website_data->arabic_name}}</h4>
            @if($definition !== null)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">{{$definition->responsibilities}}</p>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال مسؤوليات الموقع بعد</h4>
            @endif
            {{--<h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">مسؤولية مؤسسة موقع حراج للتسويق الإلكتروني</h4>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">تقدم <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> هي الجهة المالكة لموقع حراج ، مؤسسة سعودية ١٠٠ ٪ مقرها الرئيسي الرياض وهي منصة الكترونية تمكن المستخدم (منشئ السجل الإلكتروني ) من فتح محل إلكتروني لتقديم خدماته وإيصالها للعميل المستهدف (مستقبل السجل الإلكتروني ) وفق شروط وضوابط محددة وتحت مسؤوليته. ويشار إليها بهذه الاتفاقية باسم (  خدمة تمكين المستخدم من عرض سلعته وفق سياسة الاستخدام المتفق عليها ولا نقدم أي ضمانات ولا نتحمل أي مسؤولية في حالة عدم التزام المستخدم بسياسة استخدام الموقع ولا نتحمل المسؤولية عن أي مخاطرة أو أضرار أو تبعات أو خسائر تقع على البائع أو المشتري أو أي طرف آخر وعلى من لحق به الضرر إبلاغنا بذلك من خلال رابط اتصل بنا وشرح الضرر الواقع عليه وستقوم <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> هي الجهة المالكة لموقع حراج ، مؤسسة سعودية ١٠٠ ٪ مقرها الرئيسي الرياض وهي منصة الكترونية تمكن المستخدم (منشئ السجل الإلكتروني ) من فتح محل إلكتروني لتقديم خدماته وإيصالها للعميل المستهدف (مستقبل السجل الإلكتروني ) وفق شروط وضوابط محددة وتحت مسؤوليته. ويشار إليها بهذه الاتفاقية باسم ( باتخاذ الإجراء حسب نوع الواقعة دون أي مسؤولية . إن استخدامك لموقع حراج يعني أنك تخولنا في حفظ بياناتك التي قمت بإدخالها بخوادم المؤسسة ولنا حق الإطلاع عليها ومراجعتها. كما أنك توافق على أحقيتنا في مراقبة الرسائل الخاصة عند الحاجة لضمان خلوها من مخالفات اتفاقية الاستخدام ولنا حق حذف الإعلان والتصرف بالصور المرفقة عند الحاجة لذلك. تعتبر تعاميم وقرارات وتوجيهات إدارة ومشرفي الموقع ملزمة للطرف الثاني بعد إيصالها له عبر الرسائل الخاصة بالموقع أو الجوال أو البريد الإلكتروني أو عبر نظام الإشعارات ، وعليه الإلتزام بها والعمل بموجبها. كما أنك توافق أنه في حال مخالفتك لأنظمة منصة حراج والتسبب بأضرار للمنصة فإنه يحق لإدارة مؤسسة موقع حراج مطالبتك بالتعويضات عن جميع الأضرار التي لحقت بها بسبب مخالفتك للأنظمة بما في ذلك أتعاب المحاماة في جميع القضايا المتعلقة بمخالفاتك.</p>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">شروط العضوية</h4>
            @if(count($membership_terms) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: العضوية هي: اسم المستخدم الذي سجل به الشخص في موقع حراج والتي ترتبط برقم جواله ، ويجب أن تكون خاضعة للشروط التالية</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($membership_terms as $term)
                        <li style="margin-top: 10px">{{$term->body}}</li>
                    @endforeach
                </ul>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال شروط العضوية بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: العضوية هي: اسم المستخدم الذي سجل به الشخص في موقع حراج والتي ترتبط برقم جواله ، ويجب أن تكون خاضعة للشروط التالية</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">يلزم اختيار اسم لائق ومناسب خلال عملية التسجيل.</li>--}}
                {{--<li style="margin-top: 10px">يُمنع استخدام اكثر من عضوية في الموقع لكل شخص أو جهة.</li>--}}
                {{--<li style="margin-top: 10px">يجب ان تقوم بتحديث رقم جوالك المرتبط بالعضوية في حال تغيير رقم جوالك او فقدانه.</li>--}}
                {{--<li style="margin-top: 10px">اذا كان اسم عضويتك يحتوي على اسم تجاري أو علامة تجارية ، يجب ان تكون المالك للعلامة التجارية او مخول لك باستخدام الاسم او العلامة التجارية.</li>--}}
                {{--<li style="margin-top: 10px">بعدم انتهاك أنظمة حقوق الإنسان وبعدم المتاجرة بالأشخاص بأي شكل من الأشكال.</li>--}}
                {{--<li style="margin-top: 10px">يمنع بيع العضوية أو التنازل عنها لطرف آخر أو السماح لأي طرف آخر باستخدامها ويتعبر صاحب العضوية الأول هو المسؤول عنها تجاه أي مخالفات أو مسؤوليات قانونية ، وسيعتبر كلا الطرفين في حالة البيع أو التنازل مخالفين لسياسة الاستخدام في موقع حراج. يلتزم العضو بعدم مشاركة معلومات عضويته الخاصة به مع أي أحد.</li>--}}
                {{--<li style="margin-top: 10px">يلتزم "موقع حراج" باتخاذ المعايير اللازمة لحماية البيانات وحفظها، علما بأن شبكة الانترنت ليست وسيلة آمنة بنسبة ١٠٠٪ لحفظ المعلومات السرية. ( راجع وثيقة الخصوصية ).</li>--}}
                {{--<li style="margin-top: 10px">تتبادل الخدمة بعض المعلومات مع جهازك لغرض تقديم الخدمة لك.</li>--}}
                {{--<li style="margin-top: 10px">يستخدم الموقع برامج احصائية مثل Google Analytics و ذلك لأجل تطوير الخدمة وتحسينها.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">شروط اضافة محتوى للموقع</h4>
            @if(count($content_addition_terms) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: العضوية هي: اسم المستخدم الذي سجل به الشخص في موقع حراج والتي ترتبط برقم جواله ، ويجب أن تكون خاضعة للشروط التالية</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($content_addition_terms as $term)
                        <li style="margin-top: 10px">{{$term->body}}</li>
                    @endforeach
                </ul>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم ادخال شروط اضافة محتوى للموقع بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: العضوية هي: اسم المستخدم الذي سجل به الشخص في موقع حراج والتي ترتبط برقم جواله ، ويجب أن تكون خاضعة للشروط التالية</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">تتعهد بعدم الإعلان عن أي <a href="/notallowed" style="color: #0275d8">سلعة ممنوعة</a> بالموقع.</li>--}}
                {{--<li style="margin-top: 10px">تتعهد بعدم اضافة أي <a href="/notallowed" style="color: #0275d8">ردود ممنوعة</a> بالموقع.</li>--}}
                {{--<li style="margin-top: 10px">تتعهد بعدم ارسال أي <a href="/notallowed" style="color: #0275d8">رسائل ممنوعة</a> بالموقع.</li>--}}
                {{--<li style="margin-top: 10px">تتعهد بتحديد سعر بيع السلعة المعلن عنها.</li>--}}
                {{--<li style="margin-top: 10px">تتعهد بمتابعة إعلانك والرد على استفسارات العملاء من خلال الردود او من خلال الرسائل الخاصة.</li>--}}
                {{--<li style="margin-top: 10px">تتعهد بالالتزام بسياسة الإعلانات المكررة.</li>--}}
                {{--<li style="margin-top: 10px">يلزم أن تكون المادة الإعلانية المعلن عنها سلعة أو خدمة فقط.</li>--}}
                {{--<li style="margin-top: 10px">يجب أن يكون الإعلان كامل التفاصيل وفي القسم الصحيح.</li>--}}
                {{--<li style="margin-top: 10px">يحق للموقع حذف أي إعلان من دون ذكر سبب الحذف.</li>--}}
                {{--<li style="margin-top: 10px">يُمنع نسخ أي إعلان من الموقع.</li>--}}
                {{--<li style="margin-top: 10px">إذا كنت تقدم خدمة أو تبيع سلعة تحتاج تصريح، مثل تقديم خدمات التعقيب، يجب ان يكون لديك التصاريح اللازمة لذلك.</li>--}}
                {{--<li style="margin-top: 10px">يُمنع استخدام أي جزء من أي إعلان في الموقع.</li>--}}
                {{--<li style="margin-top: 10px">يلتزم المعلن بأن تكون الصور المضافة في الإعلان لنفس السلعة المعلن عنها.</li>--}}
                {{--<li style="margin-top: 10px">صور المحتوى يجب أن تكون لائقة أخلاقيا وذات جودة عالية ولا تخالف نظام وزارة العمل أو حقوق الإنسان أو أي جهة حكومية أو خاصة.</li>--}}
                {{--<li style="margin-top: 10px">يلتزم المعلن بعدم إضافة أكثر من 5 إعلانات في الموقع لنفس السلعة.</li>--}}
                {{--<li style="margin-top: 10px">يجب الإلتزام بعدم الإعلان عن السلع والخدمات التي تندرج في قائمة السلع و الخدمات الممنوعة. كما يجب أيضا الالتزام بقائمة الردود الممنوعة و الرسائل الممنوعة.</li>--}}
                {{--<li style="margin-top: 10px">تتعهد بعدم الإعلان لشخص لا تعرفه او التسجيل لشخص لا تعرفه.</li>--}}
                {{--<li style="margin-top: 10px">يخضع تحديث وتعديل الإعلان لجميع الشروط والضوابط في هذه الاتفاقية ويعتبر المستخدم مسؤول عن أي مخالفات وقعت أثناء إنشاء الإعلان او بعد التحديث او التعديل.</li>--}}
                {{--<li style="margin-top: 10px">الإنشاء والتحديث والتعديل مسؤولية المستخدم ( منشئ السجل الإلكتروني ).</li>--}}
                {{--<li style="margin-top: 10px">عليك بتحديث الإعلان. إذا لم يحدث المستخدم الإعلان فإنه سيتم حذف الإعلان بشكل تلقائي .</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right" id="labor_services">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">:ضوابط الإعلان عن تقديم الخدمات العمالية</h4>
            @if(count($labor_services_terms) > 0)
                <ol dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($labor_services_terms as $term)
                        <li style="margin-top: 10px">{{$term->body}}</li>
                    @endforeach
                </ol>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم ادخال ضوابط الإعلان عن الخدمات العمالية بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">السلعة الموضحة هي السلع الممنوعة في الموقع. هذه السلع ممنوع الاعلان عنها في الموقع و ممنوع ايضا شرائها عبر الموقع. نحن نقوم بحظر المعلن الذي يقوم بالاعلان عن هذه السلع و نقوم بحظر من يتجاوب معه عبر الرسائل الخاصة أو عبر الردود. نرجو ملاحظة ان ليس هناك تنبيه قبل الحظر وان الحظر نهائي لانقاش فيه.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">: السلع الممنوعة هي</p>--}}
            {{--<ol dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">للإعلان عن تقديم الخدمات العمالية يجب أن تكون مكتب استقدام حاصل على ترخيص لممارسة هذا النشاط.</li>--}}
                {{--<li style="margin-top: 10px">يجب ألا يتضمن الإعلان مفردات أو عبارات من شأنها أن تمسمن كرامة العمال الوافدة والعمالة المنزلية وممن في حكمهم ، ومن ذلك على سبيل المثال لا الحصر استخدام عبارات ( للبيع ،للشراء ، للتنازل ) وتستبدل بعبارات ( نقل خدمات).</li>--}}
                {{--<li style="margin-top: 10px">يجب ألا يتضمن الإعلان عبارة خادم أو خادمة ، أو شغالة ، وتستبدل بعبارة عامل أو عاملة.</li>--}}
                {{--<li style="margin-top: 10px">يجب ألا يتضمن الإعلان تحميل العامل أي تكاليف مالية مقابل نقل الخدمة بأي حال من الأحوال.</li>--}}
                {{--<li style="margin-top: 10px">يجب ألا يتضمن الإعلان نشر لصور شخصية أو بطاقة هوية أو إقامة أو جواز السفر أو أية بيانات شخصية أخرى للعمالة الوافدة والعمالة المنزلية ومن في حكمهم.</li>--}}
                {{--<li style="margin-top: 10px">ألا يتضمن الإعلان الإشارة إلى تلقي ناقل الخدمة أو المعلن أو من في حكمه تلقي مبالغ مالية لنقل الخدمات بأي حال من الأحوال.</li>--}}
                {{--<li style="margin-top: 10px">يجب أخذ موافقه من العامل قبل نقل الخدمة.</li>--}}
            {{--</ol>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">السلع الممنوعة</h4>
            @if(count($notallowed_goods) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">السلعة الموضحة هي السلع الممنوعة في الموقع. هذه السلع ممنوع الاعلان عنها في الموقع و ممنوع ايضا شرائها عبر الموقع. نحن نقوم بحظر المعلن الذي يقوم بالاعلان عن هذه السلع و نقوم بحظر من يتجاوب معه عبر الرسائل الخاصة أو عبر الردود. نرجو ملاحظة ان ليس هناك تنبيه قبل الحظر وان الحظر نهائي لانقاش فيه.</p>
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">السلع الممنوعة هي:</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($notallowed_goods as $good)
                        <li style="margin-top: 10px">{{$good->description}}</li>
                    @endforeach
                </ul>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم تحديد السلع الممنوعة بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">السلعة الموضحة هي السلع الممنوعة في الموقع. هذه السلع ممنوع الاعلان عنها في الموقع و ممنوع ايضا شرائها عبر الموقع. نحن نقوم بحظر المعلن الذي يقوم بالاعلان عن هذه السلع و نقوم بحظر من يتجاوب معه عبر الرسائل الخاصة أو عبر الردود. نرجو ملاحظة ان ليس هناك تنبيه قبل الحظر وان الحظر نهائي لانقاش فيه.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">السلع الممنوعة هي:</p>--}}
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
                {{--<li style="margin-top: 10px">الإعلان عن شرائح اتصال او خدمات اتصالات من دون الحصول على التراخيص اللازمة و من دون رفعها لنظام التراخيص بالموقع.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">الإعلانات الممنوعه</h4>
            @if(count($notallowed_ads) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">القائمة التالية تحتوي على أغلب أساليب وطرق الإعلانات الممنوعه في الموقع:</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($notallowed_ads as $ads)
                        <li style="margin-top: 10px">{{$ads->description}}</li>
                    @endforeach
                </ul>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم تحديد الإعلانات الممنوعة بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">القائمة التالية تحتوي على أغلب أساليب وطرق الإعلانات الممنوعه في الموقع:</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">جميع الإعلانات التي لاتتعلق بالبيع والشراء</li>--}}
                {{--<li style="margin-top: 10px">طرح مواضيع في الموقع.</li>--}}
                {{--<li style="margin-top: 10px">الإعلان لأجل إضافة إقتراح او مناقشة مشكلة مع الإدارة في الموقع‫.‬ الإعلانات مخصصة للبيع والشراء فقط‫.‬ إضافة إعلانات عن إقتراحات لتطوير الموقع في المعروضات يلحق الضرر بإعلانات المعلنين في الموقع‫.‬ أفضل طريقة للإقتراح أو الشكوى هي الإتصال بنا عبر نموذج اتصل بنا‫.‬</li>--}}
                {{--<li style="margin-top: 10px">الإعلان غير مكتمل التفاصيل.</li>--}}
                {{--<li style="margin-top: 10px">إعلان ضعيف الجودة‫.‬</li>--}}
                {{--<li style="margin-top: 10px">ضعف تواصل المعلن مع الاعضاء المهتمين بالسلعه المعروضة‫.‬ مثلا معلن يعلن بيع سياره ثم لايقوم بالرد على الاتصالات او الرد على الرسائل الخاصة‫.‬‬</li>--}}
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
                {{--<li style="margin-top: 10px">إعلانات التبرع وطلب المساعدة. نظام الدوله يمنع التبرع والعمل الخيري خارج النطاق القانوني المحدد المخصص لذلك.‬</li>--}}
                {{--<li style="margin-top: 10px">الإعلانات عن مساهمات وإشتراكات.‬</li>--}}
                {{--<li style="margin-top: 10px">التوسل ومساعدة المتسولين . نحن نقوم بحظر العضو الذي يقوم مساعدة المتسولين في الموقع.‬</li>--}}
                {{--<li style="margin-top: 10px">طلب الواسطة والمساعدات سواء كانت مشروعه أو غير مشروعه. الموقع للسلع فقط‬</li>--}}
                {{--<li style="margin-top: 10px">الإعلانات التي تحتوي على سوء إستغلال سلطة.</li>--}}
                {{--<li style="margin-top: 10px">الإعلان في الردود.‬</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">الردود الممنوعة</h4>
            @if(count($notallowed_replies) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">القائمة التالية تحتوي على أغلب الردود الممنوعة:</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($notallowed_replies as $reply)
                        <li style="margin-top: 10px">{{$reply->description}}</li>
                    @endforeach
                </ul>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم تحديد الردود الممنوعة بعد</h4>
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
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">الرسائل الخاصة الممنوعة</h4>
            @if(count($notallowed_messages) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">القائمة التالية تحتوي على أغلب الرسائل الخاصة الممنوعة:</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($notallowed_messages as $message)
                        <li style="margin-top: 10px">{{$message->description}}</li>
                    @endforeach
                </ul>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم تحديد الرسائل الخاصة الممنوعة بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">القائمة التالية تحتوي على أغلب الرسائل الخاصة الممنوعة:</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">الإعلان في الرسائل الخاصة.</li>--}}
                {{--<li style="margin-top: 10px">السب و الشتم سواء كان هناك مبرر ام يكن هناك مبرر.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">السياسة الأمنية ل{{$website_data->arabic_name}}</h4>
            @if(count($security_policies) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">تلتزم <span style="font-weight: bold">{{$website_data->arabic_name}}</span> باتفاقية الاستخدام و خصوصية الاستخدام ولكننا لسنا طرفا في أي خلاف أو قضايا تنشأ بين المستخدمين لمخالفة أحدهما أو كلاهما اتفاقية الاستخدام إلا أنه يسعى لتعزيز الجانب الأمني في الموقع وذلك للحد والقضاء على التعديات التي يقوم بها بعض من مستخدمي الموقع بشكل يخالف اتفاقية ، سياسة ، خصوصية و شروط الاستخدام وذلك تحقيقا لنزاهة البيع والشراء ومحاربة النصب والاحتيال والغش والخداع وإتباع للقوانين والتشريعات والتنظيمات المتبعة في المملكة العربية السعودية وبذلك فإنه يحق <span style="font-weight: bold">ل{{$website_data->arabic_name}}</span> اتخاذ الإجراء اللازم تجاه أي فرد أو مؤسسة أو شركة خالفت اتفاقية الاستخدام علما أنه قد يصل الإجراء إلى الملاحقة القانونية والقضائية أمام الجهة ذات العلاقة. ونورد هنا المخالفات الشائعة والإجراء اللازم تجاهها:</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($security_policies as $policy)
                        <li style="margin-top: 10px">{{$policy->body}}</li>
                    @endforeach
                </ul>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم تحديد السياسة الأمنية للموقع بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">تلتزم <span style="font-weight: bold">{{$website_data->arabic_name}}</span> باتفاقية الاستخدام و خصوصية الاستخدام ولكننا لسنا طرفا في أي خلاف أو قضايا تنشأ بين المستخدمين لمخالفة أحدهما أو كلاهما اتفاقية الاستخدام إلا أنه يسعى لتعزيز الجانب الأمني في الموقع وذلك للحد والقضاء على التعديات التي يقوم بها بعض من مستخدمي الموقع بشكل يخالف اتفاقية ، سياسة ، خصوصية و شروط الاستخدام وذلك تحقيقا لنزاهة البيع والشراء ومحاربة النصب والاحتيال والغش والخداع وإتباع للقوانين والتشريعات والتنظيمات المتبعة في المملكة العربية السعودية وبذلك فإنه يحق <span style="font-weight: bold">ل{{$website_data->arabic_name}}</span> اتخاذ الإجراء اللازم تجاه أي فرد أو مؤسسة أو شركة خالفت اتفاقية الاستخدام علما أنه قد يصل الإجراء إلى الملاحقة القانونية والقضائية أمام الجهة ذات العلاقة. ونورد هنا المخالفات الشائعة والإجراء اللازم تجاهها:</p>--}}
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">تعرض العميل لعملية نصب واحتيال من قبل طرف آخر: يجب على العميل إبلاغ الجهات الأمنية المختصة. يجب على العميل تعبئة نموذج الشكوى الخاص بذلك في صفحة اتصل بنا. ستقوم إدارة الموقع بمراجعة الشكوى والتحري حول العميل المدعى عليه وسيتم اتخاذ الإجراء اللازم في حقه في حال تم التأكد بأنه خالف اتفاقية الاستخدام. . لن يكون الموقع طرف في مثل هذه القضايا ولا يتحمل أي مسئولية ولكننا سنقدم ما لدينا للجهات المختصة في حال تم طلب ذلك بصفة رسمية.</li>--}}
                {{--<li style="margin-top: 10px">التعدي على سياسة أو سيادة الدولة : سيتم حذف الإعلان وإيقاف عضوية المعلن وإبلاغ الجهات المختصة بذلك.</li>--}}
                {{--<li style="margin-top: 10px">في حال الإعلان عن أي من السلع الممنوعة : سيتم توثيق وأرشفة الإعلان وحذفه وإيقاف العضو وإبلاغ الجهات ذات الاختصاص.</li>--}}
                {{--<li style="margin-top: 10px">في حال قام فرد أو مؤسسة أو شركة بطريق غير مشروعة ( كاختراق أو استخدام وسائل تجميع البيانات غير المشروعة أو أي وسيلة كانت ) بهدف الوصول إلى محتوى الموقع أو برمجة الموقع أو قواعد البيانات الخاصة بالموقع أو المعلومات والبيانات التي تخص عملاء الموقع بغية نسخ الإعلانات وإعادة نشرها أو الاستفادة منها بأي شكل من الأشكال. فإن <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> سيتوجه للجهات المختصة لمقاضاة الطرف الآخر بدعوى الاختراق الإلكتروني وارتكاب جريمة مخالفة أنظمة الجرائم المعلوماتية.</li>--}}
                {{--<li style="margin-top: 10px">في حال قام فرد أو مؤسسة أو شركة بنسخ إعلانات من <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> إلى موقع آخر ستتوجه <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> للجهات المختصة لرفع دعوى وملاحقة الطرف الآخر بدعوى التعدي على حقوق المؤسسة.</li>--}}
                {{--<li style="margin-top: 10px">التعدي على حقوق الملكية ، أو الفكرية ، أو براءة الاختراع لطرف ثالث: إن كنت تعتقد بأنه تم التعدي على حق من حقوقك فعليك تعبئة نموذج الشكوى الخاص بالتعدي على الحقوق وتقديم ما يثبت التعدي في الإعلان المنشور. ستقوم <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> بمراجعة الشكوى ودراستها والتأكد من صحتها وسيتخذ الإجراء اللازم بحسب النتيجة.. عليك التوجه للجهات ذات الاختصاص في حال رغبتك في مقاضاة الطرف الذي اعتدى على حقوقك. علما أن <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> لن يكون طرف في القضية وليس مسئولا عنها ولا نتحمل أي مسئولية.</li>--}}
                {{--<li style="margin-top: 10px">في حال قام الطرف الثاني بالتقييم الكاذب لعضو آخر سيتم إيقاف العضوين ومنعهم من استخدام الموقع في حال اتضح التعاون بيهنم. وسيتم اتخاذ الإجراءات اللازمة لأي تبعات حدثت بسبب هذا التقييم.</li>--}}
                {{--<li style="margin-top: 10px">التعرض للتشهير وانتهاك الخصوصية: على العميل تعبئة نموذج الشكوى الخاص بذلك. ستقوم إدارة الموقع بمراجعة الشكوى والتحري حول العميل المدعى عليه وسيتم اتخاذ الإجراء اللازم في حقه وفي حال تم التأكد بأنه خالف اتفاقية الاستخدام. على العميل الذي لحق به الضرر التوجه للجهات ذات العلاقة لتقديم الشكوى. لن تكون <span style="font-weight: bold">مؤسسة موقع حراج للتسويق الإلكتروني</span> طرف في مثل هذه القضايا ولا يتحمل أي مسئولية ولكننا سنقدم البيانات اللازمة للجهات المختصة في حال تم طلب ذلك بصفة رسمية.</li>--}}
                {{--<li style="margin-top: 10px">الإزعاج : عند تعرض عميل ما للإزعاج من قبل عميل آخر فعليه إشعار الموقع بذلك وسيتم مراجعة الشكوى واتخاذ الإجراء المناسب حيال ذلك.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 2%; margin-bottom: 2%">وثيقة الخصوصية</h4>
            @if($definition !== null)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">{{$definition->privacy}}</p>
            @else
                <h4 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم تحديد وثيقة الخصوصية بعد</h4>
            @endif
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">الخصوصية وبيان سريّة المعلومات نقدر مخاوفكم واهتمامكم بشأن خصوصية بياناتكم على شبكة الإنترنت. لقد تم إعداد هذه السياسة لمساعدتكم في تفهم طبيعة البيانات التي نقوم بتجميعها منكم عند زيارتكم لموقعنا على شبكة الانترنت وكيفية تعاملنا مع هذه البيانات الشخصية.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">التصفح</span> لم نقم بتصميم هذا الموقع من أجل تجميع بياناتك الشخصية من جهاز الكمبيوتر الخاص بك أو من جوالك أثناء تصفحك لهذا الموقع، وإنما سيتم فقط استخدام البيانات المقدمة من قبلك بمعرفتك ومحض إرادتك.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">عنوان بروتوكول شبكة الإنترنت (IP)</span> في أي وقت تزور فيه اي موقع انترنت بما فيها هذا الموقع , سيقوم السيرفر المضيف بتسجيل عنوان بروتوكول شبكة الإنترنت (IP) الخاص بك , تاريخ ووقت الزيارة ونوع متصفح الإنترنت الذي تستخدمه والعنوان URL الخاص بأي موقع من مواقع الإنترنت التي تقوم بإحالتك إلى الى هذا الموقع على الشبكة.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">الروابط بالمواقع الأخرى على شبكة الإنترنت</span> قد يشتمل موقعنا على روابط بالمواقع الأخرى على شبكة الإنترنت. لا نعتبر مسئولين عن تلك المواقع، يمكنك الاطلاع على سياسات السرية والمحتويات الخاصة بتلك المواقع التي يتم الدخول إليها من خلال أي رابط ضمن هذا الموقع.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">إفشاء المعلومات</span> سنحافظ في كافة الأوقات على خصوصية وسرية كافة البيانات الشخصية التي نتحصل عليها. ولن يتم إفشاء هذه المعلومات إلا إذا كان ذلك مطلوباً بموجب أي قانون أو عندما نعتقد بحسن نية أن مثل هذا الإجراء سيكون مطلوباً أو مرغوباً فيه للتمشي مع القانون ، أو للدفاع عن أو حماية حقوق الملكية الخاصة بهذا الموقع أو الجهات المستفيدة منه.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">البيانات اللازمة لتنفيذ المعاملات المطلوبة من قبلك</span> عندما نحتاج إلى أية بيانات خاصة بك , فإننا سنطلب منك تقديمها بمحض إرادتك. حيث ستساعدنا هذه المعلومات في الاتصال بك وتنفيذ طلباتك حيثما كان ذلك ممكنناً. لن يتم اطلاقاً بيع البيانات المقدمة من قبلك إلى أي طرف ثالث بغرض تسويقها لمصلحته الخاصة دون الحصول على موافقتك المسبقة والمكتوبة ما لم يتم ذلك على أساس أنها ضمن بيانات جماعية تستخدم للأغراض الإحصائية والأبحاث دون اشتمالها على أية بيانات من الممكن استخدامها للتعريف بك.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey">عند الاتصال بنا سيتم التعامل مع كافة البيانات المقدمة من قبلك على أساس أنها سرية . تتطلب النماذج التي يتم تقديمها مباشرة على الشبكة تقديم البيانات التي ستساعدنا في تحسين موقعنا.سيتم استخدام البيانات التي يتم تقديمها من قبلك في الرد على كافة استفساراتك , ملاحظاتك , أو طلباتك من قبل هذا الموقع أو أيا من المواقع التابعة له.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">إفشاء المعلومات لأي طرف ثالث</span> لن نقوم ببيع , المتاجرة , تأجير , أو إفشاء أية معلومات لمصلحة أي طرف ثالث خارج هذا الموقع, أو المواقع التابعة له.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">التعديلات على سياسة سرية وخصوصية المعلومات</span> نحتفظ بالحق في تعديل بنود وشروط سياسة سرية وخصوصية المعلومات إن لزم الأمر ومتى كان ذلك ملائماً. سيتم تنفيذ التعديلات هنا او على صفحة سياسة الخصوصية الرئيسية وسيتم بصفة مستمرة إخطارك بالبيانات التي حصلنا عليها , وكيف سنستخدمها والجهة التي سنقوم بتزويدها بهذه البيانات.<span style="font-weight: bold">الاتصال بنا</span> يمكنكم الاتصال بنا عند الحاجة من خلال الضغط على رابط اتصل بنا المتوفر في روابط موقعنا او الارسال الى بريدنا الالكتروني haraj على اسم النطاق اعلاه.</p>--}}
            {{--<p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 2%; color: darkgrey"><span style="font-weight: bold">اخيرا</span> إن مخاوفك واهتمامك بشأن سرية وخصوصية البيانات تعتبر مسألة في غاية الأهمية بالنسبة لنا. نحن نأمل أن يتم تحقيق ذلك من خلال هذه السياسة.</p>--}}
        </div>
    </div>
@endsection