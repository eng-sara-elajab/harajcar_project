<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Country;
use App\Http\Controllers\Controller;
use App\Message;
use App\Notification;
use App\Providers\RouteServiceProvider;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showRegistrationForm(){
        $website_data = Setting::find(1);
        $countries = Country::all();

        if($website_data->language == 0)
            return view('auth.arabic.register', compact('website_data', 'countries'));
        else
            return view('auth.english.register', compact('website_data', 'countries'));
    }

    public function register(Request $request){
        $website_data = Setting::find(1);
        $users = User::all();
        foreach ($users as $user) {
            if($user->email == $request->email){
                if($website_data->language == 0)
                    return redirect()->back()->with('alert', 'البريد الالكتروني مسجل مسبقاً');
                else
                    return redirect()->back()->with('alert', 'Email Address exist!');
            }
        }
        foreach ($users as $user) {
            if ($user->phone == $request->phone) {
                if ($website_data->language == 0)
                    return redirect()->back()->with('alert', 'رقم الهاتف مسجل مسبقاً');
                else
                    return redirect()->back()->with('alert', 'Phone Number exist!');
            }
        }

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->country = $request->country;

        if($request->password == $request->password_1)
            $user->password = bcrypt($request->password);
        else{
            if($website_data->language ==  0)
                return redirect('/register')->with('website_data', $website_data)->withErrors('كلمات السر غير متطابقة');
            else
                return redirect('/register')->with('website_data', $website_data)->withErrors('Password confirmation does not match');
        }

        if($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/profiles', $filename);
            $user->profile_photo = $filename;
        }
        else{
            $user->profile_photo = '';
        }

        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/covers', $filename);
            $user->cover_photo = $filename;
        }
        else{
            $user->cover_photo = '';
        }

        $user->save();
        if($user->language == 0){
            $greeting_notification = new Notification();
            $greeting_notification->body = 'مرحباً بك في أكبر سوق لعرض وبيع السيارات وقطع الغيار';
            $greeting_notification->user_id = $user->id;
            $greeting_notification->save();
        }
        else{
            $greeting_notification = new Notification();
            $greeting_notification->body = 'Welcome to the greatest online car accessories platform';
            $greeting_notification->user_id = $user->id;
            $greeting_notification->save();
        }
        if(Auth::user()){
            $no_of_notifications = Notification::where('user_id', Auth::user()->id)->where('read_status', 'unread')->get();
            $no_of_messages = Message::where('receiver_id', Auth::user()->id)->where('read_status', 'unread')->get();
            if($website_data->language == 0)
                return view('auth.arabic.login', compact('no_of_notifications', 'no_of_messages', 'website_data'));
            else
                return view('auth.english.login', compact('no_of_notifications', 'no_of_messages', 'website_data'));
        }

        if($website_data->language == 0)
            return view('auth.arabic.login', compact('website_data'));
        else
            return view('auth.english.login', compact('website_data'));
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showAdminRegisterForm(){
        return view('auth.admin_register');
    }

    public function createAdmin(Request $request){
        $admins = Admin::all();
        $website_data = Setting::find(1);
        $admin = new Admin();
        $admin->name = $request->name;
        foreach ($admins as $admin){
            if($admin->email == $request->email){
                if($website_data->language == 0)
                    return redirect()->back()->with('alert', 'البريد الإلكتروني مسجل مسبقاً');
                else
                    return redirect()->back()->with('alert', 'Email Address exists');
            }
        }
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect('/login/admin');
    }
}
