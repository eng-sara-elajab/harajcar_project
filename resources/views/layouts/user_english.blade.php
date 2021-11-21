<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title style="font-family: 'Segoe UI'">{{$website_data->english_name}}</title>
        <!-- font awesome library-->

        {{--<link rel="stylesheet" href="{{secure_asset('css/app.css')}}">--}}

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- button group libraries-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- Progress bar library -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    </head>
    <style>
        /* Add a black background color to the top navigation */
        .topnav {
            background-color: #feee00;
            /*overflow: hidden;  */
            width: 100%;
            margin-bottom: 0;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            text-align: center;
            padding: 14px 8px;
            text-decoration: none;
            color: #708090;
            font-family: Segoe UI;
            font-weight: bold;
            font-size: 23px;
            margin-left: 20px
        }

        .topnav a:hover {
            color: darkgray;
        }

        /* Add an active class to highlight the current page */
        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }

        /* Hide the link that should open and close the topnav on small screens */
        .topnav .icon {
            display: none;
        }
        /* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        /* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
        @media screen and (max-width: 600px) {
            .topnav.responsive {position: relative;}
            .topnav.responsive a.icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }

        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 2px solid lightgrey;
            float: left;
            width: 85%;
            height: 42px;
            border-radius: 0 5px 5px 0;
        }

        form.example input[type=text]:hover {
            border: 2px solid #0275d8;
        }

        form.example input[type=text]::placeholder {
            text-align: left;
            font-size: 14px;
            color: lightgrey;
            font-weight: bold;
            font-family: inherit
        }

        form.example button {
            float: left;
            width: 15%;
            height: 42px;
            padding: 10px;
            background: #5cb85c;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #3CB371;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }

        .styleSelect {
            margin-left: 5%;
            font-weight: bold;
            color: #A9A9A9;
            width: 90%;
            border: 2px solid lightgrey;
            font-family: 'Segoe UI';
            font-size: 18px;
            padding-right: 10px;
            background-color: white;
        }

        .styleSelect a{
            width: 100%;
            height: 35px;
            text-align: left;
            margin-left: 5px;
        }

        .styleSelect a:hover{
            color: #A9A9A9;
        }

        .site-footer
        {
            background-color:#708090;
            font-size:15px;
            line-height:24px;
            border: solid 1px lightgrey;
            width: 101%;
            position: absolute;
            /*bottom:0;*/
        }
        .site-footer hr
        {
            border-top-color:#bbb;
            opacity:0.5
        }
        .site-footer hr.small
        {
            margin:20px 0
        }
        .site-footer h6
        {
            color:#fff;
            font-size:16px;
            text-transform:uppercase;
            margin-top:5px;
            letter-spacing:2px
        }
        .site-footer a
        {
            color:#737373;
        }
        .site-footer a:hover
        {
            color:#3366cc;
            text-decoration:none;
        }
        .footer-links
        {
            padding-left:0;
            list-style:none
        }
        .footer-links li
        {
            margin-top: 5px;
            display:block
        }
        .footer-links i
        {
            color:#5cb85c;
        }
        .footer-links a
        {
            color:whitesmoke;
            font-size: 12.5px;
            display: inline;
            font-family: "Segoe UI";
        }
        .footer-links a:active,.footer-links a:focus,.footer-links a:hover
        {
            color:lightgrey;
            text-decoration-line: underline;
        }
        .footer-links.inline li
        {
            display:inline-block
        }
        .site-footer .social-icons
        {
            text-align:right
        }
        .site-footer .social-icons a
        {
            width:40px;
            height:40px;
            line-height:40px;
            margin-left:6px;
            margin-right:0;
            border-radius:100%;
            background-color:#33353d
        }
        .copyright-text
        {
            margin:0;
            margin-top: 1%;
            font-size: 16px;
            font-family: Segoe UI;
            text-align : center;
        }
        @media (max-width:991px)
        {
            .site-footer [class^=col-]
            {
                margin-bottom:30px
            }
        }
        @media (max-width:767px)
        {
            .site-footer
            {
                padding-bottom:0
            }
            .site-footer .copyright-text,.site-footer .social-icons
            {
                text-align:center
            }
        }
        .social-icons
        {
            padding-left:0;
            margin-bottom:0;
            list-style:none
        }
        .social-icons li
        {
            display:inline-block;
            margin-bottom:4px
        }
        .social-icons li.title
        {
            margin-right:15px;
            text-transform:uppercase;
            color:#96a2b2;
            font-weight:700;
            font-size:13px
        }
        .social-icons a{
            background-color:#eceeef;
            color:#818a91;
            font-size:16px;
            display:inline-block;
            line-height:44px;
            width:44px;
            height:44px;
            text-align:center;
            margin-right:8px;
            border-radius:100%;
            -webkit-transition:all .2s linear;
            -o-transition:all .2s linear;
            transition:all .2s linear
        }
        .social-icons a:active,.social-icons a:focus,.social-icons a:hover
        {
            color:#fff;
            background-color:#29aafe
        }
        .social-icons.size-sm a
        {
            line-height:34px;
            height:34px;
            width:34px;
            font-size:14px
        }
        .social-icons a.facebook:hover
        {
            background-color:#3b5998
        }
        .social-icons a.twitter:hover
        {
            background-color:#00aced
        }
        .social-icons a.linkedin:hover
        {
            background-color:#007bb6
        }
        .social-icons a.dribbble:hover
        {
            background-color:#ea4c89
        }
        @media (max-width:767px)
        {
            .social-icons li.title
            {
                display:block;
                margin-right:0;
                font-weight:600
            }
        }

        .circle-icon {
            background: lightgreen;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            vertical-align: middle;
            padding: auto;
        }

        .next-page {
            margin-top: 20px;
            color: #5cb85c;
            border-radius: 15px;
            height: 45px;
            width: 140px;
            font-size: 16px;
            font-family: 'Segoe UI';
            background-color: lightgrey;
            text-decoration: none
        }

        .next-page:hover {
            border: solid 1px #5cb85c;
            color: darkgrey;
        }

        .next-page i:hover {
            background-color: #5cb85c;
            color: lightgrey;
        }

        .select-action {
            background-color: white;
            color: darkgrey;
            font-size: 14px;
            font-family: "Segoe UI";
        }

        .select-action:hover {
            color: darkgrey;
            background-color: #F0FFFF;
        }

        .rounded-icon {
            background: #F0F8FF;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            text-align: center;
            line-height: 25px;
            vertical-align: middle;
            padding: auto;
        }

        .input-field {
            width: 100%;
            height: 45px;
            margin-bottom: 20px;
            border: solid 1px lightgrey;
            border-radius: 5px;
            background-color: white;
            box-shadow: 3px 3px 3px 3px lightgrey
        }

        .input-field:hover {
            border: solid 1px #0275d8;
        }

        .input-field:focus {
            /*border: solid 1px blue;*/
        }

        .input-field::placeholder {
            text-align: left;
            font-size: 18px;
            font-family: "Segoe UI";
            opacity: 0.7;
        }

        .placeholder-styling::placeholder {
            text-align: left;
            font-size: 18px;
            font-family: "Segoe UI";
            opacity: 0.7;
        }

        .follow_button {
            border-radius: 20px;
            border: solid 1px #0275d8;
            text-align: center;
            font-family: 'Segoe UI';
            margin-left: 20px;
            font-size: 14px;
            width: 80px
        }

        .evaluaction_form {
            width: 100%;
            height: 100px;
            border-radius: 20px;
            font-family: "Segoe UI";
            font-size: 16px;
            color: darkgrey;
        }

        .evaluaction_form:hover {
            width: 100%;
            height: 100px;
            border-radius: 20px;
            font-family: "Segoe UI";
            font-size: 16px;
            color: darkgrey;
            background-color: white;
        }

        .evaluaction_form_1 {
            width: 96%;
            margin-left: 2%;
            height: 50px;
            border-radius: 20px;
            font-family: "Segoe UI";
            font-size: 20px;
            text-align: left;
            font-weight: bold;
            color: darkgrey;
        }

        .evaluaction_form_1:hover {
            width: 96%;
            margin-left: 2%;
            height: 50px;
            border-radius: 20px;
            font-family: "Segoe UI";
            font-size: 20px;
            text-align: left;
            font-weight: bold;
            color: darkgrey;
            background-color: white;
        }

        .badge {
            position: absolute;
            display:inline-block;
            min-width:12px;
            padding:6px 6px;
            font-size:10px;
            font-weight:700;
            line-height:1;
            color:#fff;
            text-align:center;
            white-space:nowrap;
            vertical-align:baseline;
            background-color:orange;
            border-radius:15px;
        }

        .black_list_placeholder {
            background-color: white;
            border-radius: 7px;
            width: 350px;
            height: 40px;
            border: none;
            text-align: center;
            box-shadow: 3px 3px 3px 3px lightgrey
        }

        .black_list_placeholder:focus {
            outline: none;
        }

        .black_list_placeholder::placeholder {
            text-align: center;
            font-size: 16px;
            color: darkgrey;
            font-family: "Segoe UI";
        }

        .black_list_submit_button {
            height: 40px;
            margin-top: 4%;
            border-radius: 7px;
            background-color: #1183ca;
            box-shadow: 3px 3px 3px 3px #8accf5;
            color: white;
            font-family: 'Segoe UI';
            font-size: 15px;
        }

        .black_list_submit_button:hover {
            background-color: #0669a7;
            height: 40px;
            margin-top: 4%;
            border-radius: 7px;
            box-shadow: 3px 3px 3px 3px #8accf5;
            color: white;
            font-family: 'Segoe UI';
            font-size: 15px;
        }

        .ContactUsSelect {
            margin-top: 1%;
            text-align: right;
            font-family: "Segoe UI";
            color: darkgrey;
            font-weight: bold;
            font-size: 16px;
            width: 90%;
            margin-right: 4%;
            height: 55px;
            border-radius: 10px;
            border: solid 1px lightgrey;
            margin-bottom: 25px;
        }

        .ContactUsSelect:hover {
            margin-top: 1%;
            text-align: right;
            width: 90%;
            margin-right: 4%;
            height: 55px;
            border-radius: 10px;
            border: solid 1px #0275d8 ;
            margin-bottom: 25px;
        }

        html {
            scroll-behavior: smooth;
        }

    </style>
    <body>
        <nav class="topnav navbar bg-warning" id="myTopnav" style="text-align: center">
            <a href="#" style="margin-left: 20px; margin-top: 2px">
                <form method="post" action="/language" class="pull-left">
                    @csrf
                    <div class="btn-group">
                        <button type="submit" class="btn btn-default btn-sm" name="language" value=1 >Eng</button>
                        <button type="submit" class="btn btn-success btn-sm" name="language" value=0 >عربي</button>
                    </div>
                </form>
            </a>
            @if(Auth::user())
                <a href="#">
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{$auth_user[0]}}&nbsp;<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-left w3-bar-block w3-card-4 w3-animate-zoom" id="Demo" aria-labelledby="navbarDropdown" style="margin-left: 20%; margin-top: 3.5%">
                            <p><a class="dropdown-item" href="/user/edit_profile" style="color: darkgrey; font-size: 16px">
                                    <i class="fa fa-edit" aria-hidden="true"></i>&nbsp;{{ __('Edit Profile') }}
                            </a></p>

                            <p><a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: darkgrey; font-size: 16px">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;{{ __('Logout') }}
                            </a></p>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </a>
                <a href="/user/following/{{Auth::user()->id}}"><i class="fa fa-rss" aria-hidden="true"></i>&nbsp;Following</a>
                <a href="/user/favourite/{{Auth::user()->id}}"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;Favourite</a>
                <a href="/user/view_notifications/{{Auth::user()->id}}"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;Notifications
                    @if(count($no_of_notifications) > 0)
                        <span class="badge badge-warning pull-left">{{count($no_of_notifications)}}</span>
                    @endif
                </a>
                <a href="/user/messages/{{Auth::user()->id}}"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Inbox
                    @if(count($no_of_messages) > 0 || count($no_of_admin_messages) > 0)
                        <span class="badge badge-warning pull-left">{{count($no_of_messages)+ count($no_of_admin_messages)}}</span>
                    @endif
                </a>
            @else
                <a href="/login" style="margin-left: 20px">Login&nbsp;&nbsp;<i class="fa fa-sign-in" aria-hidden="true" style="margin-top: 3px"></i></a>
            @endif
            <a href="#" style="margin-left: 40px">{{$website_data->english_name}}</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-xl-offset-1 col-lg-3 col-lg-offset-1 col-md-4 col-sm-4 col-xs-12">
                        <ul class="footer-links">
                            @if(!Auth::user())
                                <li><a href="/discount" class="pull-right">Discount&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            @endif
                            <li><a href="/black_list" class="pull-right">القائمة السوداء وإرشادات التعامل &nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            <li><a href="/notallowed" class="pull-right">Prohibited Items <i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            <li><a href="/contact_us" class="pull-right">Contact&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            <li><a href="/" class="pull-right">Legacy version&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-xl-3 col-xl-offset-1 col-lg-3 col-lg-offset-1 col-md-4 col-sm-4 col-xs-12">
                        <ul class="footer-links">
                            @if(!Auth::user())
                                <li><a href="/service_membership" class="pull-right">Membership Services&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            @endif
                            <li><a href="/car_report" class="pull-right">طلب تقرير سيارة&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            <li><a href="/view_license" class="pull-right">License <i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            <li><a href="/usage_agreement" class="pull-right">Terms & Conditions&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            <li><a href="/rating" class="pull-right">Rating&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li>
                            @if(Auth::user())
                                <br><li><a href="/discount" class="pull-right">Discount&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="col-xl-3 col-xl-offset-1 col-lg-3 col-lg-offset-1 col-md-4 col-sm-4 col-xs-12">
                        <ul class="footer-links" style="margin-right: 3px">
                            @if(!Auth::user())
                                <li><a href="/register" class="pull-right">Register <i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            @endif
                            <li><a href="/website_commission" class="pull-right">Website Commission&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            <li><a href="/featured_posts" class="pull-right">Featured Posts&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li><br>
                            <li><a href="/cars_membership" class="pull-right">Membership of car dealerships&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li>
                            @if(Auth::user())
                                <br><li><a href="/service_membership" class="pull-right">Membership Services&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <hr>
                <a href="#"><h4 style="color:white; text-align: center">{{$website_data->english_name}}</h4></a>
                <p style="color:white; text-align: center; font-size: 12px">All rights reserved 2020 - 2021</p>
            </div>
            {{--<div class="container-fluid" style="background-color: rgb(30,30,30); margin-bottom: 0">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; margin-top: 5px">--}}
                        {{--<p class="copyright-text">مؤسسة موقع حراج للتسويق الإلكتروني</p>--}}
                        {{--<p class="copyright-text">21 - 3 - 10 3 . 8.1.95</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </footer>

        <script>
            function move() {
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);
                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                    } else {
                        width++;
                        elem.style.width = width + '%';
                    }
                }
            }
        </script>

        <script>
            function ShowHideDiv() {
                var chkYes = document.getElementById("chkYes");
                var dvtext = document.getElementById("dvtext");
                dvtext.style.display = chkYes.checked ? "block" : "none";
            }
        </script>

        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>

        <script>
            function func() {
                if(document.getElementById('accountDetails').value  == 'follow')
                    document.getElementById('accountDetails').value  = 'unfollow';
                else
                    document.getElementById('accountDetails').value  = 'follow'
            }
        </script>

        <script>
            jQuery(document).ready(function(){
                jQuery('#ajaxSubmit').click(function(e){
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{ url('/chempionleague') }}",
                        method: 'post',
                        data: {
                            name: jQuery('#name').val(),
                            club: jQuery('#club').val(),
                            country: jQuery('#country').val(),
                            score: jQuery('#score').val(),
                        },
                        success: function(result){
                            if(result.errors)
                            {
                                jQuery('.alert-danger').html('');

                                jQuery.each(result.errors, function(key, value){
                                    jQuery('.alert-danger').show();
                                    jQuery('.alert-danger').append('<li>'+value+'</li>');
                                });
                            }
                            else
                            {
                                jQuery('.alert-danger').hide();
                                $('#open').hide();
                                $('#myModal').modal('hide');
                            }
                        }});
                });
            });
        </script>

        <script>
            /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            function read_URL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah_1')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script>
            function myFunction1() {
                var x = document.getElementById("myDIV1");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction2() {
                var x = document.getElementById("myDIV2");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction3() {
                var x = document.getElementById("myDIV3");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction4() {
                var x = document.getElementById("myDIV4");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction5() {
                var x = document.getElementById("myDIV5");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction6() {
                var x = document.getElementById("myDIV6");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction7() {
                var x = document.getElementById("myDIV7");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction8() {
                var x = document.getElementById("myDIV8");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction9() {
                var x = document.getElementById("myDIV9");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction10() {
                var x = document.getElementById("myDIV10");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction11() {
                var x = document.getElementById("myDIV11");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction12() {
                var x = document.getElementById("myDIV12");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction13() {
                var x = document.getElementById("myDIV13");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction14() {
                var x = document.getElementById("myDIV14");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

        <script>
            function myFunction15() {
                var x = document.getElementById("myDIV15");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
    </body>
</html>