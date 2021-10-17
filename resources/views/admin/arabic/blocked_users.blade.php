@extends('layouts.admin_arabic')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @if (session('alert'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                        <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                    </div>
                @endif<br>
                @if(count($users) > 0)
                    <h5 style="color: darkorange; font-weight: bold; text-align: center">المستخدمين المحظورين</h5><br>
                    <table class="table table-responsive" style="margin-top: 15px; text-align: center">
                        <tr style="font-size: 20px; font-weight: bold">
                            <th style="border:1px solid black;border-collapse:collapse; text-align: center">فك الحظر</th>
                            <th style="border:1px solid black;border-collapse:collapse; text-align: center">عرض البروفايل</th>
                            <th style="border:1px solid black;border-collapse:collapse; text-align: center">عدد مرات الإبلاغ عنه</th>
                            <th style="border:1px solid black;border-collapse:collapse; text-align: center">الصورة الشخصية</th>
                            <th style="border:1px solid black;border-collapse:collapse; text-align: center">البريد الإلكتروني</th>
                            <th style="border:1px solid black;border-collapse:collapse; text-align: center">رقم الهاتف</th>
                            <th style="border:1px solid black;border-collapse:collapse; text-align: center">إسم المستخدم</th>
                            <th style="border:1px solid black;border-collapse:collapse; text-align: center">الإسم الكامل</th>
                        </tr>
                        @foreach($users as $user)
                            <tr style="text-align: center">
                                <td><a href="/user/unblock/{{$user->id}}" style="color:orange"><i class="fa fa-unlock" aria-hidden="true"></i></a></td>
                                <td><a href="/admin/view_user_profile/{{$user->id}}" style="color:orange">إضغط للتفاصيل</a></td>
                                <td>{{$user->reports}}</td>
                                <td><img src="/images/profiles/{{$user->profile_photo}}" style="height:50px; width: 50px"></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{$users->links()}}
                @else
                    <h3 style="color: darkorange; text-align: center">لا يوجد مستخدمين</h3>
                @endif
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection