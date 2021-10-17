@extends('layouts.user_arabic')

@section('content')
    <div class="row container" style="background-color: whitesmoke; margin: auto">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <form action="{{Auth::user() ? '/new_ads' : '/login'}}" method="post" enctype="multipart/form-data" class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 30px; border: solid 1px darkgray; margin-bottom: 50px">
            @csrf
            <div class="row">
                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <select dir="rtl" name="type" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" required>
                        <option selected>اختر نوع الإعلان</option>
                        <option value="sell_out">بيع</option>
                        <option value="buy_up">شراء</option>
                        <option value="rent">إيجار</option>
                        <option value="exchange">مقايضة</option>
                    </select>
                </div>

                <div class="col-md-12 col-xs-12">
                    <label class="pull-right" style="margin-top: 18px; margin-right: 20px; color: #2F4F4F; font-family: 'Segoe UI'; font-size: 18px">: عنوان الإعلان</label>
                    <input type="text" name="title" class="input-field" placeholder="مثلاً : تويوتا 2017" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" required>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <label class="pull-right" style="margin-right: 20px; color: #2F4F4F; font-size: 18px; font-family: 'Segoe UI'">: حالة الإعلان</label>
                    <br><br><input type="radio" class="pull-right" name="status" value="new" style="margin-right: 5%" required>
                    <label for="new" class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; margin-right: 5px">جديد</label>
                    <input type="radio" class="pull-right" name="status" value="second" style="margin-right: 30px" required>
                    <label for="female" class="pull-right" style="font-size: 16px; font-family: 'Segoe UI'; margin-right: 5px">مستعمل</label><br>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <label class="pull-right" style="margin-top: 18px; margin-right: 20px; color: #2F4F4F; font-family: 'Segoe UI'; font-size: 18px">: رقم الهاتف</label>
                    <input type="tel" name="phone" placeholder="مثلاً : 00966000000000" class="input-field" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" required>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <label class="pull-right" style="margin-top: 18px; margin-right: 20px; color: #2F4F4F; font-size: 18px; font-family: 'Segoe UI'">هل تريد تحديد سعر السلعة ؟</label>
                    <br><br><br><label for="chkYes" class="pull-right" style="font-size: 16px; margin-right: 5%">
                        <input type="radio" class="pull-right" id="chkYes" name="chk" style="margin-left: 10px" onclick="ShowHideDiv()" required/>
                        نعم
                    </label>
                    <label for="chkNo" class="pull-right" style="font-size: 16px">
                        <input type="radio" class="pull-right" style="margin-right: 30px; margin-left: 10px" id="chkNo" name="chk" onclick="ShowHideDiv()" required/>
                        لا
                    </label><br>
                    <div id="dvtext" style="display: none; margin-top: 20px; margin-right: 30px">
<span class="pull-right" style="font-family: 'Segoe UI'; font-size: 14px">&nbsp; :                        سعر السلعة</span>
                        <input type="number" name="price" placeholder="بالريال" class="pull-right" id="txtBox"/>
                    </div><br>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <label class="pull-right" style="margin-top: 18px; margin-right: 20px; color: #2F4F4F; font-size: 18px; font-family: 'Segoe UI'">: نص الإعلان</label>
                    <textarea name="body" class="input-field" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 150px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" placeholder=": التفاصيل" required></textarea>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    {{--<input type="file" name="my_file[]" style="margin-top: 15px; width: 60%; margin-right: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" multiple class="pull-right">--}}
                    <input type="file" name="filenames[]" multiple style="margin-top: 15px; width: 60%; margin-right: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" class="myfrm form-control pull-right">
                    <label class="pull-left" style="margin-top: 20px; color: darkorange; font-size: 14px; font-family: 'Segoe UI'; margin-left: 50px">اختر جميع الصور التي تريد عرض السلعة بها معا *</label><br>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <input type="checkbox" style="margin-top: 27px; margin-right: 2%" class="pull-right" required>
                    <label class="pull-right" style="margin-top: 18px; margin-right: 10px; color: green; font-size: 16px; font-family: 'Segoe UI'; text-align: right"> أتعهد بأن جميع الصور المرفقة لنفس السلعة وبنفس الحالة المعروضة</label>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <select dir="rtl" name="region" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; border-radius: 5px" required>
                        <option value="">اختر المنطقة</option>
                        @foreach($regions as $region)
                            <option value="{{$region->arabic_name}}">{{$region->arabic_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <input type="checkbox" name="payment_percentage" style="margin-top: 27px; margin-right: 2%" class="pull-right" required>
                    <label class="pull-right" style="margin-top: 18px; margin-right: 10px; color: green; font-size: 20px; font-family: 'Segoe UI'"> أتعهد بأن أدفع نسبة 1% لكل صفقة بيع مكتملة</label>
                </div>
                <input type="submit" class="btn btn-default btn-lg pull-right" style="width: 200px; color: darkgreen; font-family: 'Segoe UI'; font-size: 20px; opacity: 0.7; font-weight: bold; margin-right: 5%; margin-top: 20px; margin-bottom: 30px; text-align: center" value="إنشاء">
            </div>
        </form>
        <?php
            if (isset($_FILES['my_file'])) {
                $myFile = $_FILES['my_file'];
                $fileCount = count($myFile["name"]);

                for ($i = 0; $i < $fileCount; $i++) {
                    ?>
                    <p>File #<?= $i+1 ?>:</p>
                    <p>
                        Name: <?= $myFile["name"][$i] ?><br>
                        Temporary file: <?= $myFile["tmp_name"][$i] ?><br>
                        Type: <?= $myFile["type"][$i] ?><br>
                        Size: <?= $myFile["size"][$i] ?><br>
                        Error: <?= $myFile["error"][$i] ?><br>
                    </p>
                    <?php
                }
            }
        ?>
    </div>
@endsection