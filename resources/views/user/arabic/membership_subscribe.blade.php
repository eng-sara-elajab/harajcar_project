@extends('layouts.user_arabic')

@section('content')
    <div class="row container-fluid">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-md-12 col-xs-12">
            <h3 style="margin-right: 4%; text-align: right; color: darkgreen; font-weight: bold">عضوية معارض السيارات و مكاتب العقار</h3>
            <p style="margin-right: 4%; text-align: right; color: darkgrey; margin-top: 2%; font-size: 20px"><span style="font-weight: bold">العرض الأول : </span> اشتراك لمدة سنة بسعر {{$membership_price!= null ? $membership_price->price : 'غير محدد'}} ريال</p>
            <p style="margin-right: 4%; text-align: right; color: darkgrey; margin-top: 2%; font-size: 20px">: خطوات الاشتراك</p>
            <p style="margin-right: 4%; text-align: right; color: darkgrey; margin-top: 1%; font-size: 20px"><span style="font-weight: bold">الخطوة الأولى : </span> قم بتحويل مبلغ الاشتراك على حساباتنا البنكية الموضحة في <a href="/website_commission" style="color:#24a0ed;">صفحة حساب العمولة</a></p>
            <p style="margin-right: 4%; text-align: right; color: darkgrey; margin-top: 1%; font-size: 20px"><span style="font-weight: bold">الخطوة الثانية : </span>بعد تحويل مبلغ الاشتراك، يجب تعبئة النموذج التالي</p>
        </div>
        <div class="col-md-6 col-xs-10 pull-right">
            <h4 style="margin-right: 4%; text-align: right; color: darkgrey; font-weight: bold">نموذج تحويل الاشتراك</h4>
            <form class="col-md-12 col-xs-12" method="post" action="{{Auth::user()? '/membership/subscribe' : '/login'}}" enctype="multipart/form-data" style="margin-bottom: 50px; background-color: white; margin-top: 20px">
                @csrf
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5">: رقم الجوال</label><br>
                    <input class="form-control pull-right" type="tel" name="phone" placeholder="رقم الجوال" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: أسم المستخدم</label><br>
                    <input class="form-control pull-right" type="tel" name="username" placeholder="أسم المستخدم" value="{{Auth::user() ? Auth::user()->username : ''}}" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: مبلغ الاشتراك</label><br>
                    <input class="form-control pull-right" type="tel" name="money_amount" placeholder="مبلغ الاشتراك" value="{{$membership_price!= null ? $membership_price->price : ''}}" style="width: 85%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" readonly>
                </div>

                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: البنك الذي تم التحويل إليه</label><br>
                    <select dir="rtl" name="bank_name" style="margin-top: 15px; width: 100%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; border-radius: 5px" required>
                        <option value="">إختر اسم البنك</option>
                        @foreach($banks as $bank)
                            <option value="{{$bank->name}}">{{$bank->name}}</option>
                        @endforeach
                        <option value="not_transmitted">لم يتم التحويل</option>
                    </select>
                </div>
                <div style="font-family: 'Segoe UI'; margin-right: 6%; font-size: 18px">
                    <label class="pull-right" style="color: black; opacity: 0.5; margin-top: 3%">: متى تم التحويل</label><br>
                    <select dir="rtl" name="transformation_time" style="margin-top: 15px; width: 100%; margin-right: 3%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; text-align: right; border-radius: 5px" required>
                        <option value="">متى تم التحويل</option>
                        <option value="تم التحويل اليوم">تم التحويل اليوم</option>
                        <option value="تم التحويل يوم أمس">تم التحويل يوم أمس</option>
                        <option value="تم التحويل يوم قبل أمس">تم التحويل يوم قبل أمس</option>
                        <option value="تم التحويل قبل 3 أيام">تم التحويل قبل 3 أيام</option>
                        <option value="تم التحويل قبل اسبوع">تم التحويل قبل اسبوع</option>
                        <option value="تم التحويل قبل شهر">تم التحويل قبل شهر</option>
                        <option value="لم يتم التحويل">لم يتم التحويل</option>
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
                    <input type="submit" value="إرسال" class="btn btn-primary" style="margin-top: 15px; width: 100px; margin-left: 1%; height: 42px; font-family: 'Segoe UI'; font-size: 18px; text-align: center; border-radius: 5px" required>
                </div>
            </form>
        </div>
    </div>
@endsection