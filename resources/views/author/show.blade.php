<h1>{{$author->name}}</h1>

   
<h2>Книги</h2>
    <ul>
    @foreach ($author->books as $book)
        
            <li>  <a href="{{ route('book.show', [ 'id' => $book->id])}}">{{$book->title}}</a></li>
        @endforeach
        
    </ul>
  

    <p>{{$author->description}}</p>
<a href="{{ route('author.list')}}">Назад до сите автори</a>