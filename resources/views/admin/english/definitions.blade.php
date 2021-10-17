@extends('layouts.admin_english')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1">
                @if (session('alert'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                        <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                    </div>
                @endif
                @if($definition != null)
                    <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; font-family: 'Segoe UI'">
                        <span style="color: #24a0ed">: المقدمة</span><br>
                        {{$definition->introduction}}
                    </p>
                    <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; font-family: 'Segoe UI'">
                        <span style="color: #24a0ed">: التعريف</span><br>
                        {{$definition->definition}}
                    </p>
                    <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; font-family: 'Segoe UI'">
                        <span style="color: #24a0ed">: المسؤوليات</span><br>
                        {{$definition->responsibilities}}
                    </p>
                    <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: darkgrey; font-family: 'Segoe UI'">
                        <span style="color: #24a0ed">: الخصوصية</span><br>
                        {{$definition->privacy}}
                    </p>
                @else
                    <h3 style="color: darkorange; text-align: center">لم يتم ادخال المقدمة التعريفية حتى الآن</h3>
                @endif
            </div>
            @if($definition != null)
                <form class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1" method="post" action="/admin/update_definition" style="margin-top: 3%">
                    @csrf
                    {{method_field('put')}}
                    <h5 class="pull-right" style="text-align: right; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: تعديل محتويات المقدمة التعريفية</h5>
                    <textarea name="introduction" class="input-field" placeholder="المقدمة" style="height: 100px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>{{$definition->introduction}}</textarea>
                    <textarea name="definition" class="input-field" placeholder="التعريف" style="height: 100px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>{{$definition->definition}}</textarea>
                    <textarea name="responsibilities" class="input-field" placeholder="المسؤوليات" style="height: 100px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>{{$definition->responsibilities}}</textarea>
                    <textarea name="responsibilities" class="input-field" placeholder="الخصوصية" style="height: 100px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>{{$definition->privacy}}</textarea>
                    <p style="color: darkgrey; font-size: 13px; text-align: right">المعلومات يجب أن تكون مكتوبة بصيغة واضحة ومفهومة وبعيدة عن اللبس<span style="color: darkorange; font-size: 16px">*</span></p>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="تأكيد">
                </form>
            @else
                <form class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1" method="post" action="/admin/store_definition" style="margin-top: 3%">
                    @csrf
                    <h5 class="pull-right" style="text-align: right; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: ادخل محتويات المقدمة التعريفية</h5>
                    <textarea name="introduction" class="input-field" placeholder="المقدمة" style="height: 100px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required></textarea>
                    <textarea name="definition" class="input-field" placeholder="التعريف" style="height: 100px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required></textarea>
                    <textarea name="responsibilities" class="input-field" placeholder="المسؤوليات" style="height: 100px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required></textarea>
                    <textarea name="responsibilities" class="input-field" placeholder="الخصوصية" style="height: 100px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>{{$definition->privacy}}</textarea>
                    <p style="color: darkgrey; font-size: 13px; text-align: right">المعلومات يجب أن تكون مكتوبة بصيغة واضحة ومفهومة وبعيدة عن اللبس<span style="color: darkorange; font-size: 16px">*</span></p>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="ادخال">
                </form>
            @endif
        </div>
    </section>
@endsection