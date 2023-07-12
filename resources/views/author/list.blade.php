<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<ul>
    @foreach($authors as $author)
        <li><a href="{{route('author.show', [ 'id' => $author->id])}}"> {{$author->name}} </a> </li> 
    @endforeach
</ul>

<a href="{{ route('home.index')}}">Назад до почетната страна</a>
</body>
</html>