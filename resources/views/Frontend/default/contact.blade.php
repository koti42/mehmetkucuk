@extends('Frontend.layout')
@section('title','Anasayfa')
@section('content')



    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>


    </head>

    <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('home.Index')}}">Tekno Blog</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.Index')}}">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.Index')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/page/{{$slug}}">Sayfalar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact.Detail')}}">Bize Ulaşın</a>
                    </li>

                </ul>
            </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Bize Ulaşın</h1>
        <HR>

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

    <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40324.77011807358!2d36.304077105179644!3d41.30545955846918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x408879d6572201b7%3A0xcdbc1a775cc17f1b!2sAmisos%20Tepesi!5e0!3m2!1str!2str!4v1612802415963!5m2!1str!2str"></iframe>

            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3>Adres Detayları</h3>
                <b>Adres</b>
                <br>
                {!! $adres !!}
                <b>İl/İlçe</b>

                <br>{{ $ilce }}/{{$Il}}
                <br>
                <b>Cep Telefonu:</b>

                {!!$phone_gsm !!}

                <b>Sabit Telefon:</b>
                <br>
                {{$phone_sabit}}
<br>
               <b>Acil Durum Mail Adresi:</b>

                <a href="mailto:mehmet3387@gmail.com">{{$mail}}
                </a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>İletişim Formu</h3>
                <form method="POST">
                    @csrf
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><b>Ad soyad: </b></label>
                            <input class="form-control" type="text" name="name" placeholder="Ad Soyad" required>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><b>Mail:</b></label>
                            <input class="form-control" type="email" name="email" placeholder="Mail" required>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><b>Telefon:</b></label>
                            <input class="form-control" type="text" name="phone" placeholder="Telefon">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label> <b>Mesajınız:</b></label>
                            <textarea rows="10" cols="100" class="form-control" NAME="message" required
                                      data-validation-required-message="Lütfen Mesajınızı Giriniz" maxlength="999"
                                      style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Mesaj Gönder</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

    </div>


    </body>


@endsection
@section('css')
@endsection
@section('js')
@endsection
