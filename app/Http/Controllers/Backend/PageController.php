<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Pages;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page'] = Pages::all()->sortBy('pages_must');
        return view('Backend.pages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('Backend.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $td = Carbon::today()->format('Y-m-d H-i-s');

        if (strlen($request->pages_slug)>3)
        {
            $slug=Str::slug($request->pages_slug);
        } else {
            $slug=Str::slug($request->pages_title);
        }

        if ($request->hasFile('pages_file'))
        {
            $request->validate([
                'pages_title' => 'required',
                'pages_content' => 'required',
                'pages_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->pages_file->getClientOriginalExtension();
            $request->pages_file->move(public_path('images/pages'),$file_name);
        } else {
            $file_name=null;
        }



        $page=Pages::insert(
          [
              "pages_title" => $request->pages_title,
              "pages_slug" => $slug, //işlem
              "pages_file" => $file_name,//İşlem
              "pages_content" => $request->pages_content,
              "pages_status" => $request->pages_status,
              "created_at"=>$td,
              "updated_at"=>$td,
          ]
      );

      if ($page)
      {
          return redirect(route('Pages.index'))->with('success','İşlem Başarılı');
      }
        return back()->with('error','İşlem Başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages=Pages::where('id',$id)->first();
        return view('Backend.pages.edit')->with('pages',$pages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $td = Carbon::today()->format('Y-m-d H-i-s');
        if (strlen($request->pages_slug)>3)
        {
            $slug=Str::slug($request->pages_slug);
        } else {
            $slug=Str::slug($request->pages_title);
        }

        if ($request->hasFile('pages_file'))
        {
            $request->validate([
                'pages_title' => 'required',
                'pages_content' => 'required',
                'pages_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->pages_file->getClientOriginalExtension();
            $request->pages_file->move(public_path('images/pages'),$file_name);

            $page=Pages::Where('id',$id)->update(
                [
                    "pages_title" => $request->pages_title,
                    "pages_slug" => $slug, //işlem
                    "pages_file" => $file_name,//İşlem
                    "pages_content" => $request->pages_content,
                    "pages_status" => $request->pages_status,
                    "updated_at"=>$td,
                ]
            );

            $path='images/pages/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }

        } else {
            $page=Pages::Where('id',$id)->update(
                [
                    "pages_title" => $request->pages_title,
                    "pages_slug" => $slug, //işlem
                    "pages_content" => $request->pages_content,
                    "pages_status" => $request->pages_status,
                    "updated_at"=>$td,
                ]
            );
        }





        if ($page)
        {
            return back()->with('success','İşlem Başarılı');
        }
        return back()->with('error','İşlem Başarısız');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $page=Pages::find(intval($id));
       if ($page->delete())
       {
           echo 1;
       }
       echo 0;
    }

    public function sortable()
    {
//        print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value) {
            $pages = Pages::find(intval($value));
            $pages->page_must = intval($key);
            $pages->save();
        }
        echo true;
    }

}
