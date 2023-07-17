
@extends('_layout.cork')
@section('content')
<img src="{{ $author->img}}" alt="" width="250px" height="300" class="img">
<style>
 .img{
    float:left;
    margin-top:5px;
 }
 .name{
    margin-top:10px;
    margin-left:260px
 }
 .title{
    margin-top:10px;
    margin-left:20px
 }
</style>

<h1 class="name">{{$author->name}}</h1>

   
<h2 class="name">Книги</h2>

    <ul>
    @foreach ($author->books as $book)
        
            <li>  <a class="title" href="{{ route('book.show', [ 'id' => $book->id])}}">{{$book->title}}</a></li>
        @endforeach
        
    </ul>
  

    <p class="name">{{$author->description}}</p>
<!-- <a href="{{ route('author.list')}}">Назад до сите автори</a> -->
@endsection