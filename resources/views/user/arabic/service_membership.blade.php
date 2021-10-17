@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; font-family: 'Segoe UI'; margin-top: 2%; color: darkgrey; margin-right: 4%">الإعلان عن الخدمات والسلع المكررة يتطلب دفع رسوم بمبلغ {{$service_membership_price != null ? $service_membership_price->price : 'غير محدد'}} ريال بشكل سنوي. يجب عليك دفع تلك الرسوم في حالة رغبتك بالإعلان بشكل مستمر عن أحد الخدمات الموضحة بالأسفل أو إذا أجبرك الموقع على ذلك</p>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 1%">: أنواع السلع والخدمات المكررة</h4>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            @if(count($service_membership_types) > 0)
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($service_membership_types as $service_membership_type)
                        <li style="margin-top: 10px">{{$service_membership_type->type}}</li>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال الأنواع بعد</h5>
            @endif
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">خدمات نقل العفش.</li>--}}
                {{--<li style="margin-top: 10px">خدمات المقاولات العامة.</li>--}}
                {{--<li style="margin-top: 10px">خدمات النظافة.</li>--}}
                {{--<li style="margin-top: 10px">المظلات و السواتر.</li>--}}
                {{--<li style="margin-top: 10px">العسل.</li>--}}
                {{--<li style="margin-top: 10px">الاعلانات ضعيفة الجوده و غير مكتملة التفاصيل مثل اعلانات العقار العامة.</li>--}}
                {{--<li style="margin-top: 10px">خدمات التعقيب.</li>--}}
                {{--<li style="margin-top: 10px">اغراق الموقع بالاعلانات باكثر من عضوية. يتم اجبار الرسوم لأجل منع الاعلان بأكثر من عضوية.</li>--}}
                {{--<li style="margin-top: 10px">اضافة اعلانات كثيرة جدا بدون صور.</li>--}}
                {{--<li style="margin-top: 10px">اضافة اعلانات مع عدم الحصول على تقييمات.</li>--}}
                {{--<li style="margin-top: 10px">الاعلان في قسم خطأ.يتم اجبار الرسوم لأجل اجبار المعلن على اختيار القسم الصحيح.</li>--}}
                {{--<li style="margin-top: 10px">أي خدمة تعمل بنفس طريقة السلع المكررة حتى لو لم تذكر في هذه القائمة.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 1%">: فوائد الاشتراك في هذه الخدمة</h4>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            @if(count($service_membership_features) > 0)
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($service_membership_features as $service_membership_feature)
                        <li style="margin-top: 10px">{{$service_membership_feature->feature}}</li>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال فوائد الإشتراك بعد</h5>
            @endif
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">منافسين أقل.</li>--}}
                {{--<li style="margin-top: 10px">إمكانية الإعلان بالموقع ما لم تخالف الشروط.</li>--}}
                {{--<li style="margin-top: 10px">غير المشتركين و غير الملتزمين بالشروط سيتم منعهم من الإعلان عن خدماتهم.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 1%">: شروط الاعلان عن الخدمات</h4>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            @if(count($service_membership_terms) > 0)
                <p style="text-align: right; font-family: 'Segoe UI'; margin-right: 4%; margin-top: 1%; color: darkgrey">: اذا كنت تعلن بشكل مستمر ، فيجب عليك الالتزام بالشروط التالية بالاضافة الى معاهدة الاستخدام</p>
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($service_membership_terms as $service_membership_term)
                        <li style="margin-top: 10px">{{$service_membership_term->term}}</li>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال شروط الإشتراك بعد</h5>
            @endif
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">يجب عدم وجود اكثر من 6 اعلانات في الموقع لنفس الخدمة.</li>--}}
                {{--<li style="margin-top: 10px">يجب ان تقوم بعمل عروض لزوار الموقع.</li>--}}
                {{--<li style="margin-top: 10px">يجب ان تحصل على تقييمات ايجابية.</li>--}}
                {{--<li style="margin-top: 10px">يجب التواصل عبر الموقع قدر الامكان و تفادي الاتصال عبر الجوال بقدر الامكان.</li>--}}
                {{--<li style="margin-top: 10px">يجب ان توضح سعر تقديم الخدمة.</li>--}}
                {{--<li style="margin-top: 10px">يجب ان تكون الصور التي تقوم بإضافتها من تصويرك وتابعة لخدمتك.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 1%">: سياسة الموقع بخصوص الخدمات</h4>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            @if(count($service_membership_policy) > 0)
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($service_membership_policy as $service_membership_one_policy)
                        <li style="margin-top: 10px">{{$service_membership_one_policy->policy}}</li>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إدخال بنود الإشتراك بعد</h5>
            @endif
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 10px">الموقع يصنف ويقدم الإعلانات ذات الجودة العالية على الإعلانات ذات الجودة المنخفضة.</li>--}}
                {{--<li style="margin-top: 10px">زيادة عدد الإعلانات عن 6 إعلانات يقلل من جودة إعلانك ويقلل من ظهورك في البحث.</li>--}}
                {{--<li style="margin-top: 10px">التزامك بعدد 6 إعلانات مع حرصك على سداد العمولة و زيادة تقييماتك هو الذي يزيد من ظهورك في البحث.</li>--}}
                {{--<li style="margin-top: 10px">إذا أردت الإعلان أكثر من 6 فيجب حذف أحد الإعلانات السابقة.</li>--}}
                {{--<li style="margin-top: 10px">تحديثك لإعلاناتك السابقة يغنيك عن الإعلانات الجديدة.</li>--}}
                {{--<li style="margin-top: 10px">الإعلان بأكثر من عضوية يتسبب في إيقاف جميع عضوياتك.</li>--}}
                {{--<li style="margin-top: 10px">عدم التزامك بشروط وقوانين الخدمات المكررة يوجب إيقاف عضويتك ولا يحق لك استرداد الرسوم المدفوعة.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h4 style="text-align: right; color: darkgreen; font-family: 'Segoe UI'; font-weight: bold; margin-right: 4%; margin-top: 1%">: أسئلة مكررة</h4>
        </div>
        <div class="col-md-12 col-xs-12 pull-right" style="margin-bottom: 40px">
            @if(count($service_membership_faqs) > 0)
                <ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">
                    @foreach($service_membership_faqs as $service_membership_faq)
                        <li style="margin-top: 20px">{{$service_membership_faq->question}}</li>
                        <p style="text-align: right; margin-top: 1%; color: darkgrey">{{$service_membership_faq->answer}}</p>
                    @endforeach
                </ul>
            @else
                <h5 style="text-align: right; color: darkorange; margin-right: 6%; margin-top: 2%">لم يتم إضافة الأسئلة المتكررة بعد</h5>
            @endif
            {{--<ul dir="rtl" style="text-align: right; font-family: 'Segoe UI'; margin-right: 6%; color: darkgrey">--}}
                {{--<li style="margin-top: 20px">كيف يتم سداد الرسوم ؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">يتم سداد الرسوم عن طريقة شبكة الدفع مدى و يتم التفعيل بشكل تلقائي خلال 24 ساعة .</p>--}}
                {{--<li style="margin-top: 20px">تم سداد الرسوم و لم أجدها في حسابي ؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">إذا تم الدفع عن طريق (مدى) يتم التفعيل بشكل تلقائي خلال 24 ساعة, أما إذا تم الدفع عن طريق التحويل البنكي فيتم التفعيل خلال أسبوع علما أنه سيصلك إشعار عبر الموقع يفيدك بقبول العمولة واحتسابها.</p>--}}
                {{--<li style="margin-top: 20px">هل يمكن استرداد مبلغ الرسوم؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">لا, لا يمكن ذلك.</p>--}}
                {{--<li style="margin-top: 20px">هل الإشتراك يعني الإعفاء من العمولة ؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">لا، الإشتراك لا يعفي من دفع العمولة .</p>--}}
                {{--<li style="margin-top: 20px">ما هي فائدتي من دفع الرسوم ؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">إمكانية الإعلان بالموقع, لم يتم السماح لأي معلن لم يدفع الرسوم بالإعلان عن الخدمات المكررة.</p>--}}
                {{--<li style="margin-top: 20px">هل سداد العمولة يعني استرجاع كافة صلاحيات عضويتي السابقة ؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">لا, ليس بالضرورة يجب أيضا الالتزام بشروط الإعلان عن الخدمات المكررة و تحسين جودة تقديم الخدمات.</p>--}}
                {{--<li style="margin-top: 20px">هل توجد شروط على العضوية ؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">حاليا لا توجد شروط سوى شروط الخدمة و معاهدة استخدام الموقع,مستقبلا سوف نقوم بمنع الأعضاء الذين ليس لديهم تقييمات من الإعلان عن الخدمة لذلك احرص على الحصول على التقييم من عملائك.</p>--}}
                {{--<li style="margin-top: 20px">هل يمكن التجربة قبل دفع الرسوم ؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">لا يمكن التجربة.</p>--}}
                {{--<li style="margin-top: 20px">هل الرسوم ثابتة ؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">الرسوم ليست ثابتة، سيتم رفع السعر مستقبلا الى 1490ريال.</p>--}}
                {{--<li style="margin-top: 20px">هل أستطيع وضع إعلانات مخالفة عند دفع الرسوم؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">لا, يجب التقيد بمعاهدة إستخدام الموقع و سيتم حظر العضوية مباشرة في حال مخالفة قوانين الموقع حتى لو تم دفع رسوم أو عمولات.</p>--}}
                {{--<li style="margin-top: 20px">هل توجد شروط على العضوية؟</li>--}}
                {{--<p style="text-align: right; margin-top: 1%; color: darkgrey">لا توجد سوى شروط الخدمة و معاهدة استخدام الموقع, مستقبلا سوف نقوم بمنع الأعضاء الذين ليس لديهم تقييمات من الإعلان عن الخدمة لذلك إحرص على الحصول على التقييم من عملائك.</p>--}}
            {{--</ul>--}}
        </div>
        <div class="col-md-6 col-xs-10 pull-right">
            <h4 style="margin-right: 4%; text-align: right; color: darkgrey; font-weight: bold">نموذج تحويل الاشتراك</h4>
            <form class="col-md-12 col-xs-12" method="post" action="{{Auth::user()? '/service_membership_subscription' : '/login'}}" enctype="multipart/form-data" style="margin-bottom: 50px; background-color: white; margin-top: 20px">
                @csrf
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5">: رقم الجوال</label><br><br>
                    <input class="form-control pull-right" type="tel" name="phone" placeholder="رقم الجوال" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: أسم المستخدم</label><br>
                    <input class="form-control pull-right" type="tel" name="username" placeholder="أسم المستخدم" value="{{Auth::user() ? Auth::user()->username : ''}}" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: مبلغ الاشتراك</label><br>
                    <input class="form-control pull-right" type="tel" name="money_amount" placeholder="مبلغ الاشتراك" value="{{$service_membership_price!= null ? $service_membership_price->price : ''}}" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" readonly>
                </div>

                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: البنك الذي تم التحويل إليه</label><br>
                    <select dir="rtl" name="bank_name" style="margin-top: 15px; width: 100%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; border-radius: 5px" required>
                        <option selected>إختر اسم البنك</option>
                        @foreach($banks as $bank)
                            <option value="{{$bank->name}}">{{$bank->name}}</option>
                        @endforeach
                        <option value="not_transmitted">لم يتم التحويل</option>
                    </select>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: متى تم التحويل</label><br>
                    <select dir="rtl" name="transformation_time" style="margin-top: 15px; width: 100%; margin-right: 3%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                        <option selected>تم التحويل اليوم</option>
                        <option value="sell_out">تم التحويل يوم أمس</option>
                        <option value="buy_up">تم التحويل يوم قبل أمس</option>
                        <option value="rent">تم التحويل قبل 3 أيام</option>
                        <option value="exchange">تم التحويل قبل اسبوع</option>
                        <option value="exchange">تم التحويل قبل شهر</option>
                        <option value="exchange">لم يتم التحويل</option>
                    </select>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: أسم المحول</label><br>
                    <input type="text" name="transformer_name" placeholder="أسم المحول" style="margin-top: 15px; width: 100%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: ملاحظات</label>
                    <textarea name="notes" style="margin-top: 15px; width: 100%; height: 100px; border: 2px solid lightgrey; text-align: right; border-radius: 5px"></textarea>
                    <p style="font-size: 14px; color: darkgrey; text-align: right">نرجو الحرص على أن تكون معلومات التحويل صحيحة ودقيقه</p>
                </div>
                <div class="pull-right" style="margin-top: 15px; margin-bottom: 20px; margin-right: 6%">
                    <input type="submit" value="إرسال" class="btn btn-primary" style="margin-top: 15px; width: 100px; margin-left: 1%; height: 42px; font-family: 'Segoe UI'; font-size: 18px; text-align: center; border-radius: 5px">
                </div>
            </form>
        </div>
    </div>
@endsection