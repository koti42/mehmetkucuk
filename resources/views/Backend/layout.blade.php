<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!-- bu kısım ajax işlemlerinde post göndereceğimiz veriyi ajax ile csrf edemiyeceğimizden doolayı
     meta etiketi adı altında buraya eklememiz gerekiyor link https://laravel.com/docs/5.8/csrf buradan inceleyebilirsin veya laravel ajax csrf yazıp neden eklenmediğini çalışmadığını anlayabilirsin
     bu sadece sürükle bırak işleminde denenmiştir-->
    <title>Yönetim Paneli  | TeknoBlog</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/Backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/Backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/Backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/Backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="/Backend/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet"href="/backend/custom/css/custom.css">
    <script src="/Backend/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/Backend/bower_components/jquery-ui/jquery-ui.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/Backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/Backend/dist/js/adminlte.min.js"></script>


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Y</b>NT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Yönetim</b>Paneli</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                        <ul class="dropdown-menu">

                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="/Backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->

                                            <!-- The message -->

                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>

                        </ul>

                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->

                        <ul class="dropdown-menu">

                                <!-- Inner Menu: contains the notifications -->


                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->

                        <ul class="dropdown-menu">

                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->

                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->

                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="/images/users/{{Auth::user()->user_file}}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/images/users/{{Auth::user()->user_file}}" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}}<!-- bu komut giriş yapmış olan kullanıcının bilgilerini çekiyor -->
                                    <small>Üyelik Tarihi. 2021</small><!-- Veri tabanına üyelik tarihini kaydedersem buraya üyelik tarihini çekerim -->
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('user.edit',Auth::user()->id)}}" class="btn btn-default btn-flat">Profil Düzenle</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('admin.Logout')}}" class="btn btn-default btn-flat">Çıkış Yap</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                   <!--  Bu Kısım Profilin Yanında Bulunan Ayarlar Çark Simgesini aktif eder yorum satırından çıkarırsanız


                   <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>


                    -->





                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/images/users/{{Auth::user()->user_file}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>


                </div>
            </div>

            <!-- search form (Optional) -->

            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENÜLER</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{route('Backend.Admin')}}"><i class="fa fa-home" aria-hidden="true"></i> <span>Anasayfa</span></a></li>
                <li><a href="{{route('blog.index')}}"><i class="fa fa-paper-plane"></i> <span>Blog</span></a></li>
                <li><a href="{{route('slider.index')}}"><i class="fa fa-sliders" aria-hidden="true"></i> <span>Slider</span></a></li>
                <li><a href="{{route('Pages.index')}}"><i class="fa fa-envira" aria-hidden="true"></i> <span>Page</span></a></li>


                <li class="treeview active">
                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i> <span>Yönetim</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('user.index')}}"><i class="fa fa-user-secret" aria-hidden="true"></i> <span>Yöneticiler</span></a></li>
                        <li><a href="{{route('Backend.AdminSettings')}}"><i class="fa fa-cog"></i> <span>Ayarlar</span></a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->



        <!-- tam burası default index sayfasından veri çekiyor -->

        <section class="content-header">
            <h1>
                Blog Yönetim Paneli

            </h1>
            <ol class="breadcrumb">

            </ol>
        </section>
        @yield('content')


        <!-- tam burası default index sayfasından veri çekiyor -->



        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> Bütün Haklarım Saklıdır.
    </footer>

    <!-- Control Sidebar -->

        <!-- Tab panes -->

            <!-- /.tab-pane -->
            <!-- Stats tab content -->

            <!-- /.tab-pane -->
            <!-- Settings tab content -->

                    <!-- /.form-group -->
    </div>


            <!-- /.tab-pane -->


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->


@if(session()->has('success'))
    <script>alertify.success('{{session('success')}}')</script>
@endif
@if(session()->has('error'))
    <script>alertify.error('{{session('error')}}')</script>
@endif

@foreach($errors->all() as $error)
    <script>
        alertify.error('{{$error}}');
    </script>
@endforeach




</body>
</html>
