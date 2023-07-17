
@extends('_layout.cork')
@section('content')
<img src="{{$book->image}}" width="270px" height="300" class="img"/>
<style>
 .img{
    float:left;
    margin-top:5px;
 }
 .name{
    margin-top:10px;
    margin-left:290px
 }

</style>
<h1 class="name">{{$book->title}}</h1>
<h2 class="name">категорија: {{$book->category->title}}</h2>
<h2 class="name">број на страни{{$book->pages}}</h2>

    @if (count($book->author) == 1)
        <h2 class="name"> <a href="{{ route('author.show', [ 'id' => $book->author[0]->id])}}">{{$book->author[0]->name}}</a> </h2>
    @else
        <h2 class="name">Автор:</h2>
        <ul class="name">
            @foreach ($book->author as $author)
            <li>  <a href="{{ route('author.show', [ 'id' => $author->id])}}">{{$author->name}}</a></li>
            @endforeach
        </ul>
    @endif

    <h2 class="name">опис</h2>
    <p class="name"> {{$book->description}}</p>
<!-- <a href="{{ route('book.list')}}">Назад до сите книги</a> -->
@endsection