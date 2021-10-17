@extends('layouts.user_english')

@section('content')
    <div class="row container" style="background-color: whitesmoke; margin: auto">
        <div class="col-md-12 col-xs-12">
            <p style="text-align: right; margin-right: 20px; margin-bottom: 20px; margin-top: 20px"><a href="javascript:history.back()" style="font-family: 'Segoe UI'; color: #0275d8; font-size: 20px"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
        <form action="{{Auth::user() ? '/new_ads' : '/login'}}" method="post" enctype="multipart/form-data" class="col-md-10 col-md-offset-1 col-xs-12" style="margin-top: 30px; border: solid 1px darkgray; margin-bottom: 50px">
            @csrf
            <div class="row">
                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <select style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" name="type" required>
                        <option value="" selected>Choose post type</option>
                        <option value="sell_out">Sell out</option>
                        <option value="buy_up">Buy up</option>
                        <option value="rent">Rent</option>
                        <option value="exchange">Exchange</option>
                    </select>
                </div>

                <div class="col-md-12 col-xs-12">
                    <label style="margin-top: 18px; margin-left: 20px; color: #2F4F4F">Post Title :</label>
                    <input type="text" name="title" placeholder="eg: TOYOTA 2017" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" required>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <label style="margin-top: 18px; margin-left: 20px; color: #2F4F4F">Post Status :</label><br>
                    <input type="radio" name="status" value="new" style="margin-top: 15px; margin-left: 5%" required>
                    <label for="new" style="font-size: 14px">New spare part</label>
                    <input type="radio" name="status" value="second" style="margin-left: 20px" required>
                    <label for="female" style="font-size: 14px">Second hand spare part</label><br>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <label style="margin-top: 18px; margin-left: 20px; color: #2F4F4F">Phone Number :</label>
                    <input type="tel" name="phone" placeholder="eg: 00966000000000" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" required>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <label style="margin-top: 18px; margin-left: 20px; color: #2F4F4F">Would you like to post spare price ?</label><br>
                    <label for="chkYes" style="margin-top: 15px; margin-left: 5%; font-size: 14px">
                        <input type="radio" id="chkYes" name="chk" onclick="ShowHideDiv()" required/>
                        Yes
                    </label>
                    <label for="chkNo" style="font-size: 14px">
                        <input type="radio" id="chkNo" name="chk" onclick="ShowHideDiv()" required/>
                        No
                    </label>
                    <div id="dvtext" style="display: none; margin-top: 15px; margin-left: 10%">
                        Spare price:
                        <input type="text" name="price" placeholder="in Rial" id="txtBox"/>
                    </div><br>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <label style="margin-top: 18px; margin-left: 20px; color: #2F4F4F">Post body</label>
                    <textarea name="body" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 150px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" placeholder="Details :" required></textarea>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <input type="file" name="filenames[]" style="margin-top: 15px; width: 50%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px" multiple class="pull-left">
                    <label style="margin-top: 28px; color: darkorange; font-size: 12px">* Select all your post images <u>together</u> to upload</label><br>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <input type="checkbox" style="margin-top: 22px; margin-left: 2%" class="pull-left" required>
                    <label style="margin-top: 18px; margin-left: 10px; color: green; font-size: 12.5px">I commit that all images are for the same commodity status</label>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <select name="region" style="margin-top: 15px; width: 96%; margin-left: 2%; height: 42px; border: 2px solid lightgrey; font-family: 'Segoe UI'; font-size: 18px; border-radius: 5px" required>
                        <option value="">Choose post location</option>
                        @foreach($regions as $region)
                            <option value="{{$region->english_name}}">{{$region->english_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-top: 10px">
                    <input type="checkbox" name="payment_percentage" style="margin-top: 22px; margin-left: 2%" class="pull-left" required>
                    <label style="margin-top: 18px; margin-left: 10px; color: green; font-size: 14px">I agree to commit paying 1% of each completed deal</label>
                </div>

                <input type="submit" class="btn btn-default btn-lg pull-left" style="width: 200px; color: darkgreen; font-family: 'Segoe UI'; font-size: 20px; opacity: 0.7; font-weight: bold; margin-left: 5%; margin-top: 20px; margin-bottom: 30px; text-align: center" value="Post">
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