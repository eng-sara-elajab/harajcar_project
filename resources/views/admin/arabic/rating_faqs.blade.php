@extends('layouts.admin_arabic')

@section('content')
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
                @if (session('alert'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-default" style="width: 50%; margin: auto">
                        <p style="color: #24a0ed; font-family: Cambria; font-size: 22px; text-align: center; font-weight: bold">{{ session('alert') }}</p>
                    </div>
                @endif
                <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" method="post" action="/admin/store_rating_faq">
                    @csrf
                    <input type="text" name="question" class="input-field" placeholder="السؤال" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <input type="text" name="answer" class="input-field" placeholder="الإجابة" style="height: 50px; width: 100%; border: solid 1px darkgrey; border-radius: 15px" required>
                    <input type="submit" class="btn btn-primary btn-block" style="height: 50px; width: 100%; border-radius: 15px" value="إضافة">
                </form>
                @if(count($rating_faqs) > 0)
                    <ul dir="rtl" style="margin-top: 5%" class="row">
                        @foreach($rating_faqs as $rating_faq)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <p style="text-align: right; font-size: 16px; font-family: 'Segoe UI'; color: darkgrey">{{$rating_faq->question}}</p>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                <p style="text-align: right; font-size: 14px; font-family: 'Segoe UI'; color: #24a0ed; margin-right: 20px">{{$rating_faq->answer}}</p>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">
                                <a href="/admin/delete_rating_faq/{{$rating_faq->id}}" class="pull-left" style="margin-left: 15px"><i class="fa fa-minus-circle" style="color: red"></i></a>
                            </div>
                            <hr>
                        @endforeach
                    </ul>
                    {{$rating_faqs->links()}}
                @else
                    <br><h3 style="color: darkorange; text-align: center">لا توجد أسئلة حتى الآن</h3>
                @endif
            </div>
        </div>
    </section>
@endsection