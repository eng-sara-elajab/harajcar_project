@extends('layouts.admin_english')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12">
                @if (session('alert'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                        <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                    </div>
                @endif
                <br><h5 style="font-family: 'Segoe UI'; text-align: center; color: #24a0ed">استمارة اضافة حساب جديد</h5><br>
                <form class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12" method="post" action="/admin/store_account" enctype="multipart/form-data" style="border: solid 1px lightgrey">
                    @csrf
                    <br>
                    <p class="pull-right" style="text-align: right; font-size: 20px; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: رقم الحساب</p>
                    <input type="number" name="account_no" class="input-field" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <p class="pull-right" style="text-align: right; font-size: 20px; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: الايبان</p>
                    <input type="number" name="iban_no" class="input-field" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <p class="pull-right" style="text-align: right; font-size: 20px; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: مالك الحساب</p>
                    <input type="text" name="account_owner" class="input-field" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <p class="pull-right" style="text-align: right; font-size: 20px; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: الشعار</p>
                    <input type="file" dir="rtl" name="logo" class="input-field" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="إضافة">
                    <br>
                </form>
                @if(count($system_accounts) > 0)
                    <ul style="margin-top: 5%">
                        @foreach($system_accounts as $system_account)
                            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-3">
                                    <img src="/images/accounts/{{$system_account->logo}}" style="height: 120px; width: 100%">
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-9">
                                    <p style="text-align: right; font-size: 18px; font-family: 'Segoe UI'; color: darkgrey"><span style="color: #5bc0de">رقم الحساب :</span>&nbsp;{{$system_account->account_no}}</p>
                                    <p style="text-align: right; font-size: 18px; font-family: 'Segoe UI'; color: darkgrey"><span style="color: #5bc0de">الايبان :</span>&nbsp;{{$system_account->iban_no}}</p>
                                    <p style="text-align: right; font-size: 18px; font-family: 'Segoe UI'; color: darkgrey"><span style="color: #5bc0de">إسم مالك الحساب :</span>&nbsp;{{$system_account->account_owner}}</p>
                                    <p style="text-align: right; font-size: 18px; font-family: 'Segoe UI'; color: darkgrey"><span style="color: #5bc0de"><a class="btn btn-default" style="width: 80px" href="/admin/delete_account/{{$system_account->id}}"><i class="fa fa-minus-circle" style="color: red"></i></a>&nbsp;: إضغط لحذف الحساب</span></p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </ul>
                    {{$system_accounts->links()}}
                @else
                    <br><h3 style="color: darkorange; text-align: center">لا توجد حسابات للنظام حتى الآن</h3>
                @endif
            </div>
        </div>
    </section>
@endsection