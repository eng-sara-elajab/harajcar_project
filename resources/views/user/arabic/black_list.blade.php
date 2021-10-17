@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-12 row" style="background-color: #dce7f3; margin-top: 1%; position: relative; height: 300px">
            <div class="col-md-12 col-xs-12" style="position: absolute; margin-top: 5%; text-align: center; font-family: 'Segoe UI'">
                <h4 style="font-weight: bold">أبحث في القائمة السوداء</h4>
                <p style="color: darkgrey; margin-top: 2%; font-size: 16px">القائمة السوداء هي قائمة بإرقام حسابات وأرقام جوالات من يقومون بإساءة إستخدام الموقع لأغراض ممنوعه مثل الغش أو الأحتيال أو مخالفة قوانين الموقع</p>
            </div><br><br><br><br><br><br><br>
            <form action="{{ route('search.route') }}" method="post" role="search" class="searchbox col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-1" style="position: absolute">
                @csrf
                <input type="text" class="black_list_placeholder" name="q" placeholder="رقم هاتف العضو أو الجوال">
                <input type="submit" class="btn btn-block black_list_submit_button" value="تحقق">
            </form>
        </div>
        @if(isset($q))
            <div class="col-md-10 col-md-offset-1 col-xs-12 row" style="background-color: #dce7f3; margin-top: 1%; position: relative">
                @if($r == 1)
                    @if(count($black_list_users) > 0)
                        @foreach($black_list_users as $black_list_user)
                            <p style="text-align: center; font-family: 'Segoe UI'; font-size: 18px; color: red"> موجود في القائمة السوداء وتم التبليغ عنه أكثر من 50 مرة <a href="/user/profile/{{$black_list_user->user_id}}" style="color: #0275d8">{{$black_list_user->name}}</a></p>
                        @endforeach
                    @else
                        <p style="text-align: center; font-family: 'Segoe UI'; font-size: 18px; color: green">المستخدم غير موجود في القائمة السوداء</p>
                    @endif
                @else
                    <p style="text-align: center; font-family: 'Segoe UI'; font-size: 18px; color: red">رقم الهاتف المدخل غير صحيح</p>
                @endif
            </div>
        @endif
        @if(count($avoid_scams) > 0 || count($frauds) > 0 || count($personal_safety) > 0)
            <div class="col-md-12 col-xs-12">
                <h5 style="text-align: center; font-family: 'Segoe UI'; font-weight: bold; margin-top: 25px; margin-bottom: 25px">ارشادات البيع والتعامل</h5>
            </div>
        @else
            <div class="col-md-12 col-xs-12">
                <h5 style="text-align: center; font-family: 'Segoe UI'; font-weight: bold; margin-top: 25px; margin-bottom: 25px; color: darkorange">لم يتم ادخال ارشادات البيع والتعامل من قبل الادارة حتى الان</h5>
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1" style="background-color: white; height: auto; border-radius: 15px; margin-bottom: 40px;  font-family: 'Segoe UI'">
            @if(count($avoid_scams) > 0)
                <h5 style="text-align: center; font-weight: bold; margin-top: 30px; margin-bottom: 30px">تجنب حالات النصب والاحتيال</h5>
                @foreach($avoid_scams as $avoid_scam)
                    <p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">{{$avoid_scam->description}}</p>
                @endforeach
            @endif
            {{--<h5 style="text-align: center; font-weight: bold; margin-top: 30px; margin-bottom: 30px">تجنب حالات النصب والاحتيال</h5>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. يفضل التعامل وجهًا لوجه - عند اتباعك لهذه القاعدة فأنت تتجنب 99٪ من محاولات الاحتيال</p>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. اطلع على تقييمات المعلن وآراء الآخرين حوله وفترة انضمامه للموقع</p>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. تجنب أعطاء بيانات حسابك في حراج لأي شخص حتى لو ادعى انه من موظفي حراج</p>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. تتم المعاملات بين طرفين فقط، وجود طرف ثالث قد يعني الاحتيال</p>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. تجنب قبول الشيكات أو المبالغ المالية (الصرف) قبولك لمبالغ مالية مزيفة قد يحملك المسؤولية في البنوك</p>--}}

            @if(count($frauds) > 0)
                <h5 style="text-align: center; font-weight: bold; margin-top: 30px; margin-bottom: 30px">كيف تعرف المحتال</h5>
                @foreach($frauds as $fraud)
                    <p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">{{$fraud->description}}</p>
                @endforeach
            @endif
            {{--<h5 style="text-align: center; font-weight: bold; margin-top: 30px; margin-bottom: 30px">كيف تعرف المحتال</h5>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. عدم القدرة أو رفض الالتقاء وجهاً لوجه لإتمام الصفقة</p>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px"><span>Western Union, Paypal</span>&nbsp;طلب الدفع أو تحويل الأموال عن طريق</p>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. السؤال عن السلعة بطريقة غريبة</p>--}}

            @if(count($personal_safety) > 0)
                <h5 style="text-align: center; font-weight: bold; margin-top: 30px; margin-bottom: 30px">السلامة الشخصية</h5>
                @foreach($personal_safety as $one_personal_safety)
                    <p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">{{$one_personal_safety->description}}</p>
                @endforeach
            @endif
            {{--<h5 style="text-align: center; font-weight: bold; margin-top: 30px; margin-bottom: 30px">السلامة الشخصية</h5>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. كن حذرا عند شراء السلع الثمينة</p>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. أخبر صديقًا أو فردًا من العائلة قبل مقابلتك للطرف الآخر</p>--}}
            {{--<p style="text-align: right; margin-top: 15px; margin-bottom: 15px; color: darkgrey; font-size: 16px">. في حالة تعرضك لعملية نصب توجه للجهات الأمنية أو بلغ عبر بوابة كلنا أمن</p>--}}
        </div>
    </div>
@endsection