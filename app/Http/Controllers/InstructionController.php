<?php

namespace App\Http\Controllers;

use App\Account;
use App\Adminusermessage;
use App\Adsinstallationterm;
use App\Avoidscam;
use App\Bank;
use App\Commission;
use App\Contact;
use App\Contactreason;
use App\Contentterm;
use App\Definition;
use App\Discountfactor;
use App\Discountnote;
use App\Fraud;
use App\Frequentservicefaq;
use App\Frequentservicefeature;
use App\Frequentservicepolicy;
use App\Frequentserviceprice;
use App\Frequentserviceterm;
use App\Frequentservicetype;
use App\License;
use App\Membershipfaq;
use App\Membershipfeature;
use App\Membershipprice;
use App\Membershipterm;
use App\Message;
use App\Notallowed;
use App\Notification;
use App\Post;
use App\Rankterm;
use App\Ratingacceptanceterm;
use App\Ratingfaq;
use App\Ratingjoiningterm;
use App\Reoprttemplate;
use App\Report;
use App\Reportprice;
use App\Safety;
use App\Securitypolicy;
use App\Serviceterm;
use App\Setting;
use App\Subscription;
use App\Usageterm;
use App\User;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InstructionController extends Controller
{

    public function website_commission(){
        $banks = Bank::all();
        $system_accounts = Account::all();
        $website_data = Setting::find(1);
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.website_commission', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'banks', 'system_accounts', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.website_commission', compact('no_of_notifications', 'no_of_messages', 'website_data', 'banks', 'system_accounts', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.website_commission', compact( 'website_data', 'banks', 'system_accounts'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.website_commission', compact('website_data', 'banks', 'system_accounts'));
            }
        }
    }

    public function store_website_commission(Request $request){
        $commission = new Commission();
        $commission->username = Auth::user()->username;
        $commission->phone = $request->phone;
        $commission->bank_name = $request->bank_name;
        $commission->commission = $request->commission;
        $commission->transformation_time = $request->transformation_time;
        $commission->transformer_name = $request->transformer_name;
        $commission->user_id = Auth::user()->id;
        if($request->notes != null)
            $commission->notes = $request->notes;
        $posts = Post::all();
        $selected_post = null;
        foreach($posts as $post){
            if($post->ads_no == $request->ads_no){
                $selected_post = $post->id;
                $commission->ads_no = $request->ads_no;
            }
        }
        if($selected_post == null)
            return redirect()->back()->with('alert', 'رقم الاعلان غير صحيح');
        if($request->hasFile('bill')){
            $file = $request->file('bill');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/bills', $filename);
            $commission->bill = $filename;
        }
        $commission->save();

        return redirect()->back()->with('alert', 'تم إرسال نموذج التحويل بنجاح');
    }

    public function featured_posts(){
        $website_data = Setting::find(1);
        $ads_terms = Adsinstallationterm::all();
        $rank_terms = Rankterm::all();
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.featured_posts', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'ads_terms', 'rank_terms', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.featured_posts', compact('no_of_notifications', 'no_of_messages', 'website_data', 'ads_terms', 'rank_terms', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.featured_posts', compact( 'website_data', 'ads_terms', 'rank_terms'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.featured_posts', compact('website_data', 'ads_terms', 'rank_terms'));
            }
        }
    }

    public function cars_membership(){
        $website_data = Setting::find(1);
        $membership_terms = Membershipterm::take(5)->get();
        $membership_features = Membershipfeature::take(8)->get();
        $membership_faqs = Membershipfaq::take(6)->get();
        $membership_price = Membershipprice::find(1);
        $i = 0;
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.cars_membership', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'membership_terms', 'membership_features', 'membership_faqs', 'i', 'membership_price', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.cars_membership', compact('no_of_notifications', 'no_of_messages', 'website_data', 'membership_terms', 'membership_features', 'membership_faqs', 'i', 'membership_price', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.cars_membership', compact( 'website_data', 'membership_terms', 'membership_features', 'membership_faqs', 'i', 'membership_price'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.cars_membership', compact('website_data', 'membership_terms', 'membership_features', 'membership_faqs', 'i', 'membership_price'));
            }
        }
    }

    public function membership_subscribe(){
        $website_data = Setting::find(1);
        $membership_price = Membershipprice::find(1);
        $banks = Bank::all();
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.membership_subscribe', compact( 'no_of_notifications', 'no_of_messages' ,'website_data', 'membership_price', 'banks', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.membership_subscribe', compact('no_of_notifications', 'no_of_messages' ,'website_data', 'membership_price', 'banks', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.membership_subscribe', compact( 'website_data', 'membership_price', 'banks'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.membership_subscribe', compact('website_data', 'membership_price', 'banks'));
            }
        }
    }

    public function store_membership_subscribe(Request $request){
        $membership_subscription = new Subscription();
        $membership_subscription->phone = $request->phone;
        $membership_subscription->username = $request->username;
        $membership_subscription->money_amount = $request->money_amount;
        $membership_subscription->bank_name = $request->bank_name;
        $membership_subscription->transformation_time = $request->transformation_time;
        $membership_subscription->transformer_name = $request->transformer_name;
        $membership_subscription->user_id = Auth::user()->id;
        if($request->notes != null)
            $membership_subscription->notes = $request->notes;
        $membership_subscription->save();

        return redirect()->back()->with('alert', 'تم إرسال نموذج الإشتراك بنجاح');
    }

    public function service_membership(){
        $website_data = Setting::find(1);
        $service_membership_price = Frequentserviceprice::find(1);
        $service_membership_types = Frequentservicetype::all();
        $service_membership_features = Frequentservicefeature::all();
        $service_membership_terms = Frequentserviceterm::all();
        $service_membership_policy = Frequentservicepolicy::all();
        $service_membership_faqs = Frequentservicefaq::all();
        $banks = Bank::all();
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.service_membership', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'service_membership_price', 'service_membership_types', 'service_membership_features', 'service_membership_terms', 'service_membership_policy', 'service_membership_faqs', 'banks', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.service_membership', compact('no_of_notifications', 'no_of_messages', 'website_data', 'service_membership_price', 'service_membership_types', 'service_membership_features', 'service_membership_terms', 'service_membership_policy', 'service_membership_faqs', 'banks', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.service_membership', compact( 'website_data', 'service_membership_price', 'service_membership_types', 'service_membership_features', 'service_membership_terms', 'service_membership_policy', 'service_membership_faqs', 'banks'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.service_membership', compact('website_data', 'service_membership_price', 'service_membership_types', 'service_membership_features', 'service_membership_terms', 'service_membership_policy', 'service_membership_faqs', 'banks'));
            }
        }
    }

    public function store_service_membership_subscription(Request $request){
        $membership_subscription = new Subscription();
        $membership_subscription->phone = $request->phone;
        $membership_subscription->username = $request->username;
        $membership_subscription->money_amount = $request->money_amount;
        $membership_subscription->bank_name = $request->bank_name;
        $membership_subscription->transformation_time = $request->transformation_time;
        $membership_subscription->transformer_name = $request->transformer_name;
        $membership_subscription->user_id = Auth::user()->id;
        if($request->notes != null)
            $membership_subscription->notes = $request->notes;
        $membership_subscription->save();

        return redirect()->back()->with('alert', 'تم إرسال نموذج الإشتراك بنجاح');
    }

    public function car_report(){
        $website_data = Setting::find(1);
        $report_price = Reportprice::find(1);
        $report_template = Reoprttemplate::find(1);
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.car_report', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'report_price', 'report_template', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.car_report', compact('no_of_notifications', 'no_of_messages', 'website_data', 'report_price', 'report_template', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('auth.arabic.login', compact( 'website_data'));
            }
            else{
                Date::setLocale('en');
                return view('auth.english.login', compact('website_data'));
            }
        }
    }

    public function new_report(){
        $website_data = Setting::find(1);
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.new_report', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.new_report', compact('no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('auth.arabic.login', compact( 'website_data'));
            }
            else{
                Date::setLocale('en');
                return view('auth.english.login', compact('website_data'));
            }
        }
    }

    public function store_new_report(Request $request){
        $report = new Report();
        $report->serial_no = $request->serial_no;
        $report->plate_info_in_arabic = $request->plate_info_in_arabic;
        $report->plate_info_in_english = $request->plate_info_in_english;
        if($request->phone_no != null)
            $report->phone_no = $request->phone_no;
        if($request->ads_no != null){
            $posts = Post::all();
            $selected_post = null;
            foreach($posts as $post){
                if($post->ads_no == $request->ads_no){
                    $selected_post = $post->id;
                    $report->ads_no = $request->ads_no;
                }
            }
            if($selected_post == null)
                return redirect()->back()->with('alert', 'رقم الاعلان غير صحيح');
        }
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect()->back()->with('alert', 'تم إرسال الطلب بنجاح');
    }

    public function previous_reports(){
        $website_data = Setting::find(1);
        $previous_reports = Report::where('user_id', Auth::user()->id)->get();
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.previous_reports', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'previous_reports', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.previous_reports', compact('no_of_notifications', 'no_of_messages', 'website_data', 'previous_reports', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('auth.arabic.login', compact( 'website_data'));
            }
            else{
                Date::setLocale('en');
                return view('auth.english.login', compact('website_data'));
            }
        }
    }

    public function view_report(){
        $website_data = Setting::find(1);
        $report_template = Reoprttemplate::find(1);
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.view_report', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'report_template', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.view_report', compact('no_of_notifications', 'no_of_messages', 'website_data', 'report_template', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('auth.arabic.login', compact( 'website_data'));
            }
            else{
                Date::setLocale('en');
                return view('auth.english.login', compact('website_data'));
            }
        }
    }

    public function view_selected_report($id){
        $website_data = Setting::find(1);
        $selected_report = Report::find($id);
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.view_selected_report', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'selected_report', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.view_selected_report', compact('no_of_notifications', 'no_of_messages', 'website_data', 'selected_report', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('auth.arabic.login', compact( 'website_data'));
            }
            else{
                Date::setLocale('en');
                return view('auth.english.login', compact('website_data'));
            }
        }
    }

    public function usage_agreement(){
        $website_data = Setting::find(1);
        $notallowed_goods = Notallowed::where('type', 'goods')->get();
        $notallowed_ads = Notallowed::where('type', 'ads')->get();
        $notallowed_replies = Notallowed::where('type', 'replies')->get();
        $notallowed_messages = Notallowed::where('type', 'messages')->get();

        $definition = Definition::find(1);
        $usage_terms = Usageterm::all();
        $content_addition_terms = Contentterm::all();
        $labor_services_terms = Serviceterm::all();
        $security_policies = Securitypolicy::all();
        $membership_terms = Membershipterm::all();
        if(Auth::user()){
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            $auth_user = explode(' ', Auth::user()->name);
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.usage_agreement', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages',
                    'auth_user', 'notallowed_goods', 'notallowed_ads', 'notallowed_replies', 'notallowed_messages', 'definition', 'usage_terms',
                    'content_addition_terms', 'labor_services_terms', 'security_policies', 'membership_terms'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.usage_agreement', compact('no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages',
                    'auth_user', 'notallowed_goods', 'notallowed_ads', 'notallowed_replies', 'notallowed_messages', 'definition', 'usage_terms',
                    'content_addition_terms', 'labor_services_terms', 'security_policies', 'membership_terms'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.usage_agreement', compact( 'website_data', 'notallowed_goods', 'notallowed_ads', 'notallowed_replies',
                    'notallowed_messages', 'definition', 'usage_terms', 'content_addition_terms', 'labor_services_terms', 'security_policies', 'membership_terms'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.usage_agreement', compact('website_data', 'notallowed_goods', 'notallowed_ads', 'notallowed_replies',
                    'notallowed_messages', 'definition', 'usage_terms', 'content_addition_terms', 'labor_services_terms', 'security_policies', 'membership_terms'));
            }
        }
    }

    public function notallowed(){
        $website_data = Setting::find(1);
        $not_allowed_goods = Notallowed::where('type', 'goods')->get();
        $not_allowed_ads = Notallowed::where('type', 'ads')->get();
        $not_allowed_replies = Notallowed::where('type', 'replies')->get();
        $not_allowed_messages = Notallowed::where('type', 'messages')->get();
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.notallowed', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'not_allowed_goods', 'not_allowed_ads', 'not_allowed_replies', 'not_allowed_messages', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.notallowed', compact('no_of_notifications', 'no_of_messages', 'website_data', 'not_allowed_goods', 'not_allowed_ads', 'not_allowed_replies', 'not_allowed_messages', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.notallowed', compact( 'website_data', 'not_allowed_goods', 'not_allowed_ads', 'not_allowed_replies', 'not_allowed_messages'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.notallowed', compact('website_data', 'not_allowed_goods', 'not_allowed_ads', 'not_allowed_replies', 'not_allowed_messages'));
            }
        }
    }

    public function membership_license(){
        $website_data = Setting::find(1);
        if (Auth::user()) {
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if (Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.membership_license', compact('no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
            } else {
                Date::setLocale('en');
                return view('user.english.membership_license', compact('no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if ($website_data->language == 0) {
                Date::setLocale('ar');
                return view('auth.arabic.login', compact('website_data'));
            } else {
                Date::setLocale('en');
                return view('auth.english.login', compact('website_data'));
            }
        }
    }

    public function rating(){
        $website_data = Setting::find(1);
        $rating_acceptance_terms = Ratingacceptanceterm::all();
        $rating_joining_terms = Ratingjoiningterm::all();
        $rating_faqs = Ratingfaq::orderBy('id', 'desc')->take(9)->get();
        $i = 0;
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.rating', compact( 'no_of_notifications', 'no_of_messages', 'website_data',
                    'no_of_admin_messages', 'rating_acceptance_terms', 'rating_joining_terms', 'rating_faqs', 'i', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.rating', compact('no_of_notifications', 'no_of_messages', 'website_data',
                    'no_of_admin_messages', 'rating_acceptance_terms', 'rating_joining_terms', 'rating_faqs', 'i', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.rating', compact( 'website_data', 'rating_joining_terms', 'rating_acceptance_terms', 'rating_faqs', 'i'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.rating', compact('website_data', 'rating_joining_terms', 'rating_acceptance_terms', 'rating_faqs', 'i'));
            }
        }
    }

    public function discount(){
        $website_data = Setting::find(1);
        $discount_notes = Discountnote::all();
        $discount_factors = Discountfactor::all();
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.discount', compact( 'no_of_notifications', 'no_of_messages', 'website_data',
                    'no_of_admin_messages', 'discount_notes', 'discount_factors', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.discount', compact('no_of_notifications', 'no_of_messages', 'website_data',
                    'no_of_admin_messages', 'discount_notes', 'discount_factors', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.discount', compact( 'website_data', 'discount_notes', 'discount_factors'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.discount', compact('website_data', 'discount_notes', 'discount_factors'));
            }
        }
    }

    public function black_list(){
        $website_data = Setting::find(1);
        $avoid_scams = Avoidscam::all();
        $frauds = Fraud::all();
        $personal_safety = Safety::all();
        if(Auth::user()){
			$auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.black_list', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'avoid_scams', 'frauds', 'personal_safety', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.black_list', compact('no_of_notifications', 'no_of_messages', 'website_data', 'avoid_scams', 'frauds', 'personal_safety', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.black_list', compact( 'website_data', 'avoid_scams', 'frauds', 'personal_safety'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.black_list', compact('website_data', 'avoid_scams', 'frauds', 'personal_safety'));
            }
        }
    }

    public function search(Request $request){
        $website_data = Setting::find(1);
        $avoid_scams = Avoidscam::all();
        $frauds = Fraud::all();
        $personal_safety = Safety::all();
        $users = User::all();
        $r = 0;
        $q = $request->q;
        if ($q != ''){

            foreach ($users as $user){
                if($user->phone == $q)
                    $r = 1;
            }

            $black_list_users = DB::table('blacklists')->where('phone','LIKE', '%' . $q . '%')
//                ->orWhere("address","LIKE", "%" . $q . "%")
                ->get();

            if(Auth::user()){
                $auth_user = explode(' ', Auth::user()->name);
                $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
                $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
                $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
                if(Auth::user()->language == 0){
                    if(count($black_list_users) > 0)
                        return view('user.arabic.black_list', compact('black_list_users', 'no_of_notifications', 'no_of_messages', 'website_data',
                            'avoid_scams', 'frauds', 'personal_safety', 'q', 'no_of_admin_messages', 'auth_user', 'r'));
                    else
                        return view('user.arabic.black_list', compact('no_of_notifications', 'no_of_messages', 'website_data', 'avoid_scams', 'frauds',
                            'personal_safety', 'no_of_admin_messages', 'q', 'black_list_users', 'auth_user', 'r'));
                }
                else{
                    if(count($black_list_users) > 0)
                        return view('user.english.black_list', compact('black_list_users','no_of_notifications', 'no_of_messages', 'website_data',
                            'avoid_scams', 'frauds', 'personal_safety', 'q', 'no_of_admin_messages', 'auth_user', 'r'));
                    else
                        return view('user.arabic.black_list', compact('no_of_notifications', 'no_of_messages','website_data', 'avoid_scams', 'frauds',
                            'personal_safety', 'no_of_admin_messages', 'q', 'black_list_users', 'auth_user', 'r'));
                }
            }
            else
                return view('auth.arabic.login', compact( 'website_data'));
        }
    }

    public function contact_us(){
        $website_data = Setting::find(1);
        $contact_reasons = Contactreason::all();
        if(Auth::user()){
            $auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.contact_us', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'contact_reasons', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.contact_us', compact('no_of_notifications', 'no_of_messages', 'website_data', 'contact_reasons', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.contact_us', compact( 'website_data', 'contact_reasons'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.contact_us', compact('website_data', 'contact_reasons'));
            }
        }
    }

    public function store_contact_us(Request $request){
        $contact_us = new Contact();
        $contact_us->contact_reason = $request->contact_reason;
        $contact_us->email = $request->email;
        $contact_us->phone = $request->phone;
        $contact_us->body = $request->body;
        if($request->hasFile('illustration')){
            $file = $request->file('illustration');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('illustrations', $filename);
            $contact_us->illustration = $filename;
        }
        $contact_us->save();

        $website_data = Setting::find(1);
        if(Auth::user()->language == 0)
            return redirect()->back()->with('alert', 'تم ارسال الرسالة ، سيتم الرد عليك في أسرع وقت ممكن. شكراً لتواصلك معنا');
        else
            return redirect()->back()->with('alert', 'Your message has been sent. You will receive a reply as soon as possible');

    }

    public function view_license(){
        $website_data = Setting::find(1);
        if(Auth::user()){
            $auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.view_license', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.view_license', compact('no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('auth.arabic.login', compact( 'website_data'));
            }
            else{
                Date::setLocale('en');
                return view('auth.english.login', compact('website_data'));
            }
        }
    }

    public function add_license(){
        $website_data = Setting::find(1);
        if(Auth::user()){
            $auth_user = explode(' ', Auth::user()->name);
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.add_license', compact( 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.add_license', compact('no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('auth.arabic.login', compact( 'website_data'));
            }
            else{
                Date::setLocale('en');
                return view('auth.english.login', compact('website_data'));
            }
        }
    }

    public function store_license(Request $request){
        if(Auth::user()->documentation_status == 1)
            return redirect()->back()->with('alert', 'هذا الحساب موثق مسبقاً');
        else{
            $license = new License();
            $license->user_id = Auth::user()->id;
            $license->document_no = $request->document_no;
            if($request->hasFile('document_img')){
                $file = $request->file('document_img');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/documentation', $filename);
                $license->document_img = $filename;
            }
            $license->status = 'unread';
            $license->notes = $request->notes;
            $license->save();

            return redirect()->back()->with('alert', 'تم إرسال الطلب بنجاح');
        }
    }

}
