<?php

use App\Admin;
use App\Adminusermessage;
use App\Comment;
use App\Commission;
use App\Contact;
use App\Country;
use App\Favourite;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Image;
use App\License;
use App\Message;
use App\Notification;
use App\Post;
use App\Region;
use App\Reply;
use App\Report;
use App\Reportelement;
use App\Setting;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    $users = User::where('active_status', 'active')->get();
    $posts = DB::table('posts')->orderBy('id', 'desc')->paginate(8);
    $images = Image::all();
    $website_data = Setting::find(1);
    $regions = Region::all();
    $countries = Country::all();
    if(Auth::user()){
        $auth_user = explode(' ',trim(Auth::user()->name));
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data',
                'no_of_admin_messages', 'auth_user', 'regions', 'countries'));
        }
        else
            Date::setLocale('en');
        return view('user.english.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data',
            'no_of_admin_messages', 'auth_user', 'regions', 'countries'));
    }
    else{
        if($website_data->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.home', compact('users','posts', 'images', 'website_data', 'regions', 'countries'));
        }
        else
            Date::setLocale('en');
        return view('user.english.home', compact('users','posts', 'images', 'website_data', 'regions', 'countries'));
    }
});

Route::post('/search/goods', "PostController@search_goods")->name('search.goods');

Route::get('/user/edit_profile', 'UserController@edit_profile');

Route::put('/user/update_profile/{user_id}', 'UserController@update_profile');

Route::get('/region/{region}', 'PostController@region_posts');

Route::get('/one_product/{id}', function ($id){
    $reported_elements = Reportelement::where('post_id', $id)->get();
    if(Auth::user()){
        $auth_user = explode(' ', Auth::user()->name);
        $post = Post::find($id);
        $posts = Post::where('type', $post->type)->where('id', '!=', $post->id)->get();
        $all_images = Image::all();
        $user = User::where('id', $post->user_id)->first();
        $images = Image::where('post_id', $post->id)->get();
        $comments = Comment::where('post_id', $post->id)->get();
        $replies = Reply::all();
        $users = User::all();
        $favourite = Favourite::where('user_id', Auth::user()->id)->where('favourite_id', $post->id)->get();
//        return $favourite;
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.one_product', compact('user', 'post', 'posts', 'all_images', 'images', 'comments', 'users', 'replies', 'favourite',
                'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user', 'reported_elements'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.one_product', compact('user', 'post', 'posts', 'all_images', 'images', 'comments', 'users', 'replies', 'favourite',
                'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user', 'reported_elements'));
        }
    }
    else{
        $post = Post::find($id);
        $posts = Post::where('type', $post->type)->get();
        $all_images = Image::all();
        $user = User::where('id', $post->user_id)->where('active_status', 'active')->first();
        $images = Image::where('post_id', $post->id)->get();
        $comments = Comment::all();
        $replies = Reply::all();
        $users = User::all();
        $favourite = null;
//        return $favourite;
        $website_data = Setting::find(1);
        $no_of_notifications = null;
        $no_of_messages = null;
        if($website_data->language == 0) {
            Date::setLocale('ar');
//            $created_at = Date::parse($post->created_at)->diffForHumans();
            return view('user.arabic.one_product', compact('user', 'post', 'posts', 'all_images', 'images', 'comments', 'users', 'replies', 'favourite',
                'no_of_notifications', 'no_of_messages', 'website_data', 'reported_elements'));
        }
        else
            Date::setLocale('en');
        return view('user.english.one_product', compact('user', 'post', 'posts', 'all_images', 'images', 'comments', 'users', 'replies', 'favourite',
            'no_of_notifications', 'no_of_messages', 'website_data', 'reported_elements'));
    }
});

Route::post('/new_comment/{id}', 'PostController@new_comment');

Route::post('/new_reply/{post_id}/{comment_id}', 'PostController@new_reply');

Route::get('/new_ads', 'PostController@create');

Route::post('/new_ads', 'PostController@store');

Route::get('/user/profile/{id}','PostController@profile');

Route::post('/user/follow/{id}','PostController@user_follow');

Route::post('/user/unfollow/{id}','PostController@user_unfollow');

Route::get('/user/following/{id}','UserController@following');

Route::get('/user/favourite/{id}','PostController@favourite');

Route::get('/user/add_to_favourite/{id}','PostController@add_to_favourite');

Route::get('/user/remove_from_favourite/{id}','PostController@remove_from_favourite');

Route::get('/post/report/{post_id}/{user_id}','PostController@report');

Route::get('/user/evaluate/{id}','UserController@evaluate');

Route::post('/user/submit_evaluation/{id}','UserController@submit_evaluation');

Route::get('/user/evaluations/{id}','UserController@evaluations');

Route::post('/chat/create/{starter_id}/{owner_id}','UserController@create_chat');

Route::get('/user/messages/{id}','UserController@all_messages');

Route::get('/user/one_chat/{chat_room_id}','UserController@one_chat');

Route::get('/admin/one_chat/{chat_room_id}','UserController@admin_user_one_chat');

Route::post('/new_message_reply/{chat_room_id}/{sender_id}','UserController@new_message_reply');

Route::post('/new_admin_user_message_reply/{chat_room_id}/{chat_user_id}/{chat_admin_id}','UserController@new_admin_user_message_reply');

Route::get('/user/view_notifications/{id}','UserController@view_notifications');

Route::post('/language', function (Request $request){
    $website_data = Setting::find(1);
    $website_data->language = $request->language;
    $website_data->save();

    if(Auth::user()){
        $user = Auth::user();
        $user->language = $request->language;
        $user->save();
    }

    return back();
});

//Route::get('/home', 'HomeController@index')->name('home');



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//Auth::routes();



// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => 'password.update',
//    'uses' => 'Auth\ResetPasswordController@reset'
    'uses' => 'Auth\ResetPasswordController@postEmail'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);

//Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
//Route::post('/register/admin', [RegisterController::class,'createAdmin']);

Route::group(['middleware' => 'auth:admin'], function () {

    Route::view('/admin', 'admin');
});

Route::get('logout', [LoginController::class,'logout']);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::get('/admin/home', function (){
    $website_data = Setting::find(1);
    $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
    $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
    $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
    $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
    $documentation_requests = License::where('status', 'unread')->get();
    $contact_us_messages = Contact::where('status', 'unread')->get();

    $admins = DB::table('admins')->paginate(10);
    $super_admin = Admin::find(1);

    return view('admin.arabic.admins', compact('website_data', 'no_of_user_messages', 'commission_requests',
        'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages', 'admins', 'super_admin'));

//    if($website_data->language == 0){
//        Date::setLocale('ar');
//        return view('admin.arabic.home', compact('website_data', 'no_of_user_messages', 'commission_requests',
//            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
//    }
//    else{
//        Date::setLocale('en');
//        return view('admin.english.home', compact('website_data', 'no_of_user_messages', 'commission_requests',
//            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
//    }
});


Route::get('/admin/admins', 'AdminController@admins');

Route::get('/admin/new', 'AdminController@new_admin');

Route::post('/admins/store', 'AdminController@store_admin');

Route::get('/admin/block/{admin_id}', 'AdminController@block_admin');

Route::get('/admin/unblock/{admin_id}', 'AdminController@unblock_admin');


Route::get('/admin/users','AdminController@users');

Route::get('/admin/view_user_profile/{user_id}','AdminController@view_user_profile');

Route::get('/admin/users/reports', 'AdminController@users_reports');

Route::get('/user/block/{user_id}', 'AdminController@block_user');

Route::get('/admin/blocked_users','AdminController@blocked_users');

Route::get('/user/unblock/{user_id}','AdminController@unblock_users');


Route::get('/admin/posts', 'AdminController@posts');

Route::get('/admin/post/{post_id}','AdminController@view_full_post');

Route::get('/admin/delete_comment/{comment_id}', 'AdminController@delete_comment');

Route::get('/admin/delete_reply/{reply_id}', 'AdminController@delete_reply');

Route::get('/admin/posts/reports', 'AdminController@posts_reports');

Route::get('/post/delete/{post_id}', 'AdminController@delete_post');

Route::get('/admin/deleted_posts', 'AdminController@deleted_posts');

Route::get('/post/restore/{post_id}','AdminController@restore_posts');

Route::post('/admin/search_posts', "AdminController@search_posts")->name('search.posts');


Route::get('/admin/user_contact', 'AdminController@user_contact');

Route::get('/admin/admin_user_one_chat/{chat_room_id}','AdminController@one_chat');

Route::post('/admin/new_admin_user_message_reply/{chat_room_id}/{admin_id}/{user_id}','AdminController@new_admin_user_message_reply');


Route::get('/admin/commission_payments', 'AdminController@commission_payments');

Route::get('/admin/accept_commission/{accept_commission_id}', 'AdminController@accept_commission');

Route::post('/admin/reject_commission', 'AdminController@reject_commission');


Route::get('/admin/allowed_countries','AdminController@allowed_countries');

Route::post('/admin/store_country','AdminController@store_country');

Route::get('/admin/delete_country/{country_id}','AdminController@delete_country');


Route::get('/admin/definitions','AdminController@definitions');

Route::post('/admin/store_definition','AdminController@store_definition');

Route::put('/admin/update_definition','AdminController@update_definition');


Route::get('/admin/usage_terms','AdminController@usage_terms');

Route::post('/admin/store_usage_term','AdminController@store_usage_term');

Route::get('/admin/delete_usage_term/{usage_term_id}','AdminController@delete_usage_term');


Route::get('/admin/content_addition_terms','AdminController@content_addition_terms');

Route::post('/admin/store_content_addition_term','AdminController@store_content_addition_term');

Route::get('/admin/delete_content_addition_term/{content_addition_term_id}','AdminController@delete_content_addition_term');


Route::get('/admin/labor_services_terms','AdminController@labor_services_terms');

Route::post('/admin/store_labor_services_term','AdminController@store_labor_services_term');

Route::get('/admin/delete_labor_services_term/{labor_services_term_id}','AdminController@delete_labor_services_term');


Route::get('/admin/security_policies','AdminController@security_policies');

Route::post('/admin/store_security_policy','AdminController@store_security_policy');

Route::get('/admin/delete_security_policy/{security_policy_id}','AdminController@delete_security_policy');


Route::get('/admin/allowed_regions','AdminController@allowed_regions');

Route::post('/admin/store_region','AdminController@store_region');

Route::get('/admin/delete_region/{region_id}','AdminController@delete_region');


Route::get('/admin/system_accounts','AdminController@system_accounts');

Route::post('/admin/store_account','AdminController@store_account');

Route::get('/admin/delete_account/{system_account_id}','AdminController@delete_account');


Route::get('/admin/certified_banks','AdminController@certified_banks');

Route::post('/admin/store_bank','AdminController@store_bank');

Route::get('/admin/delete_bank/{bank_id}','AdminController@delete_bank');


Route::get('/admin/installed_ads','AdminController@installed_ads_terms');

Route::post('/admin/store_ads_installation_term','AdminController@store_ads_installation_term');

Route::get('/admin/delete_installed_ads_term/{ads_term_id}','AdminController@delete_installed_ads_term');


Route::get('/admin/rank_terms','AdminController@rank_terms');

Route::post('/admin/store_rank_term','AdminController@store_rank_term');

Route::get('/admin/delete_rank_term/{rank_term_id}','AdminController@delete_rank_term');


Route::get('/admin/membership_requests', 'AdminController@membership_requests');

Route::get('/admin/accept_membership_request/{membership_request_id}', 'AdminController@accept_membership_request');

Route::post('/admin/reject_membership_request', 'AdminController@reject_membership_request');


Route::get('/admin/membership_terms','AdminController@membership_terms');

Route::post('/admin/store_membership_term','AdminController@store_membership_term');

Route::get('/admin/delete_membership_term/{membership_term_id}','AdminController@delete_membership_term');


Route::get('/admin/membership_features','AdminController@membership_features');

Route::post('/admin/store_membership_feature','AdminController@store_membership_feature');

Route::get('/admin/delete_membership_feature/{membership_feature_id}','AdminController@delete_membership_feature');


Route::get('/admin/membership_price','AdminController@membership_price');

Route::post('/admin/store_membership_price','AdminController@store_membership_price');

Route::put('/admin/update_membership_price','AdminController@update_membership_price');


Route::get('/admin/membership_faqs','AdminController@membership_faqs');

Route::post('/admin/store_membership_faq','AdminController@store_membership_faq');

Route::get('/admin/delete_membership_faq/{membership_faq_id}','AdminController@delete_membership_faq');


Route::get('/admin/rating_acceptance_terms', 'AdminController@rating_acceptance_terms');

Route::post('/admin/store_rating_acceptance_term','AdminController@store_rating_acceptance_term');

Route::get('/admin/delete_rating_acceptance_term/{rating_acceptance_term_id}','AdminController@delete_rating_acceptance_term');


Route::get('/admin/rating_joining_terms', 'AdminController@rating_joining_terms');

Route::post('/admin/store_rating_joining_term','AdminController@store_rating_joining_term');

Route::get('/admin/delete_rating_joining_term/{rating_joining_term_id}','AdminController@delete_rating_joining_term');


Route::get('/admin/rating_faqs', 'AdminController@rating_faqs');

Route::post('/admin/store_rating_faq','AdminController@store_rating_faq');

Route::get('/admin/delete_rating_faq/{rating_faq_id}','AdminController@delete_rating_faq');


Route::get('/admin/discount_factors', 'AdminController@discount_factors');

Route::post('/admin/store_discount_factor','AdminController@store_discount_factor');

Route::get('/admin/delete_discount_factor/{discount_factor_id}','AdminController@delete_discount_factor');


Route::get('/admin/discounts', 'AdminController@discounts');

Route::post('/admin/update_discount','AdminController@update_discount');


Route::post('/admin/store_discount_factor','AdminController@store_discount_factor');

Route::get('/admin/delete_discount_factor/{discount_factor_id}','AdminController@delete_discount_factor');


Route::get('/admin/discount_notes', 'AdminController@discount_notes');

Route::post('/admin/store_discount_note','AdminController@store_discount_note');

Route::get('/admin/delete_discount_note/{discount_note_id}','AdminController@delete_discount_note');


Route::get('/admin/service_membership_price','AdminController@service_membership_price');

Route::post('/admin/store_service_membership_price','AdminController@store_service_membership_price');

Route::put('/admin/update_service_membership_price','AdminController@update_service_membership_price');


Route::get('/admin/service_membership_types','AdminController@service_membership_types');

Route::post('/admin/store_service_membership_type','AdminController@store_service_membership_type');

Route::get('/admin/delete_service_membership_type/{service_membership_type_id}','AdminController@delete_service_membership_type');


Route::get('/admin/service_membership_features','AdminController@service_membership_features');

Route::post('/admin/store_service_membership_feature','AdminController@store_service_membership_feature');

Route::get('/admin/delete_service_membership_feature/{service_membership_feature_id}','AdminController@delete_service_membership_feature');


Route::get('/admin/service_membership_terms','AdminController@service_membership_terms');

Route::post('/admin/store_service_membership_term','AdminController@store_service_membership_term');

Route::get('/admin/delete_service_membership_term/{service_membership_term_id}','AdminController@delete_service_membership_term');


Route::get('/admin/service_membership_policy','AdminController@service_membership_policy');

Route::post('/admin/store_service_membership_one_policy','AdminController@store_service_membership_one_policy');

Route::get('/admin/delete_service_membership_one_policy/{service_membership_one_policy_id}','AdminController@delete_service_membership_one_policy');


Route::get('/admin/service_membership_faqs','AdminController@service_membership_faqs');

Route::post('/admin/store_service_membership_faq','AdminController@store_service_membership_faq');

Route::get('/admin/delete_service_membership_faq/{service_membership_faq_id}','AdminController@delete_service_membership_faq');


Route::get('/admin/reports_price','AdminController@reports_price');

Route::post('/admin/store_report_price','AdminController@store_report_price');

Route::put('/admin/update_report_price','AdminController@update_report_price');

Route::get('/admin/report_template','AdminController@report_template');

Route::post('/admin/store_report_template','AdminController@store_report_template');

Route::put('/admin/update_report_template','AdminController@update_report_template');

Route::get('/admin/previous_reports','AdminController@previous_reports');

Route::get('/admin/reports_requests','AdminController@reports_requests');

Route::post('/admin/deliver_report/{previous_report_id}','AdminController@deliver_report');

Route::get('/admin/view_report/{previous_report_id}','AdminController@view_report');

Route::get('/admin/license_requests','AdminController@license_requests');

Route::get('/admin/document_user/{user_id}', 'AdminController@document_user');

Route::post('/admin/reject_license', 'AdminController@reject_license');

Route::get('/admin/cancel_documentation/{license_id}', 'AdminController@cancel_documentation');


Route::get('/admin/contact_reasons', 'AdminController@contact_reasons');

Route::post('/admin/store_reason','AdminController@store_reason');

Route::get('/admin/delete_reason/{contact_reason_id}', 'AdminController@delete_reason');


Route::get('/admin/contacts', 'AdminController@contacts');


Route::get('/admin/not_allowed_goods', 'AdminController@not_allowed_goods');

Route::post('/admin/store_not_allowed_good','AdminController@store_not_allowed_good');


Route::get('/admin/not_allowed_ads', 'AdminController@not_allowed_ads');

Route::post('/admin/store_not_allowed_ad','AdminController@store_not_allowed_ad');


Route::get('/admin/not_allowed_replies', 'AdminController@not_allowed_replies');

Route::post('/admin/store_not_allowed_reply','AdminController@store_not_allowed_reply');


Route::get('/admin/not_allowed_messages', 'AdminController@not_allowed_messages');


Route::get('/admin/black_list_users', 'AdminController@black_list_users');

Route::post('/admin/store_black_list_user','AdminController@store_black_list_user');

Route::get('/admin/delete_black_list_user/{black_list_user_id}', 'AdminController@delete_black_list_user');


Route::post('/admin/store_not_allowed_message','AdminController@store_not_allowed_message');

Route::get('/admin/delete_not_allowed/{not_allowed_id}', 'AdminController@delete_not_allowed');


Route::get('/admin/avoid_scams', 'AdminController@avoid_scams');

Route::post('/admin/store_avoid_scam','AdminController@store_avoid_scam');

Route::get('/admin/delete_avoid_scam/{avoid_scam_id}', 'AdminController@delete_avoid_scam');


Route::get('/admin/know_the_frauds', 'AdminController@know_the_frauds');

Route::post('/admin/store_know_the_fraud','AdminController@store_know_the_fraud');

Route::get('/admin/delete_know_the_fraud/{know_the_fraud_id}', 'AdminController@delete_know_the_fraud');


Route::get('/admin/personal_safety', 'AdminController@personal_safety');

Route::post('/admin/store_one_personal_safety','AdminController@store_one_personal_safety');

Route::get('/admin/delete_one_personal_safety/{one_personal_safety_id}', 'AdminController@delete_one_personal_safety');


Route::get('/admin/profile/{admin_id}','AdminController@admin_profile');

Route::put('/admins/{admin_id}','AdminController@update_admin');


Route::get('/admin/website_data','AdminController@website_data');

Route::put('/admin/update_website_data','AdminController@update_website_data');


Route::post('/admin/admin_user_chat/create/{admin_id}/{user_id}','AdminController@create_admin_user_chat');



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::get('/website_commission', 'InstructionController@website_commission');

Route::post('/website_commission', 'InstructionController@store_website_commission');

Route::get('/featured_posts', 'InstructionController@featured_posts');

Route::get('/cars_membership', 'InstructionController@cars_membership');

Route::get('/membership/subscribe', 'InstructionController@membership_subscribe');

Route::post('/membership/subscribe', 'InstructionController@store_membership_subscribe');

Route::get('/service_membership', 'InstructionController@service_membership');

Route::post('/service_membership_subscription', 'InstructionController@store_service_membership_subscription');

Route::get('/car_report', 'InstructionController@car_report');

Route::get('/new_report', 'InstructionController@new_report');

Route::post('/store_new_report', 'InstructionController@store_new_report');

Route::get('/previous_reports', 'InstructionController@previous_reports');

Route::get('/view_report', 'InstructionController@view_report');

Route::get('/view_selected_report/{previous_report_id}', 'InstructionController@view_selected_report');

Route::get('/usage_agreement', 'InstructionController@usage_agreement');

Route::get('/notallowed', 'InstructionController@notallowed');

//Route::get('/license', 'InstructionController@license');

Route::get('/membership_license', 'InstructionController@membership_license');

Route::get('/rating', 'InstructionController@rating');

Route::get('/discount', 'InstructionController@discount');

Route::get('/black_list', 'InstructionController@black_list');

Route::post('/search_black_list', "InstructionController@search")->name('search.route');

Route::get('/contact_us', 'InstructionController@contact_us');

Route::post('/contact_us', 'InstructionController@store_contact_us');

Route::get('/view_license', 'InstructionController@view_license');

Route::get('/add_license', 'InstructionController@add_license');

Route::post('/store_license', 'InstructionController@store_license');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////