<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rabie</title>
</head>
<body>
    <h1>{{$mailData['title']}}</h1>
    <p>{{$mailData['body']}} </p>
    {{-- <a href="{{$mailData['reset_password_url']}}">Reset Password</a> --}}
       {{$mailData['reset_password_url']}}
    
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum corrupti tempore hic modi vel optio sunt nam et, in harum quidem ratione ab alias enim. Ipsum illo autem quos unde!</p>
</body>
</html>