<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Adminuserchat;
use App\Adminusermessage;
use App\Chat;
use App\Evaluation;
use App\Following;
use App\Image;
use App\Message;
use App\Notification;
use App\Post;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit_profile(){
        $auth_user = explode(' ', Auth::user()->name);
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $user = Auth::user();

        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.edit_profile', compact('user', 'website_data', 'no_of_notifications', 'no_of_messages', 'no_of_admin_messages', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.edit_profile', compact('user', 'website_data', 'no_of_notifications', 'no_of_messages', 'no_of_admin_messages', 'auth_user'));
        }
    }

    public function update_profile(Request $request, $id){
//        return $request;
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/profiles', $filename);
            $user->profile_photo = $filename;
        }
        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/covers', $filename);
            $user->cover_photo = $filename;
        }
        $user->country = $request->country;
        if($request->password == $request->password_1)
            $user->password = bcrypt($request->password);
        else
            return redirect()->back()->with('alert', 'كلمة السر غير متطابقة');
        $user->save();

        $website_data = Setting::find(1);
        if(Auth::user()->language == 0)
            return redirect()->back()->with('alert', 'تمت تحديث ملفك الشخصي بنجاح');
        else
            return redirect()->back()->with('alert', 'Your profile has been updated successfully');
    }

    public function evaluate($id){
        $auth_user = explode(' ', Auth::user()->name);
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $user = User::where('id', $id)->where('active_status', 'active')->first();

        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.evaluation_form', compact('user', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.evaluation_form', compact('user', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
    }

    public function submit_evaluation(Request $request, $id){
        $new_evaluation = new Evaluation();
        $new_evaluation->description = $request->description;
        $new_evaluation->recommendations = $request->recommendations;
        $new_evaluation->completed = $request->completed;
        $new_evaluation->evaluator_id = Auth::user()->id;
        $new_evaluation->user_id = $id;
        $new_evaluation->save();

        $user = User::where('id', $id)->where('active_status', 'active')->first();
        if($request->recommendations == 1){
            $user->no_of_likes++;
            $user->save();
        }
        if($request->recommendations == 0){
            $user->no_of_dislikes++;
            $user->save();
        }

        $website_data = Setting::find(1);
        if(Auth::user()->language == 0)
            return redirect('/user/profile/'.$id)->with('alert', 'تمت إضافة تقييمك');
        else
            return redirect('/user/profile/'.$id)->with('alert', 'Your Evaluation has been added');
    }

    public function evaluations($id){
        $auth_user = explode(' ', Auth::user()->name);
        $evaluations = Evaluation::where('user_id', $id)->get();
        $users = User::where('active_status', 'active')->get();
        $user = User::where('id', $id)->where('active_status', 'active')->first();

        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.evaluations', compact('evaluations', 'users', 'user', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.evaluations', compact('evaluations', 'users', 'user', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
    }

    public function following(){
        $auth_user = explode(' ', Auth::user()->name);
        $user_followings = DB::table('followings')->where('user_id', Auth::user()->id)->paginate(10);

        $users = User::where('active_status', 'active')->get();
        $website_data = Setting::find(1);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.following', compact('user_followings', 'users', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.following', compact('user_followings', 'users', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
    }

    public function view_notifications(){
        $auth_user = explode(' ', Auth::user()->name);
        $notifications = Notification::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
//        return $notifications;
        foreach ($notifications as $notification) {
            $notification->read_status = 'read';
            $notification->save();
        }
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(7);
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $website_data = Setting::find(1);
        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.view_notifications', compact('notifications', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.view_notifications', compact('notifications', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
    }

    public function create_chat(Request $request, $starter_id, $owner_id){
        $chat = Chat::where('starter_id', $starter_id)->where('owner_id', $owner_id)->first();

        if($chat == null){
            $new_chat = new Chat();
            $new_chat->starter_id = $starter_id;
            $new_chat->owner_id = $owner_id;
            $new_chat->save();

            $message = new Message();
            $message->body = $request->body;
            $message->sender_id = $starter_id;
            $message->receiver_id = $owner_id;
            $message->chat_room = $new_chat->id;
            $message->save();
        }
        else{
            $message = new Message();
            $message->body = $request->body;
            $message->sender_id = $starter_id;
            $message->receiver_id = $owner_id;
            $message->chat_room = $chat->id;
            $message->save();
        }
        $website_data = Setting::find(1);
        if(Auth::user()->language == 0)
            return redirect()->back()->with('alert', 'تم إرسال الرسالة');
        else
            return redirect()->back()->with('alert', 'Your message has been sent');
    }

    public function all_messages(){
        $auth_user = explode(' ', Auth::user()->name);
        $messages = Message::orderBy('id', 'desc')->get();
        $admin_user_messages = Adminusermessage::orderBy('id', 'desc')->get();
        $admin_user_chats = Adminuserchat::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $admins = Admin::all();
        $chats = Chat::where('starter_id', Auth::user()->id)->orwhere('owner_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        $users = null;
        foreach ($chats as $chat){
            $user = User::where('id', $chat->starter_id)->orwhere('id', $chat->owner_id)->get();
            $users = $users.''.$user;
        }
//        return  $users;
        $users = User::all();
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $website_data = Setting::find(1);

        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.all_messages', compact('users', 'messages', 'chats', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'admin_user_chats', 'admin_user_messages', 'admins', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.all_messages', compact('users','messages', 'chats', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'admin_user_chats', 'admin_user_messages', 'admins', 'auth_user'));
        }
    }

    public function one_chat($chat_room_id){
        $auth_user = explode(' ', Auth::user()->name);
        $messages = Message::where('chat_room', $chat_room_id)->get();
        foreach ($messages as $message){
            if($message->receiver_id == Auth::user()->id){
                $message->read_status = 'read';
                $message->save();
            }
        }
        $chat = Chat::find($chat_room_id);
        $chat_owner = User::where('id', $chat->starter_id)->where('active_status', 'active')->first();
        $post_owner = User::where('id', $chat->owner_id)->where('active_status', 'active')->first();
        $users = User::where('active_status', 'active')->get();
        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $website_data = Setting::find(1);
        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.one_chat', compact('users', 'messages', 'chat_owner', 'post_owner', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.one_chat', compact('users','messages', 'chat_owner', 'post_owner', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
    }

    public function admin_user_one_chat($admin_user_chat_id){
        $auth_user = explode(' ', Auth::user()->name);
        $messages = Adminusermessage::where('chat_room', $admin_user_chat_id)->get();
        foreach ($messages as $message){
            if($message->receiver_id == Auth::user()->id && $message->receiver_type == 'user'){
                $message->read_status = 'read';
                $message->save();
            }
        }
        $chat = Adminuserchat::find($admin_user_chat_id);
        $chat_admin = Admin::where('id', $chat->admin_id)->first();
        $chat_user = User::where('id', $chat->user_id)->first();
        $users = User::where('active_status', 'active')->get();

        $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
        $no_of_admin_messages = Adminusermessage::where('receiver_id', Auth::user()->id)->where('receiver_type', 'user')->where('read_status', 'unread')->get();
        $website_data = Setting::find(1);
        if(Auth::user()->language == 0) {
            Date::setLocale('ar');
            return view('user.arabic.admin_user_chat', compact('users','messages', 'chat_admin', 'chat_user', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
        else{
            Date::setLocale('en');
            return view('user.english.admin_user_chat', compact('users','messages', 'chat_admin', 'chat_user', 'no_of_notifications', 'no_of_messages', 'website_data', 'no_of_admin_messages', 'auth_user'));
        }
    }

    public function new_message_reply(Request $request ,$chat_room_id, $sender_id){
        $chat_room = Chat::where('id', $chat_room_id)->first();
        $chat_room->updated_at = Date::now();
        $chat_room->save();
        $message = new Message();
        $message->body = $request->body;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $sender_id;
        $message->chat_room = $chat_room_id;
        $message->save();
        return redirect()->back();
    }

    public function new_admin_user_message_reply(Request $request ,$chat_room_id, $chat_user_id, $chat_admin_id){
        $chat_room = Adminuserchat::where('id', $chat_room_id)->first();
        $chat_room->updated_at = Date::now();
        $chat_room->save();
        $message = new Adminusermessage();
        $message->body = $request->body;
        $message->sender_id = $chat_user_id;
        $message->sender_type = 'user';
        $message->receiver_id = $chat_admin_id;
        $message->receiver_type = 'admin';
        $message->chat_room = $chat_room_id;
        $message->save();
        return redirect()->back();
    }
}
