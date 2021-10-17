@extends('layouts.user_arabic')

@section('content')
    <div class="container-fluid row" style="background-color: whitesmoke">
        <form action="/user/submit_evaluation/{{$user->id}}" method="post" class="col-xl-6 col-xl-offset-3 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-md-offset-1 col-12" style="margin-bottom: 20px">
            @csrf
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <label class="pull-right" style="margin-top: 18px; margin-right: 20px; color: #2F4F4F; font-size: 18px; font-family: 'Segoe UI'">كيف كانت تجربتك ؟</label>
                <textarea name="description" class="input-field" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 150px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" placeholder="مثال : مصداقية عالية وتعامل راقي ودقة في الوصف" required></textarea>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                <label class="pull-right" style="color: #2F4F4F; font-size: 18px; font-family: 'Segoe UI'; width: 100%; text-align: right; margin-right: 20px">هل تنصح بالتعامل معه ؟</label>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <span class="btn btn-default evaluaction_form"><input type="radio" name="recommendations" value="0" style="margin-top: 30px" required>&nbsp;&nbsp;لا أنصح بالتعامل معه&nbsp;&nbsp;<i class="fa fa-thumbs-down" aria-hidden="true"></i></span>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <span class="btn btn-default evaluaction_form"><input type="radio" name="recommendations" value="1" style="margin-top: 30px" required>&nbsp;&nbsp;أنصح بالتعامل معه&nbsp;&nbsp;<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                <label class="pull-right" style="margin-top: 20px; color: #2F4F4F; font-size: 18px; font-family: 'Segoe UI'; width: 100%; text-align: right; margin-right: 20px">هل قمت بالشراء منه ؟</label>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <p class="btn btn-lg btn-default evaluaction_form_1"><input type="radio" name="completed" value="1" style="width: 40px" required>نعم&nbsp;<i class="fa fa-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;</p><br><br>
                <p class="btn btn-lg btn-default evaluaction_form_1"><input type="radio" name="completed" value="0" style="width: 40px" required>لا&nbsp;<i class="fa fa-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;</p>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 20px">
                <button type="submit" class="btn btn-block btn-default" style="height: 50px; width: 96%; margin-left: 2%; background-color: #708090; color: white; font-size: 20px; font-family: 'Segoe UI'; font-weight: bold">تقييم</button>
            </div>
        </form>
    </div>
@endsection