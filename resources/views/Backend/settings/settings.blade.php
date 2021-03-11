@extends('Backend.layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <section class="content-header">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Ayarlar</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                        <th>Anahtar Kelimeler</th>
                        <th>Tip</th>
                    </tr>

                    <tbody id="sortable">
                    @foreach($data['adminSettings'] as $adminSettings)
                        <tr id="item-{{$adminSettings->id}}">
                            <td>{{$adminSettings->id}}</td>
                            <td class="sortable">{{$adminSettings['settings_description']}}</td>
                            <td>

                                @if($adminSettings['settings_type']=="file")
                                    <img width="100" src="/images/settings/{{$adminSettings['settings_value']}}" alt="">
                                @else
                                    {{$adminSettings->settings_value}}
                                @endif

                            </td>
                            <td>{{$adminSettings->settings_key}}</td>
                            <td>{{$adminSettings->settings_type}}</td>
                            <!--sayfa'da editleye tıklanacağı zaman hangisinin id'si olduğunu web.php üzerinden settingscontroller'a gönderen kod bloğu -->
                            <td width="5"><a href="{{route('Backend.edit',['id'=>$adminSettings->id])}}"><i
                                        class="fa fa-pencil-square"></i></a></td>
                            <!-- bu aşağıda oluşturulan kısım php echo etiketi adı altında bütün gelen verilerin id'lerinin çekilmesi işlemini gerçekleştiriyor veri tabanından
                             ve ayrıca if kontrolü ile sadece settings_delete 1 olanların silinmesine izin veriyor yani silinmesini istemediğimiz verilerin settings_delete değerlerini 0 yaparak
                             kullancıya silme butonunu göstermeyebiliyoruz kırmızı altı çizili olan şey hata değil neden yanıyor bilmiyorum ama çalışıyor-->
                            <td width="5">
                                <a href="{{ route('company.destroy',$adminSettings->id) }}" class="fa fa-trash-o"
                                   style="font-size: 0.8em;" id="deleteCompany" data-id="{{ $adminSettings->id }}">

                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('Backend.sortable')}}",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("İşlem Başarılı");
                            } else {
                                alertify.error("İşlem Başarısız");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });
        //bu kısım delete komutuna basıldığın da tetiklenecek ve basılan veride ki id'i yakalayacak
        //burada uyarı mesajını verdikten snra web.php'e yönlendirme işlemini yaparak oradan da settingscontrollerda'ki oluşturmuş olduğumuz silme fonksiyonuna veriyi yolluyor
        //bunu gönderirken yukarıda almış olduğumuz destroy_id'yi göndermeyi unutmuyoruz yoksa silme işlemini neye göre yapacağını bilemeyiz
        //web php gönderdiğimiz zaman hata veriyor bu yüzden bunun yolunu elimiz ile manuel olarak belirtmek zorunda kaldık
        //video daki silme işlemi çalışmadığından dolayı internetten aldım bu silme işlemini zamanla geliştirmem lazım kodlara hakim oldukça
        //aldığım sitenin linki:  https://www.codecheef.org/article/delete-record-using-ajax-request-in-laravel
        $(document).ready(function () {

            $("body").on("click","#deleteCompany",function(e){

                if(!confirm("Gerçekten Silmek İstiyor musunuz Geri Dönüşü Yok?")) {
                    return false;
                }

                e.preventDefault();
                var id = $(this).data("id");
                // var id = $(this).attr('data-id');
                var token = $("meta[name='csrf-token']").attr("content");
                var url = e.target;

                $.ajax(
                    {
                        url: url.href, //or you can use url: "company/"+id,
                        type: 'DELETE',
                        data: {
                            _token: token,
                            id: id
                        },
                        success: function (response){

                            $("#success").html(response.message)

                            Swal.fire(
                                'Başarılı!',
                                'Silme İşlemi Başarıyla Gerçekleştirildi!',
                                'success'


                            )
                            $("#item-"+id).remove();//silme işlemi başarıyla gerçekleşirse sayfadan silinen veriyi temizlemeye yarıyor
                        }

                    });
                return false;
            });


        });


    </script>

@endsection
@section('css')@endsection
@section('js')@endsection
