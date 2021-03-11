@extends('Backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Page Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('Pages.update',$pages->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @isset($pages->pages_file)
                    <div class="form-group">
                        <label>Yüklü Görsel</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="/images/pages/{{$pages->pages_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="pages_file"  type="file">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="pages_title" value="{{$pages->pages_title}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="pages_slug" value="{{$pages->pages_slug}}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1"
                                              name="pages_content">{{$pages->pages_content}}</textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>

                            </div>
                        </div>

                        <div class="form-group">


                            <input type="hidden" name="old_file" value="{{$pages->pages_file}}">



                            <div align="right" class="box-footer">
                                <button type="submit" class="btn btn-success">Düzenle</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection
@section('css')@endsection
@section('js')@endsection
