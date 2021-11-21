<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$website_data->arabic_name}}</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{secure_asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{secure_asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{secure_asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{secure_asset('plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{secure_asset('dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{secure_asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{secure_asset('plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{secure_asset('plugins/summernote/summernote-bs4.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <style>
        .input-field {
            width: 100%;
            height: 45px;
            text-align: right;
            margin-bottom: 20px;
            border: solid 1px lightgrey;
            border-radius: 5px;
            background-color: white;
            box-shadow: 3px 3px 3px 3px lightgrey;
        }

        .input-field::placeholder {
            margin-right: 10px;
        }

        .input-field:hover {
            border: solid 1px #0275d8;
        }

        .message_hover {
            background-color: white;
        }

        .message_hover:hover {
            background-color: whitesmoke;
        }
    </style>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/admin/home" class="nav-link">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item d-none d-md-inline-block">
                        <a href="/admin/user_contact" class="nav-link">
                            @if(count($no_of_user_messages) > 0)
                                <span class="badge badge-info right">{{count($no_of_user_messages)}}</span>
                            @endif
                            {{ __('الرسائل ') }}
                        </a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form action="{{ route('search.posts') }}" role="search" method="post" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        @csrf
                        <input class="form-control form-control-navbar input-field" style="box-shadow: none; border: none" type="text" name="q" placeholder="بحث" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if(Auth::guard('admin'))
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('تسجيل الخروج') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login/admin">{{ __('Login') }}</a>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/admin/home" class="brand-link" style="margin-left: 10%">
                    @if($website_data->logo == null)
                        <img src="{{asset('images/logos/default_logo.png')}}" alt="{{$website_data->arabic_name}} Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    @else
                        <img src="/images/logos/{{$website_data->logo}}" alt="{{$website_data->arabic_name}} Logo" class="brand-image img-circle elevation-3"
                             style="opacity: .8">
                    @endif
                    <span class="brand-text font-weight-light" style="margin-left: 10px">{{$website_data->arabic_name}}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="margin-left: 10%">
                        <div class="image">
                            @if(Auth::guard('admin')->user()->profile_photo == null)
                                <img src="{{asset('images/profiles/default_profile.jpg')}}" class="img-circle elevation-2" alt="Admin Image">
                            @else
                                <img src="/images/profiles/{{Auth::guard('admin')->user()->profile_photo}}" class="img-circle elevation-2" alt="Admin Image">
                            @endif
                        </div>
                        <div class="info">
                            <a href="/admin/profile/{{Auth::guard('admin')->user()->id}}" class="d-block" style="margin-left: 10px">{{Auth::guard('admin')->user()->name}}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview">
                                <a href="/admin/admins" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>الإدارة
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>المستخدمين
                                        {{--<span class="badge badge-info right">6</span>--}}
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/users" class="nav-link">
                                            <i class="far fa-user nav-icon"></i>
                                            <p>كل المستخدمين</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/blocked_users" class="nav-link">
                                            <i class="fa fa-ban nav-icon"></i>
                                            <p>المستخدمين المحظورين</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/users/reports" class="nav-link">
                                            <i class="far fa-file nav-icon"></i>
                                            <p>مستخدمين تم التبليغ عنهم</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>المنشورات
                                        {{--<span class="badge badge-info right">6</span>--}}
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/posts" class="nav-link">
                                            <i class="far fa-file nav-icon"></i>
                                            <p>كل المنشورات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/deleted_posts" class="nav-link">
                                            <i class="fa fa-trash nav-icon"></i>
                                            <p>المنشورات المحذوفة</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/posts/reports" class="nav-link">
                                            <i class="far fa-file nav-icon"></i>
                                            <p>منشورات تم التبليغ عنها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/user_contact" class="nav-link">
                                    <i class="far fa-envelope nav-icon"></i>
                                    <p>الرسائل
                                        @if(count($no_of_user_messages) > 0)
                                            <span class="badge badge-info right">{{count($no_of_user_messages)}}</span>
                                        @endif
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/commission_payments" class="nav-link">
                                    <i class="fa fa-rocket nav-icon" aria-hidden="true"></i>
                                    <p>فواتير السداد</p>
                                    @if(count($commission_requests) > 0)
                                        <span class="badge badge-info right">{{count($commission_requests)}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-question nav-icon"></i>
                                    <p>استفسارات العملاء
                                        @if(count($contact_us_messages) > 0)
                                            <span class="badge badge-info right">{{count($contact_us_messages)}}</span>
                                        @endif
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/contact_reasons" class="nav-link">
                                            <i class="fa fa-id-card-o nav-icon">&nbsp;+</i>
                                            <p>&nbsp;إضافة سبب للتواصل</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/contacts" class="nav-link">
                                            <i class="fa fa-user-plus nav-icon" aria-hidden="true"></i>
                                            <p>استفسارات العملاء
                                                @if(count($contact_us_messages) > 0)
                                                    <span class="badge badge-info right">{{count($contact_us_messages)}}</span>
                                                @endif
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>عضوية الموقع
                                        @if(count($subscription_requests) > 0)
                                            <span class="badge badge-info right">{{count($subscription_requests)}}</span>
                                        @endif
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/membership_requests" class="nav-link">
                                            <i class="fa fa-user-plus nav-icon"></i>
                                            <p>طلبات العضوية
                                                @if(count($subscription_requests) > 0)
                                                    <span class="badge badge-info right">{{count($subscription_requests)}}</span>
                                                @endif
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/membership_terms" class="nav-link">
                                            <i class="far fa-file nav-icon"></i>
                                            <p>شروط العضوية</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/membership_features" class="nav-link">
                                            <i class="fa fa-star nav-icon"></i>
                                            <p>مزايا العضوية</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/membership_price" class="nav-link">
                                            <i class="fa fa-money nav-icon"></i>
                                            <p>رسوم الإشتراك بالعضوية</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/membership_faqs" class="nav-link">
                                            <i class="fa fa-star nav-icon"></i>
                                            <p>الأسئلة الشائعة</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-bar-chart nav-icon"></i>
                                    <p>التقارير
                                        @if(count($reports_requests) > 0)
                                            <span class="badge badge-info right">{{count($reports_requests)}}</span>
                                        @endif
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/reports_requests" class="nav-link">
                                            <i class="fa fa-book nav-icon"></i>
                                            <p>طلبات التقارير
                                                @if(count($reports_requests) > 0)
                                                    <span class="badge badge-info right">{{count($reports_requests)}}</span>
                                                @endif
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/reports_price" class="nav-link">
                                            <i class="fa fa-dollar nav-icon"></i>
                                            <p>رسوم التقارير</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/report_template" class="nav-link">
                                            <i class="fa fa-eyedropper nav-icon"></i>
                                            <p>نموذج للتقارير</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/previous_reports" class="nav-link">
                                            <i class="fa fa-file nav-icon"></i>
                                            <p>تقارير سابقة</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-id-card nav-icon"></i>
                                    <p>الهويات والتراخيص
                                        @if(count($documentation_requests) > 0)
                                            <span class="badge badge-info right">{{count($documentation_requests)}}</span>
                                        @endif
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/license_requests" class="nav-link">
                                            <i class="fa fa-id-card-o nav-icon">&nbsp;+</i>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;طلبات التوثيق
                                                @if(count($documentation_requests) > 0)
                                                    <span class="badge badge-info right">{{count($documentation_requests)}}</span>
                                                @endif
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-star nav-icon"></i>
                                    <p>نظام التقييم</p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/rating_acceptance_terms" class="nav-link">
                                            <i class="far fa-file nav-icon"></i>
                                            <p>شروط قبول التقييم</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/rating_joining_terms" class="nav-link">
                                            <i class="far fa-file nav-icon"></i>
                                            <p style="font-size: 13.5px">شروط الانضمام لنظام التقييم</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/rating_faqs" class="nav-link">
                                            <i class="fa fa-question nav-icon"></i>
                                            <p>الأسئلة الشائعة</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-percent nav-icon"></i>
                                    <p>نظام الخصم</p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/discount_factors" class="nav-link">
                                            <i class="far fa-file nav-icon"></i>
                                            <p>عوامل الخصم</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/discounts" class="nav-link">
                                            <i class="fa fa-percent nav-icon"></i>
                                            <p>خصومات المستخدمين</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/discount_notes" class="nav-link">
                                            <i class="fa fa-file nav-icon"></i>
                                            <p>الملاحظات</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-map-marker nav-icon"></i>
                                    <p>المناطق المتاحة</p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/allowed_countries" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>المسموح التسجيل منها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/allowed_regions" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>المسموح العرض منها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-keyboard nav-icon"></i>
                                    <p>سياسة الإستخدام</p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/definitions" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>المقدمة التعريفية</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/usage_terms" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>شروط الإستخدام</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/content_addition_terms" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>شروط إضافة المحتوى</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/labor_services_terms" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>إعلانات الخدمات العمالية</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/security_policies" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>السياسة الأمنية</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/system_accounts" class="nav-link">
                                    <i class="fas fa-coins nav-icon"></i>
                                    <p>حسابات الموقع المتاحة</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/certified_banks" class="nav-link">
                                    <i class="fa fa-bank nav-icon"></i>
                                    <p>البنوك المعتمدة</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/installed_ads" class="nav-link">
                                    <i class="fas fa-file-contract nav-icon"></i>
                                    <p>شروط تثبيت الإعلان</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/rank_terms" class="nav-link">
                                    <i class="fa fa-trophy nav-icon" aria-hidden="true"></i>
                                    <p>شروط الحصول على رتبة</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-car nav-icon"></i>
                                    <p>السلع والخدمات المتكررة</p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/service_membership_price" class="nav-link">
                                            <i class="fas fa-dollar-sign nav-icon"></i>
                                            <p>قيمة الإشتراك</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/service_membership_types" class="nav-link">
                                            <i class="fa fa-align-justify nav-icon"></i>
                                            <p>أنواع الخدمات المتكررة</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/service_membership_features" class="nav-link">
                                            <i class="fa fa-star-o nav-icon"></i>
                                            <p>فوائد الإشتراك بالخدمة</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/service_membership_terms" class="nav-link">
                                            <i class="fa fa-info-circle nav-icon"></i>
                                            <p>شروط الإعلان</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/service_membership_policy" class="nav-link">
                                            <i class="fa fa-shield nav-icon"></i>
                                            <p>سياسة الموقع</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/service_membership_faqs" class="nav-link">
                                            <i class="fa fa-question-circle-o nav-icon"></i>
                                            <p>الأسئلة المتكررة</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-ban nav-icon" aria-hidden="true"></i>
                                    <p>الإجراءات الممنوعة</p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/not_allowed_goods" class="nav-link">
                                            <i class="fa fa-car nav-icon" aria-hidden="true"></i>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;السلع الممنوعة</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/not_allowed_ads" class="nav-link">
                                            <i class="fas fa-ad nav-icon" aria-hidden="true"></i>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;الاعلانات الممنوعة</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/not_allowed_replies" class="nav-link">
                                            <i class="fa fa-comment nav-icon" aria-hidden="true"></i>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;الردود الممنوعة</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/not_allowed_messages" class="nav-link">
                                            <i class="fa fa-envelope-o nav-icon" aria-hidden="true"></i>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;الرسائل الممنوعة</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-user-lock nav-icon"></i>
                                    <p>القائمة السوداء</p>
                                </a>
                                <ul class="nav nav-treeview" style="margin-left: 7%">
                                    <li class="nav-item">
                                        <a href="/admin/black_list_users" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon" aria-hidden="true"></i>
                                            <p>&nbsp;عملاء القائمة السوداء</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/avoid_scams" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon" aria-hidden="true"></i>
                                            <p>&nbsp;تعليمات لتجنب الاحتيال</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/know_the_frauds" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon" aria-hidden="true"></i>
                                            <p>&nbsp;كيف تعرف المحتال</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/personal_safety" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon" aria-hidden="true"></i>
                                            <p>&nbsp;السلامة الشخصية</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/admin/profile/{{Auth::guard('admin')->user()->id}}" class="nav-link">
                                    <i class="far fa-edit nav-icon"></i>
                                    <p>تعديل الملف الشخصي</p>
                                </a>
                            </li>
                            @if(Auth::guard('admin')->user()->id == 1)
                                <li class="nav-item has-treeview">
                                    <a href="/admin/website_data" class="nav-link">
                                        <i class="fa fa-cog nav-icon"></i>
                                        <p>تعديل بيانات الموقع</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                {{--<h1 class="m-0 text-dark">لوحة التحكم</h1>--}}
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/admin/home" style="font-size: 22px; font-family: 'Segoe UI'">{{$website_data->arabic_name}}</a></li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <main class="py-4">
                    @yield('content')
                </main>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <strong>Copyright &copy; {{$website_data->created_at->format('Y')}}-<script>document.write(new Date().getFullYear())</script> <a href="/admin/home">{{$website_data->english_name}}</a>.</strong>
                All rights reserved.
                {{--<div class="float-right d-none d-sm-inline-block">--}}
                    {{--<b>Version</b> 3.0.0-rc.3--}}
                {{--</div>--}}
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>
        <!-- ./wrapper -->

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
        </script>

        <script>
            function readURL(input) {
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

        <!-- jQuery -->
        <script src="{{secure_asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{secure_asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{secure_asset('plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{secure_asset('plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{secure_asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{secure_asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{secure_asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{secure_asset('plugins/moment/moment.min.js')}}"></script>
        <script src="{{secure_asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{secure_asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{secure_asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{secure_asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{secure_asset('dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{secure_asset('dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{secure_asset('dist/js/demo.js')}}"></script>

        <script>
            $('#myModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var bill = button.data('mybill');
                var modal = $(this);
                modal.find('.modal-body #bill').val(bill);


                $('.modal-body img').attr('src',bill);
                //show modal
                $('#myModal').modal();
            })
        </script>

        <script>
            $('#rejectModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('myid')
                var modal = $(this)
                modal.find('.modal-body #id').val(id)

//                $('.modal-body img').attr('src',bill);
//                //show modal
//                $('#rejectModal').modal();
            })
        </script>

        <script>
            $('#contactModal').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget);
                var id = button.data('myid');
                var body = button.data('mybody');
                var email = button.data('myemail');
                var phone = button.data('myphone');
                var illustration = button.data('myillustration');
                var modal = $(this);
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #body').val(body);
                modal.find('.modal-body #email').val(email);
                modal.find('.modal-body #phone').val(phone);
                modal.find('.modal-body #illustration').val(illustration);

                $('.modal-body img').attr('src',illustration);

                $('.modal-body source').attr('src',illustration);

            })
        </script>

        <script>
            $('#editModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var discount = button.data('mydiscount')
                var modal = $(this)
                modal.find('.modal-body #discount').val(discount)
                var id = button.data('myid')
                modal.find('.modal-body #id').val(id)
            })
        </script>

        <script>
            var element = document.getElementById("scrolldiv");
            element.scrollTop = element.scrollHeight;
        </script>
    </body>
</html>