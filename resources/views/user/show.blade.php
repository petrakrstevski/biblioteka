@extends('_layout.cork')

@section('content')
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  -->
<style>
  .close{
    color: white;
  }
  .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:white;
	color:black;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
}
</style>

<div class="container">
  
  <!-- Trigger the modal with a button -->
 <br>
 <div class="media">
                        <div class="avatar me-2">
                        <img  alt="avatar" src="https://0.gravatar.com/avatar/{{ md5($users->email) }}" class="rounded-circle"> 

                        </div>
                        <div class="media-body align-self-center">
                            <h6 class="mb-0">{{ucfirst($users->name)}}</h6>
                            <span>{{$users->email}}</span>
                        </div>
                    </div>
 <!-- <div class="media-body align-self-center">
                            <h6 class="mb-0">{{ucfirst($users->name)}}</h6>
                            <span>{{$users->email}}</span>
                        </div> -->
  <!-- <h2>{{$users->name}} </h2> -->
  

  <h4>Издадени книги:</h4>

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
<!-- <p>j</p> -->
                <div class="media">
                        
                        <img src="{{$rent->image}}" alt="" width="50px" height="60px">
                    
                        <!-- <h1 class="name">{{$rent->title}}</h1> -->

                        <div class="media-body align-self-center">
                           <a href="{{ route('book.show', ['id' => $rent->id])}}"><p class="mb-0">{{$rent->title}}</p></a>
                           
                        </div>
                </div>

                
                </td>
              

                <td>
                    <p>{{$rent->issue_date}}</p>
                </td>

                <td>
                    <p>{{$rent->return_date}}</p>
                </td>
                
                <td class="text-center">
                    <!-- <span class="badge badge-light-info">On Hold</span> -->
                    <!-- <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#myModal">Add</button> -->

                    <a href="{{route('rent.return', ['rentId' => $rent->id])}}"> Врати </a>

                </td>
                <td class="text-center">
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
                </td>
     </tr>

         @endforeach 
    


<!-- Modal -->

<form action="{{ route('rent')}}" method="POST">
    @csrf
    <input type="hidden" name="userId" value="{{$users->id}}">
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
                @foreach($books as $book)
                    

                    <div class="col-xxl-2 col-xl-3 col-lg-3 mb-lg-0 col-md-6 mb-3">
                    
                    
                            <div class="card-body">
                            <div class="card-icon mb-4">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->
                                <img src="{{ $book->image}}" alt="" width="50px" height="70px">
                                </div>
                                
                                <p class='card-title mb-0'>{{$book->title}}</p></a>
                                <label> 
                                <input name="books[]" value="{{$book->id}}" type="checkbox"/>  
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
<!-- <button type="button"  class="float" data-dismiss="modal" data-toggle="modal" data-target="#myModal">
<i class="fa fa-plus my-float">ADD</i>
</button> -->

<button type="button" class="float" data-bs-toggle="modal" data-bs-target="#myModal">Add</button>


  
@endsection

