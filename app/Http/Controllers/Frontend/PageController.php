<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function detail($slug)
    {
        $blog=DB::table('Pages')->where('pages_slug',$slug)->value('pages_slug');
        if ($slug==$blog) {
            $pageList = Pages::all()->sortBy('pages_must');
            $page = Pages::where('pages_slug', $slug)->first();
            return view('Frontend.page.detail', compact('page', 'pageList'));
        }
        else{
            abort(404);
        }
    }
}
