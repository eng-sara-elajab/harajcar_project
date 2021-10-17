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
            </div>
            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12">
                @if(count($posts) > 0)
                    <h5 style="color: darkorange; font-weight: bold; text-align: center">بيانات المنشورات التي تم التبليغ عنها</h5><br>
                    <table class="table table-responsive" style="margin-top: 15px">
                        <tr style="font-size: 20px; font-weight: bold">
                            <th style="border:1px solid darkgrey; border-collapse:collapse; text-align: center">حذف المنشور</th>
                            <th style="border:1px solid darkgrey; border-collapse:collapse; text-align: center">عرض المنشور</th>
                            <th style="border:1px solid darkgrey; border-collapse:collapse; text-align: center">اسم الناشر</th>
                            <th style="border:1px solid darkgrey; border-collapse:collapse; text-align: center">السعر</th>
                            <th style="border:1px solid darkgrey; border-collapse:collapse; text-align: center">رقم الهاتف</th>
                            <th style="border:1px solid darkgrey; border-collapse:collapse; text-align: center">العنوان</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr style="text-align: center">
                                <td><a href="/post/delete/{{$post->id}}" style="color:orange"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                <td><a href="/admin/post/{{$post->id}}" style="color:orange">عرض التفاصيل</a></td>
                                @foreach($users as $user)
                                    @if($user->id == $post->user_id)
                                        <td>{{$user->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$post->price == null ? 'غير محدد' : $post->price}}</td>
                                <td>{{$post->phone}}</td>
                                <td>{{$post->title}}</td>
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