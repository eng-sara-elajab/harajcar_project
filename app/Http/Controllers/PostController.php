<?php

namespace App\Http\Controllers;

use App\Adminusermessage;
use App\Blacklist;
use App\Comment;
use App\Country;
use App\Favourite;
use App\Follower;
use App\Following;
use App\Image;
use App\Message;
use App\Notification;
use App\Post;
use App\Region;
use App\Reply;
use App\Reportelement;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::where('active_status', 'active')->get();
        $posts = DB::table('posts')->paginate(4);
        $images = Image::all();
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        if(Auth::user()){
            if(Auth::user()->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages'));
            }
        }
        else{
            if($website_data->language == 0) {
                Date::setLocale('ar');
                return view('user.arabic.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages'));
            }
            else{
                Date::setLocale('en');
                return view('user.english.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages'));
            }
        }
    }

    public function search_goods(Request $request){
        $users = User::where('active_status', 'active')->get();
        $images = Image::all();
        $website_data = Setting::find(1);
        $q = $request->q;
        if ($q != ''){
            $posts = DB::table('posts')->where('title','LIKE', '%' . $q . '%')
//                ->orWhere("address","LIKE", "%" . $q . "%")
                ->paginate(4);

            if(Auth::user()){
				$auth_user = explode(' ', Auth::user()->name);
                $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
                $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
                $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
                if(Auth::user()->language == 0){
                    Date::setLocale('ar');
                    if(count($posts) > 0)
                        return view('user.arabic.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'q', 'auth_user'));
                    else
                        return view('user.arabic.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'q', 'auth_user'));
                }
                else{
                    Date::setLocale('en');
                    if(count($posts) > 0)
                        return view('user.english.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'q', 'auth_user'));
                    else
                        return view('user.english.home', compact('users','posts', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'q', 'auth_user'));
                }
            }
            else
                return view('auth.arabic.login', compact( 'website_data'));
        }
    }

    public function region_posts($region){
        $auth_user = explode(' ', Auth::user()->name);
        $users = User::where('active_status', 'active')->get();
        $selected_region = Region::where('english_name', $region)->first();
        $posts = DB::table('posts')->where('region', $selected_region->english_name)->orWhere('region', $selected_region->arabic_name)->paginate(4);
        $images = Image::all();
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $regions = Region::all();
        $countries = Country::all();
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

    public function create(){
        $auth_user = explode(' ', Auth::user()->name);
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $regions = Region::all();
        if(Auth::user()->language == 0)
            return view('user.arabic.new_ads', compact('no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user', 'regions'));
        else
            return view('user.english.new_ads', compact('no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user', 'regions'));
    }

    public function store(Request $request){
        if(Auth::user()->active_status == 'deactive'){
            if(Auth::user()->language == 0)
                return redirect('/')->with('alert', 'الحساب معطل! يرجى التواصل مع الإدارة');
            else
                return redirect('/')->with('alert', 'Your account has been deactivated. Please contact us');
        }
        $post = new Post;

        $post->type = $request->type;
        $post->title = $request->title;
        $post->status = $request->status;
        $post->phone = $request->phone;
        $post->price = $request->price;
        $post->body = $request->body;
        $post->region = $request->region;
        $post->user_id = Auth::user()->id;
        $post->ads_no = random_int(100, 100000);
        $post->save();

        if($request->hasfile('filenames'))
        {
            $i=0;
            $data = [];
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$i.'.'.$file->extension();
                $file->move(public_path().'/images/posts/', $name);
                $i++;
                $data[$i] = $name;

                $image= new Image();
                $image->name = $data[$i];
                $image->post_id = $post->id;
                $image->save();
            }
            $website_data = Setting::find(1);
            if(Auth::user()->language == 0)
                return redirect('/')->with('alert', 'تمت إضافة إعلانك');
            else
                return redirect('/')->with('alert', 'Your Post has been added');
        }
    }

    public function one_product($id){
        $post = Post::find($id);
        $posts = Post::where('type', $post->type)->get();
        $all_images = Image::all();
        $user = User::where('id', $post->user_id)->where('active_status', 'active')->first();
        $images = Image::where('post_id', $post->id)->get();
        $comments = Comment::all();
        $replies = Reply::all();
        $users = User::where('active_status', 'active')->get();
        $favourite = Favourite::where('user_id', Auth::user()->id)->where('favourite_id', $post->id)->get();
//        return $favourite;
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        if($website_data->language == 0) {
            Date::setLocale('ar');
//            $created_at = Date::parse($post->created_at)->diffForHumans();
            return view('user.arabic.one_product', compact('user', 'post', 'posts', 'all_images', 'images', 'comments', 'users', 'replies', 'favourite', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages'));
        }
        else
            Date::setLocale('en');
            return view('user.english.one_product', compact('user', 'post', 'posts', 'all_images', 'images', 'comments', 'users', 'replies', 'favourite', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages'));
    }

    public function new_comment(Request $request, $id){
        if(Auth::user()->active_status == 'deactive'){
            if(Auth::user()->language == 0)
                return redirect()->back()->with('alert', 'الحساب معطل! يرجى التواصل مع الإدارة');
            else
                return redirect()->back()->with('alert', 'Your account has been deactivated. Please contact us');
        }
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        $post = Post::find($id);

        $user = User::where('id', $post->user_id)->first();

        if($comment->user_id != $post->user_id){
            if($user->language == 0){
                $notification = new Notification();
                $notification->body = 'لديك تعليق جديد '.' '.Auth::user()->name;
                $notification->user_id = $user->id;
                $notification->notifier_id = Auth::user()->id;
                $notification->notification_content_id = $post->id;
                $notification->save();
            }
            else{
                $notification = new Notification();
                $notification->body = 'You have new comment '.Auth::user()->name;
                $notification->user_id = $user->id;
                $notification->notifier_id = Auth::user()->id;
                $notification->notification_content_id = $post->id;
                $notification->save();
            }
        }

        $favourites = Favourite::where('favourite_id', $post->id)->get();
        if(count($favourites) > 0) {
            foreach ($favourites as $favourite) {
                if($user->language == 0){
                    $notification = new Notification();
                    $notification->body = 'لديك تعليق من اعلان في المفضلة ';
                    $notification->user_id = $favourite->user_id;
                    $notification->notifier_id = Auth::user()->id;
                    $notification->notification_content_id = $post->id;
                    $notification->save();
                }
                else{
                    $notification = new Notification();
                    $notification->body = 'You have comment from favourite post ';
                    $notification->user_id = $favourite->user_id;
                    $notification->notifier_id = Auth::user()->id;
                    $notification->notification_content_id = $post->id;
                    $notification->save();
                }
            }
        }
        $website_data = Setting::find(1);
        if(Auth::user()->language == 0)
            return redirect()->back()->with('alert', 'تمت إضافة تعليقك');
        else
            return redirect()->back()->with('alert', 'Your Comment has been added');

    }

    public function new_reply(Request $request, $post_id, $comment_id){
        if(Auth::user()->active_status == 'deactive'){
            if(Auth::user()->language == 0)
                return redirect()->back()->with('alert', 'الحساب معطل! يرجى التواصل مع الإدارة');
            else
                return redirect()->back()->with('alert', 'Your account has been deactivated. Please contact us');
        }
//        $last_reply = Reply::where('comment_id', $id)->latest()->first();
        $reply = new Reply();
        $reply->body = $request->body;
        $reply->comment_id = $comment_id;
        $reply->user_id = Auth::user()->id;
        $reply->save();

        $comment = Comment::find($comment_id);
        $post = Post::find($post_id);

        $comment_owner = User::where('id', $comment->user_id)->first();
        $post_owner = User::where('id', $post->user_id)->first();

        if($post_owner->language == 0){
            if($reply->user_id != $comment_owner->id){
                $notification = new Notification();
                $notification->body = 'لديك رد جديد';
                $notification->user_id = $comment_owner->id;
                $notification->notifier_id = $reply->user_id;
                $notification->notification_content_id = $post->id;
                $notification->save();
            }

            if($post_owner->id != $comment_owner->id){
                if($post_owner->id != $reply->user_id){
                    $notification = new Notification();
                    $notification->body = 'لديك رد جديد';
                    $notification->user_id = $post_owner->id;
                    $notification->notifier_id = $reply->user_id;
                    $notification->notification_content_id = $post->id;
                    $notification->save();
                }
            }
        }
        else{
            if($reply->user_id != $comment_owner->id) {
                $notification = new Notification();
                $notification->body = 'You have new reply';
                $notification->user_id = $comment_owner->id;
                $notification->notifier_id = $reply->user_id;
                $notification->notification_content_id = $post->id;
                $notification->save();
            }

            if($post_owner->id != $comment_owner->id) {
                if($post_owner->id != $reply->user_id) {
                    $notification = new Notification();
                    $notification->body = 'You have new reply';
                    $notification->user_id = $post_owner->id;
                    $notification->notifier_id = $reply->user_id;
                    $notification->notification_content_id = $post->id;
                    $notification->save();
                }
            }
        }
//        $replies = Reply::where('comment_id', $id)->get();
//        if(count($replies)>0){
//            foreach ($replies as $reply){
//                if($user->language == 0){
//                    $notification = new Notification();
//                    $notification->body = 'لديك رد جديد';
//                    $notification->user_id = $user->id;
//                    $notification->notifier_id = $post->id;
//                    $notification->save();
//                }
//                else{
//                    $notification = new Notification();
//                    $notification->body = 'You have new reply';
//                    $notification->user_id = $user->id;
//                    $notification->notifier_id = $post->id;
//                    $notification->save();
//                }
//            }
//        }
//        $comment_first_reply = Reply::where('comment_id', $reply->comment_id)->first();
//        if($comment_first_reply->id == $reply->id){
//            if($user->language == 0){
//                $notification = new Notification();
//                $notification->body = 'لديك رد جديد';
//                $notification->user_id = $user->id;
//                $notification->notifier_id = $post->id;
//                $notification->save();
//            }
//            else{
//                $notification = new Notification();
//                $notification->body = 'You have new reply';
//                $notification->user_id = $user->id;
//                $notification->notifier_id = $post->id;
//                $notification->save();
//            }
//        }
//        else{
//            if($user->language == 0){
//                $notification = new Notification();
//                $notification->body = 'لديك رد جديد';
//                $notification->user_id = $user->id;
//                $notification->notifier_id = $post->id;
//                $notification->save();
//            }
//            else{
//                $notification = new Notification();
//                $notification->body = 'You have new reply';
//                $notification->user_id = $user->id;
//                $notification->notifier_id = $post->id;
//                $notification->save();
//            }
//        }
        $website_data = Setting::find(1);
        if(Auth::user()->language == 0)
            return redirect()->back()->with('alert', 'تمت إضافة ردك');
        else
            return redirect()->back()->with('alert', 'Your Reply has been added');
    }

    public function profile($id){
        $auth_user = explode(' ', Auth::user()->name);
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $user = User::where('id', $id)->where('active_status', 'active')->first();
        $array = $user->followers;
//        $posts = Post::where('user_id', $user->id)->get();
        $posts = DB::table('posts')->where('user_id', $user->id)->paginate(4);
        $images = Image::all();
        $users = User::where('active_status', 'active')->get();
        $likes = $user->no_of_likes;
        $dislikes = $user->no_of_dislikes;
        if($likes+$dislikes !== 0)
            $r = $likes/($likes+$dislikes)*100;
        else
            $r = 0;

        if(Auth::user()->language == 0){
            Date::setLocale('ar');
            return view('user.arabic.profile', compact('user', 'array', 'posts', 'images', 'users', 'no_of_notifications', 'no_of_messages', 'no_of_admin_messages', 'website_data', 'r', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.profile', compact('user', 'array', 'posts', 'images', 'users', 'no_of_notifications', 'no_of_messages', 'no_of_admin_messages', 'website_data', 'r', 'auth_user'));
        }
    }

    public function user_follow($id){
        $user = User::where('id', $id)->where('active_status', 'active')->first();

        $follower = new Follower();
        $follower->user_id = $user->id;
        $follower->follower_id = Auth::user()->id;
        $follower->save();

        $following = new Following();
        $following->user_id = Auth::user()->id;
        $following->following_id = $user->id;
        $following->save();

        if($user->language == 0){
            $notification = new Notification();
            $notification->body = 'لديك متابع جديد '.' '.Auth::user()->name;
            $notification->user_id = $user->id;
            $notification->notifier_id = Auth::user()->id;
            $notification->save();
        }
        else{
            $notification = new Notification();
            $notification->body = 'You have new follower '.Auth::user()->name;
            $notification->user_id = $user->id;
            $notification->notifier_id = Auth::user()->id;
            $notification->save();
        }

        $i = 1;
        for($i=1; $i>0; $i--){
            if($user->followers == null){
                $array[] = $user->followers;
                array_push($array, Auth::user()->id);
                $user->followers = $array;
            }
            else{
                $array = $user->followers;
                array_push($array, Auth::user()->id);
                $user->followers = $array;
            }
        }
        if(Auth::user()->following == null){
            $auth_array[] = Auth::user()->following;
            array_push($auth_array, $user->id);
            Auth::user()->following = $auth_array;
        }
        else{
            $auth_array = Auth::user()->following;
            $auth_array  = array_map('intval', str_split($auth_array));
//            for($c=0; $c<count($auth_array); $c++){
//                if($auth_array[$c] == 0)
//                    $auth_array[$c] = null;
//            }
            foreach (array_keys($auth_array, 0) as $key) {
                unset($auth_array[$key]);
            }
            array_push($auth_array, $user->id);
            $auth_array = array_values($auth_array);
            Auth::user()->following = $auth_array;
        }

        $user->save();
        Auth::user()->save();
        return redirect()->back()->with('user', $user);
    }

    public function user_unfollow($id){
        $user = User::where('id', $id)->where('active_status', 'active')->first();
        $array = $user->followers;
        if (($key = array_search(Auth::user()->id, $array)) !== false) {
            unset($array[$key]);
        }
        $user->followers = $array;
        $user->save();
        return redirect()->back();
    }

    public function add_to_favourite($id){
        $post = Post::find($id);
        $favourite = new Favourite();
        $favourite->favourite_id = $post->id;
        $favourite->user_id = Auth::user()->id;
        $favourite->save();
        $user = Auth::user();

        if($user->favourite == null){
            $user->favourite = $id;
        }
        else{
            $auth_array = $user->favourite;
            $auth_array  = array_map('intval', str_split($auth_array));
            for($c=0; $c<count($auth_array); $c++){
                if($auth_array[$c] == 0)
                    $auth_array[$c] = null;
            }
            foreach (array_keys($auth_array, 0) as $key) {
                unset($auth_array[$key]);
            }
            array_push($auth_array, $id);
            $auth_array = array_values($auth_array);
            $user->favourite = $auth_array;
        }
        $user->save();
        return redirect()->back();
    }

    public function remove_from_favourite($id){
        $post = Post::find($id);
        $favourite = Favourite::where('user_id', Auth::user()->id)->where('favourite_id', $post->id)->delete();
        return redirect()->back();
    }

    public function report($post_id, $user_id){
        $user = User::where('id', $user_id)->first();
        $user->reports++;
        $user->save();
        if($user->reports >= 50){
            $black_list_user = Blacklist::where('user_id', $user->id)->first();
            if($black_list_user != null){
                $black_list_user->reports = $user->reports;
                $black_list_user->save();
            }
            else{
                $black_list = new Blacklist();
                $black_list->name = $user->name;
                $black_list->username = $user->username;
                $black_list->phone = $user->phone;
                $black_list->email = $user->email;
                $black_list->country = $user->country;
                $black_list->profile_photo = $user->profile_photo;
                $black_list->cover_photo = $user->cover_photo;
                $black_list->password = $user->password;
                $black_list->followers = $user->followers;
                $black_list->following = $user->following;
                $black_list->favourite = $user->favourite;
                $black_list->no_of_likes = $user->no_of_likes;
                $black_list->no_of_dislikes = $user->no_of_dislikes;
                $black_list->reports = $user->reports;
                $black_list->active_status = $user->active_status;
                $black_list->documentation_status = $user->documentation_status;
                $black_list->user_id = $user->id;
                $black_list->save();
            }
        }
        $post = Post::find($post_id);
        $post->reports = 'reported';
        $post->save();

        $new_report = new Reportelement();
        $new_report->reporter_id = Auth::user()->id;
        $new_report->post_id = $post_id;
        $new_report->post_owner_id = $user_id;
        $new_report->save();

        if(Auth::user()->language == 0)
            return redirect()->back()->with('alert', 'تم رفع التقرير . شكراً لتعاونكم');
        else
            return redirect()->back()->with('alert', 'Your Report has been sent. Thank you');
    }

    public function favourite(){
        $auth_user = explode(' ', Auth::user()->name);
        $favourits = DB::table('favourites')->where('user_id', Auth::user()->id)->paginate(5);
        $posts = Post::all();
        $users = User::where('active_status', 'active')->get();
        $images = Image::all();
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();

        if(Auth::user()->language == 0){
            Date::setLocale('ar');
            return view('user.arabic.favourite', compact('favourits', 'posts','users', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.favourite', compact('favourits', 'posts','users', 'images', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
    }
}
