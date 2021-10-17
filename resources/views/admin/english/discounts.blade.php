@extends('layouts.admin_english')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12" style="background-color: white; margin-bottom: 5%">
            @if(count($users) > 0)
                <table class="table table-responsive" style="margin-top: 15px; text-align: center">
                    <tr style="font-size: 20px; font-weight: bold; text-align: center">
                        <th style="border:1px solid black; border-collapse:collapse">نسبة الخصم</th>
                        <th style="border:1px solid black; border-collapse:collapse">التقييم السلبي</th>
                        <th style="border:1px solid black; border-collapse:collapse">التقييم الايجابي</th>
                        <th style="border:1px solid black; border-collapse:collapse">البريد الالكتروني</th>
                        <th style="border:1px solid black; border-collapse:collapse">رقم الهاتف</th>
                        <th style="border:1px solid black; border-collapse:collapse">إسم المستخدم</th>
                    </tr>
                    @foreach($users as $user)
                        <tr style="text-align: center">
                            <td><a title="اضغط لتعديل النسبة" data-toggle="modal" data-target="#editModal" data-myid="{{$user->id}}" data-mydiscount="{{$user->discount}}" id="open" style="{{$user->discount !== null ? 'color: #24a0ed' : ''}}">{{$user->discount == null ? 0 : $user->discount.'%'}}</a></td>
                            <td>{{$user->no_of_dislikes}}</td>
                            <td>{{$user->no_of_likes}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->name}}</td>
                        </tr>
                    @endforeach
                </table>
                {{$users->links()}}
            @else
                <h3 style="text-align: center; color: darkorange">لم يتم تحديد التخفيضات للمستخدمين حتى الآن</h3>
            @endif
        </div>
        <!-- Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" action="/admin/update_discount" method="post">
                                @csrf
                                <input type="hidden" id="id" name="id">
                                <input type="number" id="discount" name="discount"><br>
                                <input type="submit" class="btn btn-primary pull-right" value="حفظ" style="color: white; width: 100px; height: 35px">
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </div>
@endsection