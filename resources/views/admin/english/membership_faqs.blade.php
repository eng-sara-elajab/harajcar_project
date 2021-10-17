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
                <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" method="post" action="/admin/store_membership_faq">
                    @csrf
                    <input type="text" name="question" class="input-field" placeholder="السؤال" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <input type="text" name="answer" class="input-field" placeholder="الإجابة" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="إضافة">
                </form>
                @if(count($membership_faqs) > 0)
                    <ul dir="rtl" style="margin-top: 5%" class="row">
                        @foreach($membership_faqs as $membership_faq)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: darkgrey">{{$membership_faq->question}}</p>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row" style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #24a0ed; margin-right: 20px">
                                <div  class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style="text-align: right">{{$membership_faq->answer}}</div>
                                <div  class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <a href="/admin/delete_membership_faq/{{$membership_faq->id}}" class="pull-left" style="margin-left: 35px; text-align: left"><i class="fa fa-minus-circle" style="color: red"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                            </div>
                        @endforeach
                    </ul>
                    {{$membership_faqs->links()}}
                @else
                    <br><h3 style="color: darkorange; text-align: center">لا توجد أسئلة حتى الآن</h3>
                @endif
            </div>
        </div>
    </section>
@endsection