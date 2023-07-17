@extends('_layout.cork')
@section('content')
<ul>
    @foreach($users as $user)
    
     <li>
        {{$user->firstName}}
        {{$user->lastName}}
       ({{$user->email}})
    </li>
    @endforeach
</ul>


@endsection