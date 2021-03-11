<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\settings;
use Illuminate\Http\Request;


class SettingsController extends Controller
{
    public function index()
    {
        $data['adminSettings'] = settings::all()->sortBy('settings_must');

        return view('Backend.settings.settings', compact('data'));


    }

    //bunu tam olarak hatırlamıyorum ama sürükle bırak işlemi için kullandığımızı düşünüyorum.
    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $settings = Settings::find(intval($value));
            $settings->settings_must = intval($key);
            $settings->save();
        }
        echo true;
    }

    //destroy metodu buraya gelen $id kısmında olan veriyi veri tabanından silmesi için kullanıyoruz
    public function destroy($id)
    {
        $settings = Settings::find($id);
        $settings->delete();

        return response()->json([
            'success' => 'Silme İşlemi Başarıyla Gerçekleştirildi'
        ]);

    }

//bu aşağıda kullanılan komut editleme sayfasına verilerin gönderilip o sayfa da rahatça düzenlenebilmesine ve erişilebilmesine yarıyor
    public function edit($id)
    {
        $settings = Settings::where('id', $id)->first();
        return view('Backend.settings.edit')->with('settings', $settings);
    }

    public function update(Request $request, $id)
    {

        if ($request->hasFile('settings_value')) {
            $request->validate([
                'settings_value' => 'required|image|mimes:jpeg,jpg,png|max:2048'
            ]);
            //dosyanın file name değişkenine tam adını kaydediyor bu komut örnek: Adsız.png dosyasının adını Unuqid komutuyla rastgele bir sayı atıyor
            //ve sonuna .'.'. ile birleştirdiğimiz kısım da dosyanın uzantısını ekliyor .jpg gibi
            $file_name = uniqid() . '.' . $request->settings_value->getClientOriginalExtension();
            //puplic_path komutu ana dizine götürüyor ve resmin hangi klasöre kaydedilmesini istiyorsan oranın yolunu yazıyorsun
            //file_name ise önceden yüklenen dosyanın ismini tutuyor değişken olarak
            $request->settings_value->move(public_path('images/settings'), $file_name);

            $request->settings_value = $file_name;
        }


        $settings = Settings::where('id', $id)->update(
            [

                "settings_value" => $request->settings_value
            ]
        );
        if ($settings) {
            //daha önce güncelleme işlemin de var olan resim tekrardan güncellenirse eskisini silerek yenisini ekliyor
            //işlem başarılı ise bu işlemi burada gerçekleştiriyor
            //. ile birleştirme işlemi gerçekleştiriliyor
            $path='images/settings/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }
            return back()->with("success", "Güncelleme İşlemi Başarıyla gerçekleştirildi");

        }
        return back()->with("error", "Güncelleme İşlemi Gerçekleştirilemedi");

    }

}
