@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        @if (session('alert'))
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default">
                <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 35px; margin-bottom: 5%">
            <div class="col-md-12 col-xs-12">
                <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px; border: solid 1px #0275d8; border-radius: 50%">&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;</a></p>
            </div>
            <h1 style="text-align: center; color: #007500; margin-top: 5%; font-family: 'Segoe UI'">تقارير موجز</h1><br>
            @if(count($previous_reports) > 0)
                <table class="table table-bordered border-responsive" style="margin-top: 15px">
                    <tr style="font-size: 20px; font-weight: bold">
                        <th style="border:1px solid black;border-collapse:collapse; text-align: center">رقم الاعلان</th>
                        <th style="border:1px solid black;border-collapse:collapse; text-align: center">رقم الهاتف</th>
                        <th style="border:1px solid black;border-collapse:collapse; text-align: center">ارقام السيارة - بالانجليزية</th>
                        <th style="border:1px solid black;border-collapse:collapse; text-align: center">ارقام السيارة - بالعربية</th>
                        <th style="border:1px solid black;border-collapse:collapse; text-align: center">الرقم التسلسلي</th>
                        <th style="border:1px solid black;border-collapse:collapse; text-align: center">إسم ملف التقرير</th>
                    </tr>
                    @foreach($previous_reports as $previous_report)
                        <tr style="text-align: center">
                            <td>{{$previous_report->ads_no == null ? 'غير محدد' : $previous_report->ads_no}}</td>
                            <td>{{$previous_report->phone_no == null ? 'غير محدد' : $previous_report->phone_no}}</td>
                            <td>{{$previous_report->plate_info_in_english}}</td>
                            <td>{{$previous_report->plate_info_in_arabic}}</td>
                            <td>{{$previous_report->serial_no}}</td>
                            <td><a href="/view_selected_report/{{$previous_report->id}}" target="_blank" title="اضغط لعرض التقرير" style="color: darkgrey; font-family: 'Segoe UI'; margin-top: 5%; margin-bottom: 5%; margin-right: 20px; color: #24a0ed">{{$previous_report->report_file_name}}</a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h5 style="text-align: center; color: darkorange; margin-bottom: 15%">لا توجد تقارير</h5>
            @endif
        </div>
    </div>
@endsection