@extends('layouts.admin_english')

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
                @if(count($posts) > 0)
                    @if(isset($q))
                        <h5 style="color: darkorange; font-weight: bold; text-align: center">نتائج البحث</h5><br>
                    @else
                        <h5 style="color: darkorange; font-weight: bold; text-align: center">بيانات كل المنشورات</h5><br>
                    @endif
                    <table class="table table-bordered col-lg-12 col-md-12 col-xs-12" style="margin-top: 15px">
                        <tr style="font-size: 20px; font-weight: bold; border:1px solid black;border-collapse:collapse; text-align: center">
                            <th>عرض المنشور</th>
                            <th>العمولة (بالريال)</th>
                            <th>السعر (بالريال)</th>
                            <th>العنوان</th>
                            <th>اسم الناشر</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr style="text-align: center">
                                <td><a href="/admin/post/{{$post->id}}" style="color:orange">عرض التفاصيل</a></td>
                                <td>{{$post->commission == 'not_payed' ? 'غير مدفوعة' : 'مدفوعة'}}</td>
                                <td>{{$post->price == null ? 'غير محدد' : $post->price}}</td>
                                <td>{{$post->title}}</td>
                                @foreach($users as $user)
                                    @if($user->id == $post->user_id)
                                        <td>{{$user->name}}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                    {{$posts->links()}}
                @else
                    <h3 style="color: darkorange; text-align: center">لا توجد منشورات</h3>
                @endif
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection