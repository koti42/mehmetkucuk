<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Blogs;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;



class DefaultController extends Controller
{
    public function index()
    {

        $data['blog']=Blogs::all()->sortby('blog_must');
        $data['slider']=Sliders::all()->sortby('slider_must');
        return view('Frontend.default.index',compact('data'));
    }

    public function contact()
    {
        return view('Frontend.default.contact');
    }

    public function SendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];



        Mail::to('mehmet3387@gmail.com')->send(new SendMail($data));
        return back()->with('success',"Mesajınız Başarıyla Bize Ulaşmıştır. Teşekkür Ederiz.");
    }
}
