@extends('layouts.user_arabic')

@section('content')
    <div class="row container-fluid" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-md-6 col-xs-12">
            <img src="https://embedwistia-a.akamaihd.net/deliveries/2c2167a8bbe1bee9ed24e1dc9a0c47b7.webp?image_crop_resized=960x540" style="width: 90%; margin-left: 5%">
        </div>
        <div class="col-md-5 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h1 style="text-align: right; font-weight: bold; font-family: 'Segoe UI'"> بيع منتجك بعمولة 1% فقط في {{$website_data->arabic_name}}</h1><br><br>
            <p style="font-size: 16px; font-family: 'Segoe UI'; text-align: right">العمولة أمانة في ذمة المعلن سواء تمت المبايعة عن طريق الموقع أو بسببه، وموضحة قيمتها بما يلي</p><br>
            <a href="#commission_calculator" class="btn btn-primary pull-right" style="width: 150px; font-size: 16px; font-family: 'Segoe UI'; font-weight: bold; text-align: center"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;حساب العمولة</a>
        </div>
        <div class="col-md-1 col-md-offset-4 col-xs-2 pull-right" style="margin-top: 90px; margin-right: 2%">
            <i class="fa fa-car fa-stack-2x" aria-hidden="true" style="width: 70px; height: 70px; color: #0275d8; background: #add8e6; border-radius: 50%; padding-top: 15%"></i><br><br><br>
        </div>
        <div class="col-md-12 col-xs-12 pull-right">
            <h3 style="font-family: 'Segoe UI'; font-weight: bold; color: #0275d8; text-align: right">عمولة السيارات</h3><br><br>
        </div>
        <div class="col-md-6 col-xs-12 pull-right">
            <ul style="margin-right: 20px">
                <li dir="rtl" style="text-align: right; font-family: 'Segoe UI'; font-size: 16px">بيع السيارات:1% من قيمة السيارة.</li><br>
                <li dir="rtl" style="text-align: right; font-family: 'Segoe UI'; font-size: 16px">سيارات للتنازل:1% من قيمة التنازل إذا كان التنازل بمقابل.</li><br>
                <li dir="rtl" style="text-align: right; font-family: 'Segoe UI'; font-size: 16px">تبادل السيارات:1% من قيمة المبادلة إذا كان هناك مقابل للمبادلة.</li><br>
            </ul>
        </div>
        <div class="col-md-12 col-xs-12" id="commission_calculator">
            <p style="text-align: center; color: #0275d8; font-family: bold; font-size: 50px">حساب العمولة</p>
        </div>
        <div class="col-md-8 col-md-offset-3 col-xs-12">
            <form class="col-md-8 col-xs-6" oninput="x.value=0.1*parseInt(a.value)">
                <input type="number" class="pull-righ input-field" id="a" placeholder="بالريال" style="height: 40px; width: 95%; margin-left: 10%; border: solid 1px lightgrey; text-align: left"><br>
                <output name="x" class="pull-righ" for="a" style="font-size: 25px; font-family: 'Segoe UI'; margin-left: 10%; width: 95%; height: 40px; text-align: left; margin-bottom: 20px; border: solid 1px lightgrey; border-radius: 5px; background-color: white; box-shadow: 3px 3px 3px 3px lightgrey; opacity: 0.8"></output>
            </form>
            <div class="col-md-4 col-xs-6">
                <span style="font-size: 20px; font-family: 'Segoe UI'; width: 20%; margin-top: 10%; margin-left: 10%">: أدخل سعر البيع</span><br><br>
                <span style="font-size: 20px; font-family: 'Segoe UI'; width: 20%; margin-top: 10%; margin-left: 1%">: العمولة المستحقة</span><br><br>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <p style="text-align: center; font-size: 25px; font-family: 'Segoe UI'; font-weight: bold; margin-top: 5%">طريقة الدفع</p>
            <p style="text-align: center; font-size: 16px; font-family: 'Segoe UI'; font-weight: bold; margin-top: 4%; color: orange">الدفع بالتحويل البنكي لأحد الحسابات التالية ثم تعبئة <a href="#commission_form" style="color: #0275d8">نموذج التحويل</a> والانتظار اسبوع للتفعيل&nbsp;&nbsp;<i class="fa fa-exclamation-circle" style="color: orange" aria-hidden="true"></i></p>
        </div>
        <div class="col-md-10 col-md-offset-2 col-xs-12 pull-right">
            @if(count($system_accounts) > 0)
                @foreach($system_accounts as $system_account)
                    <div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">
                        <img src="/images/accounts/{{$system_account->logo}}" style="height: 25px; width: 25px; margin-top: 10px">
                        <p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>
                        <p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">{{$system_account->account_no}}</p>
                        <p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>
                        <p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">{{$system_account->iban_no}}</p>
                        <p style="font-size: 16px; font-family: 'Segoe UI'">{{$system_account->account_owner}}</p>
                    </div>
                @endforeach
            @else
                <div class="col-md-4 col-md-offset-3 col-xs-10 col-xs-offset-1">
                    <h3 style="text-align: center; margin-top: 50px">لا توجد حسابات مسجلة للموقع</h3>
                </div>
            @endif
            {{--<div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">--}}
                {{--<img src="https://cdn4.vectorstock.com/i/1000x1000/48/68/your-logo-here-placeholder-symbol-vector-34954868.jpg" style="height: 25px; width: 25px; margin-top: 10px">--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">9001201393</p>--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">SA62 4000 0000 0090 0120 1393</p>--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'">MAWQA HARAJ EST</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">--}}
                {{--<img src="https://cdn4.vectorstock.com/i/1000x1000/48/68/your-logo-here-placeholder-symbol-vector-34954868.jpg" style="height: 25px; width: 25px; margin-top: 10px">--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">9001201393</p>--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">SA62 4000 0000 0090 0120 1393</p>--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'">MAWQA HARAJ EST</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">--}}
                {{--<img src="https://cdn4.vectorstock.com/i/1000x1000/48/68/your-logo-here-placeholder-symbol-vector-34954868.jpg" style="height: 25px; width: 25px; margin-top: 10px">--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">9001201393</p>--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">SA62 4000 0000 0090 0120 1393</p>--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'">MAWQA HARAJ EST</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">--}}
                {{--<img src="https://cdn4.vectorstock.com/i/1000x1000/48/68/your-logo-here-placeholder-symbol-vector-34954868.jpg" style="height: 25px; width: 25px; margin-top: 10px">--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">9001201393</p>--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">SA62 4000 0000 0090 0120 1393</p>--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'">MAWQA HARAJ EST</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">--}}
                {{--<img src="https://cdn4.vectorstock.com/i/1000x1000/48/68/your-logo-here-placeholder-symbol-vector-34954868.jpg" style="height: 25px; width: 25px; margin-top: 10px">--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">9001201393</p>--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">SA62 4000 0000 0090 0120 1393</p>--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'">MAWQA HARAJ EST</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">--}}
                {{--<img src="https://cdn4.vectorstock.com/i/1000x1000/48/68/your-logo-here-placeholder-symbol-vector-34954868.jpg" style="height: 25px; width: 25px; margin-top: 10px">--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">9001201393</p>--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">SA62 4000 0000 0090 0120 1393</p>--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'">MAWQA HARAJ EST</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">--}}
                {{--<img src="https://cdn4.vectorstock.com/i/1000x1000/48/68/your-logo-here-placeholder-symbol-vector-34954868.jpg" style="height: 25px; width: 25px; margin-top: 10px">--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">9001201393</p>--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">SA62 4000 0000 0090 0120 1393</p>--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'">MAWQA HARAJ EST</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 5px; font-weight: bold; margin-top: 15px; margin-left: 20px">--}}
                {{--<img src="https://cdn4.vectorstock.com/i/1000x1000/48/68/your-logo-here-placeholder-symbol-vector-34954868.jpg" style="height: 25px; width: 25px; margin-top: 10px">--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">رقم الحساب</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #0275d8">9001201393</p>--}}
                {{--<p style="text-align: right; font-size: 10px; font-family: 'Segoe UI'">الايبان</p>--}}
                {{--<p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: lightgrey">SA62 4000 0000 0090 0120 1393</p>--}}
                {{--<p style="font-size: 16px; font-family: 'Segoe UI'">MAWQA HARAJ EST</p>--}}
            {{--</div>--}}
        </div>
        <div class="col-md-12 col-xs-12" id="commission_form" style="margin-top: 5%">
            <p style="text-align: center; color: #0275d8; font-family: bold; font-size: 30px; font-family: 'Segoe UI'; font-weight: bold">نموذج تحويل العمولة</p>
        </div>
        <div class="col-md-12 col-xs-12" style="margin-top: 3%">
            <p style="text-align: center; font-family: bold; font-size: 16px; font-family: 'Segoe UI'">بعد إرسال المبلغ ، يجب مراسلتنا عبر النموذج التالي لأجل تسجيل العمولة بأسم عضويتك ثم الحصول على مميزات الموقع الخاصة بالعملاء</p>
        </div>
        <form class="col-md-10 col-md-offset-1 col-xs-12" method="post" action="{{Auth::user()? '/website_commission' : '/login'}}" enctype="multipart/form-data" style="margin-bottom: 50px; background-color: white; margin-top: 20px">
            @csrf
            <div class="col-md-4 col-xs-12" style="margin-top: 15px">
                <label class="pull-right" style="font-family: 'Segoe UI'">: *البنك الذي تم التحويل إليه</label>
                <select dir="rtl" name="bank_name" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; border-radius: 5px" required>
                    <option value="">إختر اسم البنك</option>
                    @foreach($banks as $bank)
                        <option value="{{$bank->name}}">{{$bank->name}}</option>
                    @endforeach
                    <option value="charity">تم التصدق بالعمولة</option>
                    <option value="not_transmitted">لم يتم التحويل</option>
                </select>
            </div>
            <div class="col-md-4 col-xs-12" style="margin-top: 15px">
                <label class="pull-right" style="font-family: 'Segoe UI'">: *مبلغ العمولة</label>
                <input type="number" name="commission" value="0" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
            </div>
            <div class="col-md-4 col-xs-12" style="margin-top: 15px">
                <label class="pull-right" style="font-family: 'Segoe UI'; margin-right: 20px">: *إسم المستخدم</label>
                <p style="text-align: right; font-family: bold; font-size: 18px; font-family: 'Segoe UI'; color: #0275d8; margin-top: 40px; width: 96%">{{Auth::user() ? Auth::user()->name : 'Not Assigned'}}</p>
            </div>
            <div class="col-md-12 col-xs-12" style="margin-top: 15px">
                <div class="col-md-4 col-xs-12">
                    <label class="pull-right" style="font-family: 'Segoe UI'">: متى تم التحويل</label>
                    <select dir="rtl" name="transformation_time" style="margin-top: 15px; width: 100%; margin-right: 3%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                        <option value="">حدد زمن التحويل</option>
                        <option value="تم التحويل اليوم">تم التحويل اليوم</option>
                        <option value="تم التحويل يوم أمس">تم التحويل يوم أمس</option>
                        <option value="تم التحويل يوم قبل أمس">تم التحويل يوم قبل أمس</option>
                        <option value="تم التحويل قبل 3 أيام">تم التحويل قبل 3 أيام</option>
                        <option value="تم التحويل قبل اسبوع">تم التحويل قبل اسبوع</option>
                        <option value="تم التحويل قبل شهر">تم التحويل قبل شهر</option>
                        <option value="لم يتم التحويل">لم يتم التحويل</option>
                    </select>
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="pull-right" style="font-family: 'Segoe UI'">: *أسم المحول</label>
                    <input type="text" name="transformer_name" style="margin-top: 15px; width: 100%; margin-left: 1%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="pull-right" style="font-family: 'Segoe UI'">: *رقم الجوال المرتبط بعضويتك</label>
                    <input type="tel" name="phone" value="{{Auth::user() ? Auth::user()->phone : '+966580204026'}}" style="margin-top: 15px; width: 100%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right" required>
                </div>
            </div>
            <div class="col-md-12 col-xs-12" style="margin-top: 15px">
                <div class="col-md-8 col-xs-12">
                    <label class="pull-right" style="font-family: 'Segoe UI'">: ملاحظات</label>
                    <input type="text" name="notes" placeholder="optional" style="margin-top: 15px; width: 100%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px">
                    <p style="font-size: 14px; font-family: 'Segoe UI'; color: darkgrey; text-align: right">نرجو الحرص على أن تكون معلومات التحويل صحيحة ودقيقه</p>
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="pull-right" style="font-family: 'Segoe UI'">: رقم الإعلان</label>
                    <input type="number" name="ads_no" style="margin-top: 15px; width: 100%; margin-left: 1%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div class="col-md-4 col-xs-12 pull-right" style="margin-top: 15px; margin-bottom: 20px">
                    <label class="pull-right" style="font-family: 'Segoe UI'">: صورة ايصال التحويل</label>
                    <input type="file" name="bill" style="margin-top: 15px; width: 100%; margin-left: 1%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4 col-xs-12" style="margin-top: 15px; margin-bottom: 20px">
                <input type="submit" value="إرسال" class="btn btn-block btn-primary" style="margin-top: 15px; width: 100%; margin-left: 1%; height: 42px; font-family: 'Segoe UI'; font-size: 18px; text-align: center; border-radius: 5px" required>
            </div>
        </form>
    </div>
@endsection