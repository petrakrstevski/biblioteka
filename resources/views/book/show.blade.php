
@extends('_layout.cork')
@section('content')
<div>
<img src="{{$book->image}}" width="270px" height="300" class="img"/>
</div>
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



<div class="faq container">
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+</button> -->
<div class="faq-layouting layout-spacing"> 
    
    

  <div class="table-responsive">
    <table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th class="checkbox-area" scope="col">
                <div class="form-check form-check-primary">
                    <input class="form-check-input" id="custom_mixed_parent_all" type="checkbox">
                </div>
            </th>
            <th scope="col">Name</th>
            <th scope="col">Датум на земање</th>
            <th scope="col">Датум на враќање</th>
            <!-- <th scope="col">Role</th> -->
            <th class="text-center" scope="col">Status</th>
            <th class="text-center" scope="col"></th>
        </tr>
    </thead>
    

    


    @foreach($rents as $rent)
            <tr>
                <td>
                    <div class="form-check form-check-primary">
                        <input class="form-check-input custom_mixed_child" type="checkbox">
                    </div>
                </td>
                <td>
                <div class="media">
                        
                        
                <div class="avatar me-2">
                        <img  alt="avatar" src="https://0.gravatar.com/avatar/{{ md5($rent->email) }}" class="rounded-circle"> 

                        </div>
                        <div class="media-body align-self-center">
                            <h6 class="mb-0">{{ucfirst($rent->name)}}</h6>
                            <span>{{$rent->email}}</span>
                        </div>
                    </div>
                        
                </div>

                
                </td>
              
                <td>
                    <p>{{$rent->issue_date}}</p>
                </td>

                <td>
                    <p>{{$rent->return_date}}</p>
                </td>
                <td>
                    <p class="mb-0">Lead Designer</p>
                    <span class="text-info">Graphic</span>
                </td>
                
                <td class="text-center">
                    <!-- <span class="badge badge-light-info">On Hold</span> -->
                    <!-- <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#myModal">Add</button> -->

                    <a href="{{route('rent.return', ['rentId' => $rent->id])}}"> Врати </a>
                </td>
                <!-- <td class="text-center">
                    <div class="action-btns">
                        <a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </a>
                        <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>
                        <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>
                    </div>
                </td> -->
     </tr>

         @endforeach 
    

         <form action="{{ route('rent')}}" method="POST">
    @csrf


    <input type="hidden" name="bookId" value="{{$book->id}}">

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Моментално достапни книги:</h4>
            <!-- <button type="button" class="close" data-dismiss="modal"><h4>&times;<h4></button> -->
        </div>
        <div class="modal-body">
    

        <div class="faq-layouting layout-spacing">

            <div class="kb-widget-section">

                <div class="row justify-content-center">
                @foreach($users as $user)
                    

                    <div class="col-xxl-2 col-xl-3 col-lg-3 mb-lg-0 col-md-6 mb-3">
                    
                    
                            <div class="card-body">
                            <div class="card-icon mb-4">
                                   
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->
                                <img src="{{ $book->image}}" alt="" width="50px" height="70px">
                                </div>
                                
                                <p class='card-title mb-0'>{{$user->name}}</p></a>
                                <label> 
                                <input name="user[]" value="{{$user->id}}" type="checkbox"/>  
                                </label>
                            
                            
                        </div>
                    </div>
                    @endforeach
                    </div>
                        </div>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                


                </div>
            </div>
            
            </div>
        </div>
    
    </div>
</form>
@endsection