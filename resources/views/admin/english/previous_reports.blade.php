@extends('layouts.admin_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: white; margin-bottom: 5%">
            @if(count($previous_reports) > 0)
                <table class="table table-bordered col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12" style="margin-top: 15px; text-align: center">
                    <tr style="font-size: 20px; font-weight: bold; border:1px solid black;border-collapse:collapse; text-align: center">
                        <th>التقرير</th>
                        <th>رقم الاعلان</th>
                        <th>رقم الهاتف</th>
                        <th>الرقم التسلسلي</th>
                        <th>إسم المستخدم</th>
                    </tr>
                    @foreach($previous_reports as $previous_report)
                        <tr style="text-align: center">
                            <td><a href="/admin/view_report/{{$previous_report->id}}" target="_blank">اضغط لعرض التقرير</a></td>
                            <td>{{$previous_report->ads_no == null ? 'غير محدد' : $previous_report->ads_no}}</td>
                            <td>{{$previous_report->phone_no == null ? 'غير محدد' : $previous_report->phone_no}}</td>
                            <td>{{$previous_report->serial_no}}</td>
                            @foreach($users as $user)
                                @if($user->id == $previous_report->user_id)
                                    <td>{{$user->name}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
                {{$previous_reports->links()}}
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3 style="color: darkorange; text-align: center">لا توجد تقارير سابقة</h3>
                </div>
            @endif
        </div>
    </div>
@endsection