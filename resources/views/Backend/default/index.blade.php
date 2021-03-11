@extends('Backend.layout')
@section('content')



    <script type="text/javascript">

        window.onload = function(){
            Boyutlandir("image",1);
        }

        function Boyutlandir(id, oran) {
            var img = document.getElementById(id);
            img.src = img.getAttribute("original");

            var canvas = document.createElement("canvas");
            canvas.width = img.width*oran;
            canvas.height = img.height*oran;

            canvas.getContext("2d").drawImage(img, 90, 90, img.width*oran, img.height*oran);

            img.src = canvas.toDataURL();
        }

    </script>

    <section class="content-header">

        <!-- Main content -->
        <section class="content">


            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">En Yeni Yöneticiler</h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger">Yeni Yöneticiler</span>
                        </div>
                    </div>

                    <div class="box-body no-padding">


                        <ul class="users-list clearfix">
                            @foreach($data['user'] as $user)
                            <li>
                                <img src="/images/users/{{$user->user_file}}" alt="User Image">
                                <a class="users-list-name" href="{{route('user.edit',$user->id)}}">{{$user->name}}</a>
                                <span class="users-list-date">{{$user->role}}</span>
                            </li>
                            @endforeach
                        </ul>





                    </div>
                    <div class="box-body">
                        <div class="box box-info">
                            <div class="box-header">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <p>{{session('success')}}</p>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <i class="fa fa-envelope"></i>


                                <h3 class="box-title">Hızlı Email</h3>
                                <!-- tools box -->
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">
                                <form method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Geri Dönüş Yapılacak Mail Adresi">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="Konu">
                                    </div>
                                    <div>
                  <textarea class="textarea" placeholder="Mesaj"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                            NAME="message"></textarea>
                                    </div>
                                    <div class="box-footer clearfix">
                                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Mesaj Gönder</button>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

            </div>












































@endsection
@section('css')@endsection
@section('js')@endsection
