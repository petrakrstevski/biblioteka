<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<ul>
    @foreach($users as $user)
     <li>
        {{$user->firstName}}
        {{$user->lastName}}
       ({{$user->email}})
    </li>
    @endforeach
</ul>


<a href="{{ route('home.index')}}">Назад до почетната страна</a>
</body>
</html>