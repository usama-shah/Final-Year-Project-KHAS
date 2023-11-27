<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khas</title>
    <link rel="stylesheet" href="{{asset('css/extend-bootstrap.min.css')}}">
    <style>

        body{
            min-height: 100vh;

        }
        a{
            text-decoration: none;

        }
    </style>
</head>
<body class="bg-khas-primary row w-100 d-flex justify-content-center align-items-center">
    <div class="col-md-3  bg-white shadow p-5 m-5 border rounded-3 d-flex justify-content-center align-items-center text-khas-primary " role="button">

<a href="{{url('/admin_dashboard')}}">
<div><h3 >Admin Panel</h3></div>
</a>
    </div>
<div class="col-md-3  bg-white shadow p-5 m-5 border rounded-3 d-flex justify-content-center align-items-center text-khas-primary " role="button">
<a href="{{url('/user')}}">
<div><h3 >User Panel</h3></div>
</a>
</div>
<div class="col-md-3  bg-white shadow p-5 m-5 border rounded-3 d-flex justify-content-center align-items-center text-khas-primary " role="button">
<a href="{{url('/rider-dashboard')}}">
<div><h3 >Rider Panel</h3></div>
</a>
</div>
</body>
</html>