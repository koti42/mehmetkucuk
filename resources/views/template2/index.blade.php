<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

</head>
<body>
<h3>Sayın Mehmet bey"www.mehmetkucukcelebi.com.tr" Web Sitesinden Kullanıcıların Size Gönderdiği Mesaj</h3>

<p><b>Gönderen(Admin Panel): </b>{{$data['email']}}</p>
<p><b>Konu: </b>{{$data['subject']}}</p>
<p><b>Mesaj: </b>{{$data['message']}}</p>
</body>
</html>
