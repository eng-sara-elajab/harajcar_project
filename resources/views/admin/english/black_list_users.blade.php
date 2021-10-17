@extends('layouts.admin_english')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
                @if (session('alert'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                        <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                    </div>
                @endif
                <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" method="post" action="/admin/store_black_list_user">
                    @csrf
                    <h5 class="pull-right" style="text-align: right; font-family: 'Segoe UI'; color: black; margin-bottom: 3%; opacity: 0.5">: أضف مستخدم جديد</h5>
                    <select class="input-field" dir="rtl" name="user_id" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                        <option value="">&nbsp;&nbsp;اختر المستخدم</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">&nbsp;&nbsp;{{$user->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="إضافة">
                </form>
                @if(count($black_list_users) > 0)
                    <ul dir="rtl" style="margin-top: 5%">
                        @foreach($black_list_users as $black_list_user)
                            <li style="text-align: right; font-size: 18px; font-family: 'Segoe UI'; color: darkgrey" class="row">
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">{{$black_list_user->name}}</div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">
                                    <a href="/admin/delete_black_list_user/{{$black_list_user->id}}" class="pull-left" style="margin-left: 30%"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                </div>
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                @else
                    <br><h3 style="color: darkorange; text-align: center">لا يوجد مستخدمين فى القائمة السوداء حتى الآن</h3>
                @endif
            </div>
        </div>
    </section>
@endsection