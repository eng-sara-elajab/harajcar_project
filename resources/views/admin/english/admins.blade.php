@extends('layouts.admin_english')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-md-10 offset-md-1 col-xs-10 offset-xs-1" style="margin-bottom: 1%">
            @if(Auth::guard('admin')->user() == $super_admin)
                <div class="col-md-4 col-xs-4">
                    <a href="/admin/new" class="btn btn-default" style="color: orange">إضافة آدمن</a>
                </div>
            @endif
        </div>
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-12 row" style="margin-bottom: 5%">
            @if(count($admins) > 0)
                <div class="col-md-12 col-xs-12">
                    <h5 style="color: darkorange; font-weight: bold; text-align: center; margin-top: 1%">بيانات كل الآدمن</h5>
                </div>
                @if(Auth::guard('admin')->user()->email == $super_admin->email)
                    <table class="table table-responsive" style="margin-top: 15px; text-align: center">
                        <tr style="font-size: 20px; font-weight: bold; text-align: center">
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">حظر - فك الحظر</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">الصورة الشخصية</th>
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">تعديل البروفايل</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">الحالة</th>
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">تاريخ الإضافة</th>
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">البريد الإلكتروني</th>
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">إسم الآدمن</th>
                            <th style="border: 1px solid darkgrey; border-collapse:collapse">#</th>
                        </tr>
                        @foreach($admins as $admin)
                            <tr style="text-align: center">
                                <td>
                                    @if($admin->id == 1)
                                        <p><i class="fa fa-ban" style="color: darkgrey"></i></p>
                                    @else
                                        @if($admin->active_status == 'active')
                                            <a href="/admin/block/{{$admin->id}}" title="إضغط لحظر الآدمن"><i class="fa fa-ban" style="color: orange"></i></a>
                                        @else
                                            <a href="/admin/unblock/{{$admin->id}}" title="إضغط لفك حظر الآدمن"><i class="fa fa-unlock" style="color: orange"></i></a>
                                        @endif
                                    @endif
                                </td>
                                @if($admin->profile_photo == null)
                                    <td><img src="/images/profiles/default_profile.jpg" style="width: 80px; height: 80px"></td>
                                @else
                                    <td><img src="/images/profiles/{{$admin->profile_photo}}" style="width: 80px; height: 80px"></td>
                                @endif
                                <td><a href="/admin/profile/{{$admin->id}}" title="إضغط لتعديل بيانات الآدمن" target="_blank">تعديل الملف الشخصي</a></td>
                                <td>{{$admin->created_at}}</td>
                                <td>{{$admin->active_status}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->id}}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <table class="table table-responsive" style="margin-top: 15px">
                        <tr style="font-size: 20px; font-weight: bold; text-align: center">
                            <th style="border:1px solid darkgrey;border-collapse:collapse">الصورة الشخصية</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">تاريخ الإضافة</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">الحالة</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">البريد الإلكتروني</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">إسم الآدمن</th>
                            <th style="border:1px solid darkgrey;border-collapse:collapse">#</th>
                        </tr>
                        @foreach($admins as $admin)
                            <tr style="text-align: center">
                                @if($admin->profile_photo == null)
                                    <td><img src="/images/profiles/default_profile.jpg" style="width: 80px; height: 80px"></td>
                                @else
                                    <td><img src="/images/profiles/{{$admin->profile_photo}}" style="width: 80px; height: 80px"></td>
                                @endif
                                <td>{{$admin->created_at}}</td>
                                <td>{{$admin->active_status}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->id}}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            @else
                <h3 style="color: darkorange; text-align: center">لا يوجد آدمن</h3>
            @endif
            {{$admins->links()}}
        </div>
    </div>
@endsection