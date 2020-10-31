<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(session('message_check'))
    {{ session('message_check')  }}
@endif

@if(session('message_done'))
    {{ session('message_done')  }}
@endif


<h1>Bạn chưa kích hoạt</h1>
<h2>Bấm vào <a href="{{route('reactivated')}}">đây </a> để gửi email kích hoạt</h2>
</body>
</html>
