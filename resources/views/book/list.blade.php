<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<ul>
    @foreach($books as $book)
    
         <li><a href="{{route('book.show', [ 'id' => $book->id])}}"> {{$book->title}} </a> </li> 
    @endforeach
</ul>


<a href="{{ route('home.index')}}">Назад до почетната страна</a>
</body>
</html>