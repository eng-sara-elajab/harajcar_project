@extends('layouts.user_english')

@section('content')
    <div class="row container-fluid" style="background-color: whitesmoke">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-11 col-xs-11 pull-right">
            <h4 style="color: black; font-family: 'Segoe UI'; font-weight: bold; text-align: right; margin-right: 4%; opacity: 0.5">توثيق العضوية و إضافة التراخيص</h4>
            <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-right: 4%; margin-top: 2%">. توثيق عضويتك عبر ربطها بمعلوماتك الرسمية يساعد في حماية عضويتك و زيادة مصداقيتها</p>
            <p style="color: darkgrey; font-family: 'Segoe UI'; text-align: right; margin-right: 4%; margin-top: 2%">.بعض الاعلانات عن منتجات او خدمات يتطلب ترخيص رسمي ويجب ان يقوم العضو برفع الترخيص الرسمي عبر هذا النظام. الاعلان مثلا عن خدمات تعقيب يتطلب رخصة تعقيب لممارسة النشاط. يجب من يقوم بعمل إعلانات عن تعقيب ان يقوم بتوثيق رخصة التعقيب الخاصة به. جميع الوثائق الرسمية يتم حفظها بطريقة آمنة و غير قابلة للنشر سوى مع الجهات الرسمية الحكومية في حال طلبها</p>
        </div>
        <div class="col-md-3 col-md-offset-8 col-xs-5 col-xs-offset-6" style="margin-top: 4%; border: solid 1px darkgrey; margin-bottom: 4%; box-shadow: 8px 5px lightgrey">
            <h5 style="text-align: center; font-weight: bold; font-family: 'Segoe UI'; color: darkgrey; margin-top: 15%">صورة الوثيقة</h5>
            <div class="col-md-3 col-md-offset-4 col-xs-4 col-xs-offset-4">
                <i class="fa fa-camera fa-2x pull-right" aria-hidden="true" style="color: darkgrey; margin-top: 20%; margin-bottom: 20%"></i>
            </div>
            <div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-5" style="margin-bottom: 15%">
                <a href="/add_license" class="btn btn-default pull-right" style="color: #0275d8; border: solid 1px #0275d8; text-align: center; background-color: whitesmoke; margin-right: 5%">إضافة وثيقة</a>
            </div>
        </div>
    </div>
@endsection