<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Data;
use Illuminate\Support\Str;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //bu metot ile verileri veri tabanından blog_must sırasına göre çekiyor
        //model işlemleri bu kısımda yapılıyor
        //compact metodu ile diğer index sayfasına verileri çekmesi için değişkeni yolluyoruz
        $data['blog'] = Blogs::all()->sortBy('blog_must');

        return view('Backend.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.blogs.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (strlen($request->blog_slug)>3)
        {
            $slug=Str::slug($request->blog_slug);
        } else {
            $slug=Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file'))
        {
            $request->validate([
                'blog_title' => 'required',
                'blog_content' => 'required',
                'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:7200'
            ]);

            $file_name=uniqid().'.'.$request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'),$file_name);
        } else {
            $file_name=null;
        }


        $td = Carbon::today()->format('Y-m-d H-i-s');

        $blog=Blogs::insert(
            [
                "blog_title" => $request->blog_title,
                "blog_slug" => $slug, //işlem
                "blog_file" => $file_name,//İşlem
                "blog_content" => $request->blog_content,
                "blog_status" => $request->blog_status,
                "created_at"=>$td,
                "updated_at"=>$td,
            ]
        );

        if ($blog)
        {
            return redirect(route('blog.index'))->with('success','İşlem Başarılı');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //blogs adı altında bir değişken oluşturduk ve Blogs modelinden ilk gelen id'yi çekiyorz
        //ve 2. kod da ise o parametreyi edit sayfasına gönderiyoruz düzenleme işlemi için
        $blogs = Blogs::where('id', $id)->first();
        return view('Backend.blogs.edit')->with('blogs', $blogs);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     */

    public function update(Request $request, $id)
    {

        $user = User::first();
        $td = Carbon::today()->format('Y-m-d H-i-s');


        if (strlen($request->blog_slug)>3)
        {
            $slug=Str::slug($request->blog_slug);
        } else {
            $slug=Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file'))
        {
            $request->validate([
                'blog_title' => 'required',
                'blog_content' => 'required',
                'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'),$file_name);
            $blog=Blogs::where('id',$id)->update(
                [
                    "blog_title" => $request->blog_title,
                    "blog_slug" => $slug, //işlem
                    "blog_file" => $file_name,//İşlem
                    "blog_content" => $request->blog_content,
                    "blog_status" => $request->blog_status,
                    "updated_at"=>$td,
                ]
            );
            $path='images/blogs/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }
        } else {
            $blog=Blogs::where('id',$id)->update(
                [
                    "blog_title" => $request->blog_title,
                    "blog_slug" => $slug, //işlem
                    "blog_content" => $request->blog_content,
                    "blog_status" => $request->blog_status,
                    "updated_at"=>$td,
                ]
            );
        }





        if ($blog)
        {
            return back()->with('success','İşlem Başarılı');
        }
        return back()->with('error','İşlem Başarısız');
    }





  /*  public function update(Request $request, $id)
    {
        //adam slug girmeyi unutursa veya atlarsa başlık değişkenini slug'a aktarma yaparak veri tabanına kaydediyoruz
        if (strlen($request->blog_slug) > 3) {
            $slug = Str::slug($request->blog_slug);
        } else {
            $slug = Str::slug($request->blog_title);
        }
        //Blog file dosyamıza gelen bir dosya var ise if'in içindeki komutları uygulamasını sağlıyor

        if ($request->hasFile('blog_file')) {
            //bu kısımda ise doğrulama yapıyor yüklenen dosya türü uyuyor mu uymuyor mu diye

            $request->validate([
                //aşağıda ki blog_title blog_contentler veri tabanında olan sutun isimleri
                //required ile bu sutunlara boş veri gitmesinin önüne geçiyor ve kullanıcıya o verileri girmesini zorunlu kılıyor
                'blog_title' => 'required',
                'blog_content' => 'required',
                'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            //gelen dosyanın orjinal ismini alıyor ve file_name'e aktarıyor uniqid ise 13 haneli rastgele bir sayı atayarak o dısyayı yeniden isimlendiriyor veri tabanında saklamak için

            $file_name = uniqid() . '.' . $request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'), $file_name);
            //bu ise dosyayı alarak aşağıdaki belirtilen yola götürüyor
            //öyle bir klasör yoksa da kendisi o klasörü oluşturuyor
            $blog = Blogs::Where('id', $id)->update(
                [
                    "blog_title" => $request->blog_title,
                    "blog_slug" => $slug, //işlem
                    "blog_file" => $file_name,//İşlem
                    "blog_content" => $request->blog_content,
                    "blog_status" => $request->blog_status,
                ]
            );

            $path = 'images/blogs/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }

        } else {
            $blog = Blogs::Where('id', $id)->update(
                [
                    "blog_title" => $request->blog_title,
                    "blog_slug" => $slug, //işlem
                    "blog_content" => $request->blog_content,
                    "blog_status" => $request->blog_status,
                ]
            );
        }



        //bu bir yönlendirme metodu daha önce oluşturduğumuz uyarı metotlarını tetikleyecek işlemler doğru çalışıyorsa
        if ($blog) {
            return back()->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }
*/
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blogs::find(intval($id));
        if ($blog->delete()) {
            echo 1;
        }
        echo 0;

    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            //Blogs adı altında yazan yeri Models klasörün de oluşturmuş olduğumuz modelin ismi
            //İntval dememiz ise string gelen değerleri int tipine dönüşütürüyor
            $blogs = Blogs::find(intval($value));
            $blogs->blog_must = intval($key);
            $blogs->save();
        }
        echo true;
    }
}
