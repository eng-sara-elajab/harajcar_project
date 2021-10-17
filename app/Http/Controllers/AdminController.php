<?php

namespace App\Http\Controllers;

use App\Account;
use App\Admin;
use App\Adminuserchat;
use App\Adminusermessage;
use App\Adsinstallationterm;
use App\Avoidscam;
use App\Bank;
use App\Blacklist;
use App\Comment;
use App\Commission;
use App\Contact;
use App\Contactreason;
use App\Contentterm;
use App\Country;
use App\Definition;
use App\Discountfactor;
use App\Discountnote;
use App\Follower;
use App\Fraud;
use App\Frequentservicefaq;
use App\Frequentservicefeature;
use App\Frequentservicepolicy;
use App\Frequentserviceprice;
use App\Frequentserviceterm;
use App\Frequentservicetype;
use App\Image;
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
use App\Region;
use App\Reoprttemplate;
use App\Reply;
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

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function admins(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $admins = DB::table('admins')->paginate(10);
        $super_admin = Admin::find(1);

        return view('admin.arabic.admins', compact('admins', 'website_data', 'super_admin', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function new_admin(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.new_admin', compact('website_data', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_admin(Request $request){
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password == $request->password_1)
            $admin->password = bcrypt($request->password);
        else
            return redirect()->back()->with('alert', 'كلمة السر غير متطابقة');
        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/profiles', $filename);
            $admin->profile_photo = $filename;
        }
        $admin->save();
        return redirect()->back()->with('alert', 'تم إضافة الآدمن بنجاح');
    }

    public function block_admin($id){
        $admin = Admin::find($id);
        $admin->active_status = 'deactive';
        $admin->save();
        return redirect()->back()->with('alert', 'تم حظر الآدمن');
    }

    public function unblock_admin($id){
        $admin = Admin::find($id);
        $admin->active_status = 'active';
        $admin->save();
        return redirect()->back()->with('alert', 'تم إلغاء حظر الآدمن');
    }


    public function users(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $users = DB::table('users')->paginate(10);
        $followers = Follower::all();
        $followers_count = 0;

        return view('admin.arabic.users', compact('users', 'website_data', 'followers', 'followers_count', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function view_user_profile($id){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $user = User::find($id);
        $array = $user->followers;
        $users = User::all();
        $posts = DB::table('posts')->where('user_id', $user->id)->paginate(10);
        $images = Image::all();
        $likes = $user->no_of_likes;
        $dislikes = $user->no_of_dislikes;
        if($likes+$dislikes !== 0)
            $r = $likes/($likes+$dislikes)*100;
        else
            $r = 0;

        return view('admin.arabic.view_user_profile', compact('user', 'website_data', 'users', 'posts', 'images', 'array', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages', 'r'));
    }

    public function users_reports(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $users = DB::table('users')->where('reports', '>', 0)->where('active_status', 'active')->paginate(10);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.reported_users', compact('users', 'website_data', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function block_user($user_id){
        $user = User::find($user_id);
        $user->active_status = 'deactive';
        $user->save();
        return redirect()->back()->with('alert', 'تم حظر المستخدم');
    }

    public function blocked_users(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $users = DB::table('users')->where('active_status', 'deactive')->paginate(10);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.blocked_users', compact('website_data', 'users', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function unblock_users($id){
        $user = User::find($id);
        $user->active_status = 'active';
        $user->reports = 0;
        $user->save();
        return redirect()->back()->with('alert', 'تم إلغاء حظر المستخدم بنجاح');
    }


    public function posts(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $posts = DB::table('posts')->paginate(10);
        $users = User::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.posts', compact('posts', 'website_data', 'users', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function view_full_post($id){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $users = User::all();
        $post = Post::find($id);
        $comment_replies = null;
        $comments = Comment::where('post_id', $post->id)->get();
        foreach ($comments as $comment){
            $comment_replies = Reply::where('comment_id', $comment->id)->get();
        }
        $replies = $comment_replies;
        $images = Image::where('post_id', $post->id)->get();
        $post_owner = User::where('id', $post->user_id)->first();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.view_full_post', compact('website_data', 'images', 'comments', 'replies', 'users', 'post', 'post_owner',
            'no_of_user_messages', 'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function delete_comment($id){
        $comment = Comment::find($id);
        $replies = Reply::where('comment_id', $comment->id)->get();
        foreach ($replies as $reply){
            $reply->delete();
        }
        $comment->delete();

        return redirect()->back()->with('alert', 'تم حذف التعليق بنجاح');
    }

    public function delete_reply($id){
        Reply::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الرد بنجاح');
    }

    public function posts_reports(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $posts = DB::table('posts')->where('reports', 'reported')->paginate(10);
        $users = User::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.reported_posts', compact('posts', 'website_data', 'users', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function delete_post($id){
        $post = Post::find($id);
        $post->active_status = 'deactive';
        $post->save();
        return redirect()->back()->with('alert', 'تم حذف المنشور');
    }

    public function deleted_posts(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $users = User::all();
        $posts = DB::table('posts')->where('active_status', 'deactive')->paginate(10);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.deleted_posts', compact('website_data', 'posts', 'users', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function restore_posts($id){
        $post = Post::find($id);
        $post->active_status = 'active';
        $post->reports = null;
        $post->save();
        return redirect()->back()->with('alert', 'تم استعادة المنشور');
    }

    public function search_posts(Request $request){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();
        $users = User::all();
        $images = Image::all();

        $q = $request->q;
        if ($q != ''){
            $posts = DB::table('posts')->where('title','LIKE', '%' . $q . '%')
//                ->orWhere("address","LIKE", "%" . $q . "%")
                ->paginate(4);

            if($website_data->language == 0){
                Date::setLocale('ar');
                return view('admin.arabic.posts', compact('website_data','no_of_user_messages', 'subscription_requests', 'commission_requests',
                    'reports_requests', 'documentation_requests', 'contact_us_messages', 'users','posts', 'images', 'q'));
            }
            else{
                Date::setLocale('en');
                return view('admin.english.posts', compact('website_data','no_of_user_messages', 'subscription_requests', 'commission_requests',
                    'reports_requests', 'documentation_requests', 'contact_us_messages', 'users','posts', 'images', 'q'));
            }
        }
    }


    public function user_contact(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();

        $admin_user_messages = Adminusermessage::orderBy('id', 'desc')->get();
        $admin_user_chats = DB::table('adminuserchats')->where('admin_id', Auth::guard('admin')->user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        $admins = Admin::all();
        $users = User::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.user_contact', compact('website_data', 'no_of_user_messages', 'admin_user_messages', 'admin_user_chats',
            'admins', 'users', 'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function one_chat($chat_room_id){
        $website_data = Setting::find(1);
        $admin_user_messages = Adminusermessage::where('chat_room', $chat_room_id)->orderBy('id', 'asc')->get();
        foreach ($admin_user_messages as $admin_user_message){
            if($admin_user_message->receiver_id == Auth::guard('admin')->user()->id && $admin_user_message->receiver_type == 'admin'){
                $admin_user_message->read_status = 'read';
                $admin_user_message->save();
            }
        }
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $admin_user_chat = Adminuserchat::find($chat_room_id);
        $chat_admin = Admin::where('id', $admin_user_chat->admin_id)->first();
        $chat_user = User::where('id', $admin_user_chat->user_id)->first();
        $users = User::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.one_chat', compact('website_data', 'no_of_user_messages', 'admin_user_messages', 'admin_user_chat', 'chat_admin',
            'chat_user', 'users', 'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function new_admin_user_message_reply(Request $request, $chat_room_id, $chat_admin_id, $chat_user_id){
        $admin_user_message = new Adminusermessage();
        $admin_user_message->body = $request->body;
        $admin_user_message->sender_id = $chat_admin_id;
        $admin_user_message->sender_type = 'admin';
        $admin_user_message->receiver_id = $chat_user_id;
        $admin_user_message->receiver_type = 'user';
        $admin_user_message->chat_room = $chat_room_id;
        $admin_user_message->save();
        return redirect()->back();
    }


    public function commission_payments(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        foreach ($commission_requests as $commission_request){
            if($commission_request->status == 'unread'){
                $commission_request->status = 'read';
                $commission_request->save();
            }
        }
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $read_commissions = Commission::where('status', 'read')->orderBy('id', 'desc')->get();
        $all_commissions = DB::table('commissions')->orderBy('id', 'desc')->paginate(10);
        $posts = Post::all();

        return view('admin.arabic.commissions', compact('website_data', 'commission_requests', 'no_of_user_messages', 'posts',
            'all_commissions', 'subscription_requests', 'reports_requests', 'documentation_requests', 'read_commissions', 'contact_us_messages'));
    }

    public function accept_commission($accept_commission_id){
        $commission = Commission::find($accept_commission_id);
        $post = Post::where('ads_no', $commission->ads_no)->first();
        $user = User::where('id', $post->user_id)->first();
        $post->commission = 'payed';
        $commission_request = Commission::find($accept_commission_id);
        $commission_request->status = 'accepted';
        $commission_request->save();

        $membership_notification = new Notification();
        $membership_notification->body = 'Your commission has been payed successfully. Thank you';
        $membership_notification->user_id = $user->id;
        $membership_notification->save();

        return redirect()->back()->with('alert', 'تم قبول العمولة. سيتم اخطار المستخدم في اقرب وقت');
    }

    public function reject_commission(Request $request){
//        return $request;
        $commission = Commission::find($request->id);
        $commission->status = 'canceled';
        $commission->save();

        $user = User::where('id', $commission->user_id)->first();

        $membership_notification = new Notification();
        $membership_notification->body = $request->body;
        $membership_notification->user_id = $user->id;
        $membership_notification->save();

        return redirect()->back()->with('alert', 'تم اعلام المستخدم');
    }


    public function contact_reasons(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $contact_reasons = DB::table('contactreasons')->orderBy('created_at', 'desc')->paginate(10);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.contact_reasons', compact('website_data', 'contact_reasons', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_reason(Request $request){
        $contact_reason = new Contactreason();
        $contact_reason->contact_reason = $request->contact_reason;
        $contact_reason->save();

        return redirect()->back()->with('alert', 'تم إضافة السبب بنجاح');
    }

    public function delete_reason($id){
        Contactreason::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف السبب بنجاح');
    }

    public function contacts(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $contacts = DB::table('contacts')->orderBy('created_at', 'desc')->paginate(10);
        foreach ($contacts as $contact){
            if($contact->status == 'unread'){
                $contact->status = 'read';
                $contact->save();
            }
        }
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.contact_us', compact('website_data', 'contacts', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }


    public function membership_requests(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();

        foreach ($commission_requests as $commission_request){
            if($commission_request->status == 'unread'){
                $commission_request->status = 'read';
                $commission_request->save();
            }
        }
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();

        foreach ($subscription_requests as $subscription_request){
            if($subscription_request->status == 'unread'){
                $subscription_request->status = 'read';
                $subscription_request->save();
            }
        }
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $read_subscription_requests = Subscription::where('status', 'read')->orderBy('id', 'desc')->get();
        $all_subscriptions = DB::table('subscriptions')->orderBy('id', 'desc')->paginate(10);
        $users = User::all();

        return view('admin.arabic.subscriptions', compact('website_data', 'commission_requests', 'no_of_user_messages', 'subscription_requests',
            'read_subscription_requests', 'all_subscriptions', 'users', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function accept_membership_request($membership_request_id){
        $membership_request = Subscription::find($membership_request_id);
        $user = User::where('id', $membership_request->user_id)->first();
        $user->membership_status = 1;
        $user->save();

        $membership_request->status = 'accepted';
        $membership_request->save();

        $membership_notification = new Notification();
        $membership_notification->body = 'Your membership request has been accepted successfully. You are welcome!';
        $membership_notification->user_id = $user->id;
        $membership_notification->save();

        return redirect()->back()->with('alert', 'تم قبول طلب العضوية سيتم اخطار المستخدم في اقرب وقت');
    }

    public function reject_membership_request(Request $request){
//        return $request;
        $subscription_request = Subscription::find($request->id);
        $subscription_request->status = 'canceled';
        $subscription_request->save();

        $user = User::where('id', $subscription_request->user_id)->first();

        $subscription_notification = new Notification();
        $subscription_notification->body = $request->body;
        $subscription_notification->user_id = $user->id;
        $subscription_notification->save();

        return redirect()->back()->with('alert', 'تم اعلام المستخدم');
    }


    public function membership_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $membership_terms = DB::table('membershipterms')->orderBy('created_at', 'desc')->paginate(10);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.membership_terms', compact('website_data', 'membership_terms', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_membership_term(Request $request){
        $term = new Membershipterm();
        $term->body = $request->body;
        $term->save();
        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_membership_term($id){
        Membershipterm::find($id)->delete();
        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }


    public function membership_features(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $membership_features = DB::table('membershipfeatures')->orderBy('created_at', 'desc')->paginate(10);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.membership_features', compact('website_data', 'membership_features', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_membership_feature(Request $request){
        $term = new Membershipfeature();
        $term->body = $request->body;
        $term->save();
        return redirect()->back()->with('alert', 'تم إضافة الميزة بنجاح');
    }

    public function delete_membership_feature($id){
        Membershipfeature::find($id)->delete();
        return redirect()->back()->with('alert', 'تم حذف الميزة بنجاح');
    }


    public function membership_price(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $membership_price = Membershipprice::find(1);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.membership_price', compact('website_data', 'membership_price', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_membership_price(Request $request){
        $price = new Membershipprice();
        $price->price = $request->price;
        $price->save();
        return redirect()->back()->with('alert', 'تم تحديد قيمة الرسوم بنجاح');
    }

    public function update_membership_price(Request $request){
        $price = Membershipprice::find(1);
        $price->price = $request->price;
        $price->save();
        return redirect()->back()->with('alert', 'تم تعديل قيمة الرسوم بنجاح');
    }


    public function membership_faqs(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $membership_faqs = DB::table('membershipfaqs')->orderBy('created_at', 'desc')->paginate(10);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.membership_faqs', compact('website_data', 'membership_faqs', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_membership_faq(Request $request){
        $faq = new Membershipfaq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->back()->with('alert', 'تم إضافة السؤال بنجاح');
    }

    public function delete_membership_faq($id){
        Membershipfaq::find($id)->delete();
        return redirect()->back()->with('alert', 'تم حذف السؤال بنجاح');
    }


    public function rating_acceptance_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $rating_acceptance_terms = Ratingacceptanceterm::all();

        return view('admin.arabic.rating_acceptance_terms', compact('website_data', 'no_of_user_messages', 'commission_requests', 'subscription_requests', 'reports_requests',
            'documentation_requests', 'contact_us_messages', 'rating_acceptance_terms'));
    }

    public function store_rating_acceptance_term(Request $request){
        $term = new Ratingacceptanceterm();
        $term->body = $request->body;
        $term->save();
        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_rating_acceptance_term($id){
        Ratingacceptanceterm::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }


    public function rating_joining_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $rating_joining_terms = Ratingjoiningterm::all();

        return view('admin.arabic.rating_joining_terms', compact('website_data', 'no_of_user_messages', 'commission_requests', 'subscription_requests', 'reports_requests',
            'documentation_requests', 'contact_us_messages', 'rating_joining_terms'));
    }

    public function store_rating_joining_term(Request $request){
        $term = new Ratingjoiningterm();
        $term->body = $request->body;
        $term->save();
        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_rating_joining_term($id){
        Ratingjoiningterm::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }


    public function rating_faqs(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $rating_faqs = Ratingfaq::paginate(10);

        return view('admin.arabic.rating_faqs', compact('website_data', 'no_of_user_messages', 'commission_requests', 'subscription_requests', 'reports_requests',
            'documentation_requests', 'contact_us_messages', 'rating_faqs'));
    }

    public function store_rating_faq(Request $request){
        $term = new Ratingfaq();
        $term->question = $request->question;
        $term->answer = $request->answer;
        $term->save();
        return redirect()->back()->with('alert', 'تم إضافة السؤال بنجاح');
    }

    public function delete_rating_faq($id){
        Ratingfaq::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف السؤال بنجاح');
    }


    public function discount_factors(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $discount_factors = Discountfactor::all();

        return view('admin.arabic.discount_factors', compact('website_data', 'no_of_user_messages', 'commission_requests', 'subscription_requests', 'reports_requests',
            'documentation_requests', 'contact_us_messages', 'discount_factors'));
    }

    public function store_discount_factor(Request $request){
        $term = new Discountfactor();
        $term->body = $request->body;
        $term->save();
        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_discount_factor($id){
        Discountfactor::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }


    public function discounts(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $users = DB::table('users')->paginate(15);

        return view('admin.arabic.discounts', compact('website_data', 'no_of_user_messages', 'commission_requests', 'subscription_requests', 'reports_requests',
            'documentation_requests', 'contact_us_messages', 'users'));
    }

    public function update_discount(Request $request){
        $user = User::find($request->id);
        $user->discount = $request->discount;
        $user->save();

        return redirect()->back()->with('alert', 'تم تعديل قيمة الخصم بنجاح');
    }


    public function discount_notes(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $discount_notes = Discountnote::all();

        return view('admin.arabic.discount_notes', compact('website_data', 'no_of_user_messages', 'commission_requests', 'subscription_requests', 'reports_requests',
            'documentation_requests', 'contact_us_messages', 'discount_notes'));
    }

    public function store_discount_note(Request $request){
        $term = new Discountnote();
        $term->body = $request->body;
        $term->save();

        return redirect()->back()->with('alert', 'تم إضافة الملاحظات بنجاح');
    }

    public function delete_discount_note($id){
        Discountnote::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الملاحظات بنجاح');
    }

    
    public function allowed_countries(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $allowed_countries = DB::table('countries')->orderBy('id', 'desc')->paginate(15);

        return view('admin.arabic.allowed_countries', compact('website_data', 'allowed_countries', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_country(Request $request){
        $countries = Country::all();
        foreach($countries as $country){
            if($country->english_name == $request->english_name || $country->arabic_name == $request->arabic_name){
                return redirect()->back()->with('alert', 'البلد المدخل موجود مسبقاً');
            }
        }
        $country = new Country();
        $country->arabic_name = $request->arabic_name;
        $country->english_name = $request->english_name;
        $country->save();

        return redirect()->back()->with('alert', 'تم إضافة البلد بنجاح');
    }

    public function delete_country($id){
        Country::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف البلد بنجاح');
    }

    
    public function allowed_regions(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $allowed_regions = DB::table('regions')->orderBy('id', 'desc')->paginate(15);

        return view('admin.arabic.allowed_regions', compact('website_data', 'allowed_regions', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_region(Request $request){
        $regions = Region::all();
        foreach($regions as $region){
            if($region->english_name == $request->english_name || $region->arabic_name == $request->arabic_name){
                return redirect()->back()->with('alert', 'المدينة المدخلة موجودة مسبقاً');
            }
        }
        $region = new Region();
        $region->arabic_name = $request->arabic_name;
        $region->english_name = $request->english_name;
        $region->save();

        return redirect()->back()->with('alert', 'تم إضافة المدينة بنجاح');
    }

    public function delete_region($id){
        Region::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف المدينة بنجاح');
    }


    public function definitions(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $definition = Definition::find(1);

        return view('admin.arabic.definitions', compact('website_data', 'definition', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_definition(Request $request){
        $definition = new Definition();
        $definition->introduction = $request->introduction;
        $definition->definition = $request->definition;
        $definition->responsibilities = $request->responsibilities;
        $definition->privacy = $request->privacy;
        $definition->save();

        return redirect()->back()->with('alert', 'تم إضافة المقدمة التعريفية بنجاح');

    }

    public function update_definition(Request $request)
    {
        $definition = Definition::find(1);
        $definition->introduction = $request->introduction;
        $definition->definition = $request->definition;
        $definition->responsibilities = $request->responsibilities;
        $definition->privacy = $request->privacy;
        $definition->save();

        return redirect()->back()->with('alert', 'تم تحديث المقدمة التعريفية بنجاح');
    }

    public function content_addition_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $content_terms = Contentterm::all();

        return view('admin.arabic.content_addition_terms', compact('website_data', 'content_terms', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_content_addition_term(Request $request){
        $usage_term = new Contentterm();
        $usage_term->body = $request->body;
        $usage_term->save();

        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_content_addition_term($id){
        Contentterm::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }

    public function usage_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $usage_terms = Usageterm::all();

        return view('admin.arabic.usage_terms', compact('website_data', 'usage_terms', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_usage_term(Request $request){
        $usage_term = new Usageterm();
        $usage_term->body = $request->body;
        $usage_term->save();

        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_usage_term($id){
        Usageterm::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }

    public function labor_services_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $service_terms = Serviceterm::all();

        return view('admin.arabic.labor_services_terms', compact('website_data', 'service_terms', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_labor_services_term(Request $request){
        $usage_term = new Serviceterm();
        $usage_term->body = $request->body;
        $usage_term->save();

        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_labor_services_term($id){
        Serviceterm::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }


    public function security_policies(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $security_policies = Securitypolicy::all();

        return view('admin.arabic.security_policies', compact('website_data', 'security_policies', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_security_policy(Request $request){
        $usage_term = new Securitypolicy();
        $usage_term->body = $request->body;
        $usage_term->save();

        return redirect()->back()->with('alert', 'تم إضافة البند بنجاح');
    }

    public function delete_security_policy($id){
        Securitypolicy::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف البند بنجاح');
    }


    public function system_accounts(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $system_accounts = DB::table('accounts')->orderBy('created_at', 'desc')->paginate(5);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.system_accounts', compact('website_data', 'system_accounts', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_account(Request $request){
        $system_account = new Account();
        $system_account->account_no = $request->account_no;
        $system_account->iban_no = $request->iban_no;
        $system_account->account_owner = $request->account_owner;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/accounts', $filename);
            $system_account->logo = $filename;
        }
        $system_account->save();
        return redirect()->back()->with('alert', 'تم إضافة الحساب بنجاح');
    }

    public function delete_account($id){
        Account::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الحساب بنجاح');
    }


    protected function certified_banks(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $banks = DB::table('banks')->orderBy('created_at', 'desc')->paginate(5);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.certified_banks', compact('website_data', 'banks', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_bank(Request $request){
        $bank = new Bank();
        $bank->name = $request->name;
        $bank->save();
        return redirect()->back()->with('alert', 'تم إضافة البنك بنجاح');
    }

    public function delete_bank($id){
        Bank::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف البنك بنجاح');
    }


    public function license_requests(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')
            ->where('read_status', 'unread')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        $users = User::all();
        $license_requests = License::all();
        foreach ($license_requests as $license_request){
            if($license_request->status == 'unread'){
                $license_request->status = 'read';
                $license_request->save();
            }
        }
        $documentation_requests = License::where('status', 'unread')->get();
        $license_requests = License::where('status', 'read')->get();
        $all_licenses = DB::table('licenses')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.arabic.license_requests', compact('website_data', 'users', 'license_requests', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'all_licenses', 'contact_us_messages'));
    }

    public function document_user($id){
        $license_request = License::find($id);
        $license_request->status = 'documented';
        $license_request->save();

        $user = User::where('id', $license_request->user_id)->first();
        $user->documentation_status = 1;
        $user->save();

        $documentation_notification = new Notification();
        $documentation_notification->body = 'مبروك تم توثيق حسابك بنجاح';
        $documentation_notification->user_id = $user->id;
        $documentation_notification->save();

        return redirect()->back()->with('alert', 'تم توثيق حساب المستخدم بنجاح');
    }

    public function reject_license(Request $request){
        $license_request = License::where('user_id', $request->id)->first();
//        return $license_request;
        $license_request->status = 'rejected';
        $license_request->save();

        $user = User::where('id', $request->id)->first();

        $documentation_rejection_notification = new Notification();
        $documentation_rejection_notification->body = $request->body;
        $documentation_rejection_notification->user_id = $user->id;
        $documentation_rejection_notification->save();

        return redirect()->back()->with('alert', 'تم اعلام المستخدم');
    }

    public function cancel_documentation($id){
        $license = License::find($id);
        $license->status = 'canceled';
        $license->save();

        $user = User::where('id', $license->user_id)->first();
        $user->documentation_status = 0;
        $user->save();

        return redirect()->back()->with('alert', 'تم الغاء توثيق المستخدم بنجاح');
    }


    public function reports_requests(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $users = User::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        foreach ($reports_requests as $reports_request) {
            if($reports_request->status == 'unread'){
                $reports_request->status = 'read';
                $reports_request->save();
            }
        }
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $previous_reports = DB::table('reports')->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.arabic.reports_requests', compact('website_data', 'users', 'previous_reports', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function reports_price(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $report_price = Reportprice::find(1);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.report_price', compact('website_data', 'report_price', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_report_price(Request $request){
        $price = new Reportprice();
        $price->price = $request->price;
        $price->save();
        return redirect()->back()->with('alert', 'تم تحديد قيمة الرسوم بنجاح');
    }

    public function update_report_price(Request $request){
        $price = Reportprice::find(1);
        $price->price = $request->price;
        $price->save();
        return redirect()->back()->with('alert', 'تم تعديل قيمة الرسوم بنجاح');
    }

    public function report_template(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $report_template = Reoprttemplate::find(1);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.report_template', compact('website_data', 'report_template', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_report_template(Request $request){
        $report_template = new Reoprttemplate();
        if($request->hasFile('name')){
            $file = $request->file('name');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('files/reports', $filename);
            $report_template->name = $filename;
            $report_template->save();
        }

        return redirect()->back()->with('alert', 'تم رفع ملف النموذج بنجاح');
    }

    public function update_report_template(Request $request){
        $report_template = Reoprttemplate::find(1);
        if($request->hasFile('name')){
            $file = $request->file('name');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('files/reports', $filename);
            $report_template->name = $filename;
            $report_template->save();
        }

        return redirect()->back()->with('alert', 'تم تعديل ملف النموذج بنجاح');
    }

    public function previous_reports(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $users = User::all();
        $previous_reports = DB::table('reports')->orderBy('created_at', 'desc')->paginate(10);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.previous_reports', compact('website_data', 'users', 'previous_reports', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function deliver_report(Request $request, $id){
        $report = Report::find($id);
        $report->status = 'delivered';

        if($request->hasFile('report_file_name')){
            $file = $request->file('report_file_name');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('files/reports', $filename);
            $report->report_file_name = $filename;
        }

        $report->save();

        $report_delivery_notification = new Notification();
		if($report->ads_no == null)
			$report_delivery_notification->body = 'تم تجهيز التقرير لاعلان برقم'.' '.'غير محدد'.' '.'يرجى مراجعة صفحة التقارير السابقة للعرض';
		else
			$report_delivery_notification->body = 'تم تجهيز التقرير للاعلان رقم'.' '.$report->ads_no.' '.'يرجى مراجعة صفحة التقارير السابقة للعرض';
		endif
        $report_delivery_notification->user_id = $report->user_id;
        $report_delivery_notification->save();

        return redirect()->back()->with('alert', 'تم تسليم التقرير بنجاح');
    }

    public function view_report($id){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $report = Report::find($id);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.view_report', compact( 'website_data', 'report', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }


    public function installed_ads_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $ads_terms = Adsinstallationterm::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.installed_ads_terms', compact('website_data', 'ads_terms', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_ads_installation_term(Request $request){
        $term = new Adsinstallationterm();
        $term->body = $request->body;
        $term->save();
        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_installed_ads_term($id){
        Adsinstallationterm::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }


    public function rank_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $rank_terms = Rankterm::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.rank_terms', compact('website_data', 'rank_terms', 'no_of_user_messages', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_rank_term(Request $request){
        $term = new Rankterm();
        $term->body = $request->body;
        $term->save();
        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_rank_term($id){
        Rankterm::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }


    public function service_membership_price(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $service_membership_price = Frequentserviceprice::find(1);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.service_membership_price', compact('website_data', 'service_membership_price', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_service_membership_price(Request $request){
        $price = new Frequentserviceprice();
        $price->price = $request->price;
        $price->save();
        return redirect()->back()->with('alert', 'تم تحديد قيمة الرسوم بنجاح');
    }

    public function update_service_membership_price(Request $request){
        $price = Frequentserviceprice::find(1);
        $price->price = $request->price;
        $price->save();
        return redirect()->back()->with('alert', 'تم تعديل قيمة الرسوم بنجاح');
    }


    public function service_membership_types(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $service_membership_types = Frequentservicetype::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.service_membership_types', compact('website_data', 'service_membership_types', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_service_membership_type(Request $request){
        $type = new Frequentservicetype();
        $type->type = $request->type;
        $type->save();
        return redirect()->back()->with('alert', 'تم إضافة النوع بنجاح');
    }

    public function delete_service_membership_type($id){
        Frequentservicetype::find($id)->delete();
        return redirect()->back()->with('alert', 'تم حذف النوع بنجاح');
    }


    public function service_membership_features(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $service_membership_features = Frequentservicefeature::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.service_membership_features', compact('website_data', 'service_membership_features', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_service_membership_feature(Request $request){
        $type = new Frequentservicefeature();
        $type->feature = $request->feature;
        $type->save();
        return redirect()->back()->with('alert', 'تم إضافة الميزة بنجاح');
    }

    public function delete_service_membership_feature($id){
        Frequentservicefeature::find($id)->delete();
        return redirect()->back()->with('alert', 'تم حذف الميزة بنجاح');
    }


    public function service_membership_terms(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $service_membership_terms = Frequentserviceterm::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.service_membership_terms', compact('website_data', 'service_membership_terms', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_service_membership_term(Request $request){
        $type = new Frequentserviceterm();
        $type->term = $request->term;
        $type->save();
        return redirect()->back()->with('alert', 'تم إضافة الشرط بنجاح');
    }

    public function delete_service_membership_term($id){
        Frequentserviceterm::find($id)->delete();
        return redirect()->back()->with('alert', 'تم حذف الشرط بنجاح');
    }


    public function service_membership_policy(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $service_membership_policy = Frequentservicepolicy::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.service_membership_policy', compact('website_data', 'service_membership_policy', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_service_membership_one_policy(Request $request){
        $type = new Frequentservicepolicy();
        $type->policy = $request->policy;
        $type->save();
        return redirect()->back()->with('alert', 'تم إضافة البند بنجاح');
    }

    public function delete_service_membership_one_policy($id){
        Frequentservicepolicy::find($id)->delete();
        return redirect()->back()->with('alert', 'تم حذف البند بنجاح');
    }


    public function service_membership_faqs(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $service_membership_faqs = Frequentservicefaq::take(6)->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.service_membership_faqs', compact('website_data', 'service_membership_faqs', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_service_membership_faq(Request $request){
        $faq = new Frequentservicefaq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->back()->with('alert', 'تم إضافة السؤال بنجاح');
    }

    public function delete_service_membership_faq($id){
        Frequentservicefaq::find($id)->delete();
        return redirect()->back()->with('alert', 'تم حذف السؤال بنجاح');
    }


    public function not_allowed_goods(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $not_allowed_goods = Notallowed::where('type', 'goods')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.not_allowed_goods', compact('website_data', 'not_allowed_goods', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_not_allowed_good(Request $request){
        $not_allowed_good = new Notallowed();
        $not_allowed_good->description = $request->description;
        $not_allowed_good->type = 'goods';
        $not_allowed_good->save();

        return redirect()->back()->with('alert', 'تم إضافة بند جديد للسلع الممنوعة');
    }


    public function not_allowed_ads(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $not_allowed_ads = Notallowed::where('type', 'ads')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.not_allowed_ads', compact('website_data', 'not_allowed_ads', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_not_allowed_ad(Request $request){
        $not_allowed_ad = new Notallowed();
        $not_allowed_ad->description = $request->description;
        $not_allowed_ad->type = 'ads';
        $not_allowed_ad->save();

        return redirect()->back()->with('alert', 'تم إضافة بند جديد للاعلانات الممنوعة');
    }


    public function not_allowed_replies(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $not_allowed_replies = Notallowed::where('type', 'replies')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.not_allowed_replies', compact('website_data', 'not_allowed_replies', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_not_allowed_reply(Request $request){
        $not_allowed_reply = new Notallowed();
        $not_allowed_reply->description = $request->description;
        $not_allowed_reply->type = 'replies';
        $not_allowed_reply->save();

        return redirect()->back()->with('alert', 'تم إضافة بند جديد للردود الممنوعة');
    }


    public function not_allowed_messages(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $not_allowed_messages = Notallowed::where('type', 'messages')->get();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.not_allowed_messages', compact('website_data', 'not_allowed_messages', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_not_allowed_message(Request $request){
        $not_allowed_message = new Notallowed();
        $not_allowed_message->description = $request->description;
        $not_allowed_message->type = 'messages';
        $not_allowed_message->save();

        return redirect()->back()->with('alert', 'تم إضافة بند جديد للرسائل الممنوعة');
    }


    public function delete_not_allowed($id){
        Notallowed::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف البند بنجاح');
    }


    public function avoid_scams(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $avoid_scams = Avoidscam::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.avoid_scams', compact('website_data', 'avoid_scams', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_avoid_scam(Request $request){
        $avoid_scam = new Avoidscam();
        $avoid_scam->description = $request->description;
        $avoid_scam->save();

        return redirect()->back()->with('alert', 'تم اضافة تحذير جديد لتجنب الاحتيال');
    }

    public function delete_avoid_scam($id){
        Avoidscam::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف التحذير بنجاح');
    }


    public function know_the_frauds(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $frauds = Fraud::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.know_the_frauds', compact('website_data', 'frauds', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_know_the_fraud(Request $request){
        $fraud = new Fraud();
        $fraud->description = $request->description;
        $fraud->save();

        return redirect()->back()->with('alert', 'تم اضافة اسلوب جديد للتعرف على المحتال');
    }

    public function delete_know_the_fraud($id){
        Fraud::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الاسلوب بنجاح');
    }


    public function personal_safety(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $personal_safety = Safety::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.personal_safety', compact('website_data', 'personal_safety', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function store_one_personal_safety(Request $request){
        $personal_safety = new Safety();
        $personal_safety->description = $request->description;
        $personal_safety->save();

        return redirect()->back()->with('alert', 'تم اضافة اسلوب جديد للحماية من الاحتيال');
    }

    public function delete_one_personal_safety($id){
        Safety::find($id)->delete();

        return redirect()->back()->with('alert', 'تم حذف الاسلوب بنجاح');
    }


    public function black_list_users(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $users = User::where('reports', '<', 10)->get();
        $black_list_users = Blacklist::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.black_list_users', compact('website_data', 'users', 'black_list_users', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));

    }

    public function store_black_list_user(Request $request){
        $user = User::find($request->user_id);
        $black_list_user = Blacklist::where('user_id', $user->id)->first();
        if($black_list_user == null){
            $new_black_list_user = new Blacklist();
            $new_black_list_user->name = $user->name;
            $new_black_list_user->username = $user->username;
            $new_black_list_user->phone = $user->phone;
            $new_black_list_user->email = $user->email;
            $new_black_list_user->country = $user->country;
            $new_black_list_user->profile_photo = $user->profile_photo;
            $new_black_list_user->cover_photo = $user->cover_photo;
            $new_black_list_user->password = $user->password;
            $new_black_list_user->followers = $user->followers;
            $new_black_list_user->following = $user->following;
            $new_black_list_user->favourite = $user->favourite;
            $new_black_list_user->no_of_likes = $user->no_of_likes;
            $new_black_list_user->no_of_dislikes = $user->no_of_dislikes;
            $new_black_list_user->reports = $user->reports;
            $new_black_list_user->active_status = $user->active_status;
            $new_black_list_user->documentation_status = $user->documentation_status;
            $new_black_list_user->user_id = $user->id;
            $new_black_list_user->save();

            return redirect()->back()->with('alert', 'تم اضافة المستخدم للقائمة السوداء');
        }
        else
            return redirect()->back()->with('alert', 'المستخدم موجود بالفعل في القائمة السوداء');
    }

    public function delete_black_list_user($id){
        $black_list_user = Blacklist::find($id);
        $user = User::find($black_list_user->user_id);
        $user->reports = 0;
        $user->save();
        $black_list_user->delete();

        return redirect()->back()->with('alert', 'تم حذف المستخدم من القائمة السوداء');
    }


    public function create_admin_user_chat(Request $request, $admin_id, $user_id){
        $chat = Adminuserchat::where('admin_id', $admin_id)->where('user_id', $user_id)->first();

        if($chat == null){
            $new_chat = new Adminuserchat();
            $new_chat->admin_id = $admin_id;
            $new_chat->user_id = $user_id;
            $new_chat->save();

            $message = new Adminusermessage();
            $message->body = $request->body;
            $message->sender_id = $admin_id;
            $message->sender_type = 'admin';
            $message->receiver_id = $user_id;
            $message->receiver_type = 'user';
            $message->chat_room = $new_chat->id;
            $message->save();
        }
        else{
            $message = new Adminusermessage();
            $message->body = $request->body;
            $message->sender_id = $admin_id;
            $message->sender_type = 'admin';
            $message->receiver_id = $user_id;
            $message->receiver_type = 'user';
            $message->chat_room = $chat->id;
            $message->save();
        }
        return redirect()->back()->with('alert', 'تم ارسال الرسالة');
    }


    public function admin_profile($id){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $admin = Admin::find($id);
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.admin_profile', compact('admin', 'website_data', 'no_of_user_messages',
            'commission_requests', 'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function update_admin(Request $request, $id){
        $admin = Admin::find($id);
        if($request->name != null)
            $admin->name = $request->name;
        if($request->email != null)
            $admin->email = $request->email;
        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/profiles', $filename);
            $admin->profile_photo = $filename;
        }
        if($request->password == $request->password_1){
            $admin->password = bcrypt($request->password);
            $admin->save();
            return redirect()->back()->with('alert', 'تم تعديل الملف الشخصي بنجاح');
        }
        else
            return redirect()->back()->with('alert', 'كلمة السر غير متطابقة');
    }


    public function website_data(){
        $website_data = Setting::find(1);
        $no_of_user_messages = Adminusermessage::where('receiver_id', Auth::guard('admin')->user()->id)->where('receiver_type', 'admin')->where('read_status', 'unread')->get();
        $personal_safety = Safety::all();
        $commission_requests = Commission::where('status', 'unread')->orderBy('id', 'desc')->get();
        $subscription_requests = Subscription::where('status', 'unread')->orderBy('id', 'desc')->get();
        $reports_requests = Report::where('status', 'unread')->orderBy('id', 'desc')->get();
        $documentation_requests = License::where('status', 'unread')->get();
        $contact_us_messages = Contact::where('status', 'unread')->get();

        return view('admin.arabic.website_data', compact('website_data', 'no_of_user_messages', 'personal_safety', 'commission_requests',
            'subscription_requests', 'reports_requests', 'documentation_requests', 'contact_us_messages'));
    }

    public function update_website_data(Request $request){
        $website_data = Setting::find(1);
        $website_data->arabic_name = $request->arabic_name;
        $website_data->english_name = $request->english_name;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/logos', $filename);
            $website_data->logo = $filename;
        }
        $website_data->save();

        return redirect()->back()->with('alert', 'تم تحديث بيانات الموقع بنجاح');

    }
}