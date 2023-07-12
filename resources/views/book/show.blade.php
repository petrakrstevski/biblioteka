<img src="{{$book->image}}" height="100px"/>
<h1>{{$book->title}}</h1>
<h2>категорија: {{$book->category->title}}</h2>
<h2>број на страни{{$book->pages}}</h2>

    @if (count($book->author) == 1)
        <h2> <a href="{{ route('author.show', [ 'id' => $book->author[0]->id])}}">{{$book->author[0]->name}}</a> </h2>
    @else
        <h2>Автор:</h2>
        <ul>
            @foreach ($book->author as $author)
            <li>  <a href="{{ route('author.show', [ 'id' => $author->id])}}">{{$author->name}}</a></li>
            @endforeach
        </ul>
    @endif

    <h2>опис</h2>
    <p>{{$book->description}}</p>
<a href="{{ route('book.list')}}">Назад до сите книги</a>