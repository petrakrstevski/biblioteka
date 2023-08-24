@extends('_layout.cork')

@section('content')

<style>
  .close{
    color: white;
  }
</style>

<div class="container">
  
  <!-- Trigger the modal with a button -->
  <br>
  <h2>{{$user->firstName}} </h2>
  <h5></h5>

  <h4>Izdadeni knigi:</h4>
  <div class="faq container">

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+</button>

<div class="faq-layouting layout-spacing">

    <div class="kb-widget-section">

        <div class="row justify-content-center">

        @foreach($books as $book)
            

            <div class="col-xxl-2 col-xl-3 col-lg-3 mb-lg-0 col-md-6 mb-3">
            
                <div class="card">
                    <div class="card-body">
                    <div class="card-icon mb-4">
                        <img src="{{ $book->img}}" alt="" width="50px" height="70px">
                        <i class="fa fa-pencil"></i>
                        </div>
                           <h4 class='card-title mb-0'>{{$book->title}}</h4></a>
                    </div>
                    <h6>Издадена на:</h6>
                    <h6>Трае до:</h6>
                    <h6>Вратена на:</h6>
                </div>
            </div>
            @endforeach
            </div>
                </div>
                </div>
                </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          
          <h4 class="modal-title">Моментално достапни книги:</h4>
          <button type="button" class="close" data-dismiss="modal"><h4>&times;<h4></button>
        </div>
        <div class="modal-body">
      

<div class="faq-layouting layout-spacing">

    <div class="kb-widget-section">

        <div class="row justify-content-center">
        @foreach($books as $book)
            

            <div class="col-xxl-2 col-xl-3 col-lg-3 mb-lg-0 col-md-6 mb-3">
            
               
                    <div class="card-body">
                    <a href="{{ route('kniga.prikazi', ['bookId' => $book->id])}}">
                    <div class="card-icon mb-4">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->
                        <img src="{{ $book->img}}" alt="" width="50px" height="70px">
                        </div>
                           <h5 class='card-title mb-0'>{{$book->title}}</h5></a>
                           <label> 
                         <input wire:model="books" value="{{$book->id}}" type="checkbox"/>  
                          </label>
                       
                    
                </div>
            </div>
            @endforeach
            </div>
                </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
          
        </div>
      </div>
      
    </div>
  </div>
  
</div>




@endsection