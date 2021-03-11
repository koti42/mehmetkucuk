<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/Backend/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/Backend/css/util.css">
    <link rel="stylesheet" type="text/css" href="/Backend/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('/Backend/images/bg-01.jpg');">
        <div class="wrap-login100">



                <a href="{{route('admin.login')}}"><span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
                </a>

                <span class="login100-form-title p-b-34 p-t-27">
						Admin
					</span>


            <form action="{{route('admin.Authenticate')}}" method="post">
                @CSRF
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" required class="form-control" type="email" name="email" placeholder="Kullanıcı Adı"  value="{{old('email')}}">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" required class="form-control" type="password" name="password" placeholder="Şifre">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <label class="label" for="ckb1">
                        </label>
                    </div>

                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me"{{old('remember_me') ? 'checked' : '' }}>
                    <label class="label-checkbox100" for="ckb1">
                       Beni Hatırla
                    </label>
                </div>
                @if(Session::has('error'))
                    <div  class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @elseif(Session::has('success'))
                    <div with="100" class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Giriş
                        </button>
                    </div>
                </form>

        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="/Backend/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/Backend/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/Backend/vendor/bootstrap/js/popper.js"></script>
<script src="/Backend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/Backend/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/Backend/vendor/daterangepicker/moment.min.js"></script>
<script src="/Backend/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/Backend/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/Backend/js/main.js"></script>

</body>
</html>
