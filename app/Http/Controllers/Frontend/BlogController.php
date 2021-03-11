<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
   public function index()
   {
       $data['blog']=Blogs::all()->sortby('blog_must');
       return view('Frontend.blog.index',compact('data'));
   }

   public function detail($slug)
   {

        $blog=DB::table('Blogs')->where('blog_slug',$slug)->value('blog_slug');
       if ($slug==$blog)
       {
           $blogList=Blogs::all()->sortBy('blog_must');
           $blog=Blogs::where('blog_slug',$slug)->first();
           return view('Frontend.blog.detail',compact('blog','blogList'));
       }
       else{
           abort(404);
       }

   }
}
