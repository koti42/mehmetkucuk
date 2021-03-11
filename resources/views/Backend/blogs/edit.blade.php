@extends('Backend.layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <section class="content-header">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Blog İçerik Düzenleme </h3>
            </div>
            <div class="box-body">
                <!-- blog.store metodu insert işlemi için controller'a gönderme işlemi gerçekleştiriyor -->
                <form action="{{route('blog.update',$blogs->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @isset($blogs->blog_file)
                        <div class="form-group">
                            <label>Yüklü Görsel</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="100" src="/images/blogs/{{$blogs->blog_file}}" alt="">
                                </div>
                            </div>
                        </div>
                    @endisset

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="blog_file"  type="file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" value="{{$blogs->blog_title}}"
                                       name="blog_title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" value="{{$blogs->blog_slug}}" name="blog_slug" >
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">



                                    <textarea class="form-control" id="editor1"
                                              name="blog_content">{{$blogs->blog_content}}</textarea>


                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>

                            </div>
                        </div>
                        <div class="form-group">

                            <input type="hidden" name="old_file" value="{{$blogs->blog_file}}">


                            <div align="right" class="box-footer">
                                <button type="submit" class="btn btn-success">Güncelle</button>
                            </div>
                        </div>


                </form>
            </div>
        </div>
    </section>

@endsection
@section('css')@endsection
@section('js')@endsection
