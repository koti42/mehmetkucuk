<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Mail\SendMail2;
use App\Models\Blogs;
use App\Models\Sliders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DefaultController extends Controller
{
    public function index()
    {
        $data['blog']=Blogs::all()->sortby('blog_must');
        $data['slider']=Sliders::all()->sortby('slider_must');
        $data['user'] = User::all()->sortBy('user_must');
        return view('Backend.default.index',compact('data'));;
    }

    public function contact()
    {
        return view('Backend.default.index');
    }

    public function SendMail2(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'subject'=> 'required',
            'message' => 'required'
        ]);

        $data=[
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];



        Mail::to('mehmet3387@gmail.com')->send(new SendMail2($data));
        return back()->with('success',"Mesajınız Başarıyla Bize Ulaşmıştır. Teşekkür Ederiz.");
    }

    public function login()
    {
        return view('Backend.default.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'))->with('success','Güvenli Çıkış Yapıldı');
    }

    public function authenticate(Request $request)
    {
        $request->flash();

        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::attempt($credentials, $remember_me))//bu komut laravel tarafından otomatik oluşturuluyor ve şifre kontrolü yapıyor
        {
            return redirect()->intended(route('Backend.Admin'));
        } else {
            return back()->with('error', 'Sen Kimsin Ulan Ayı!!');
        }


    }


}
