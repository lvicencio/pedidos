@extends('layouts.app')

 @section('title', 'Resiltado de busqueda')

@section('content')


 


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">

        <h2 class="title">Resultado de busqueda </h2>
        <hr>
      <div class="text-center">
            <form class="form-inline" method="get" action="{{ url('/search') }}">
              <input class="form-control" type="text" name="busqueda" placeholder="¿Buscar Producto?">
              <button class="btn btn-info btn-just-icon" type="submit">
                <i class="material-icons">search</i>
              </button>

            </form>
          </div>

<p>Se encontrarón los siguientes resultados de la busqueda <strong>"{{ $busqueda }}"</strong>

                    <div class="row">

                  

                      @foreach ($products as $product)
                        
                        <div class="card col-md-4 mx-auto" >
                       
                          <div class="card card-plain ">
                            <div class="col-md-8 ml-auto mr-auto">
                           <!-- {{ $product->images()->first() ? $product->images()->first()->image : ''  }}-->
                           <a href="{{ url('/products/'.$product->id) }}"><img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid" ></a> 
                             

                             <!-- $product->images()->first()->image  -->
                            </div>
                            <h4 class="card-title"> <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a> 
                              <br>
                              
                            </h4>
                            <div class="card-body">
                              <p class="card-description"> {{ $product->description }}
                            </div>
                          
                          </div>
                        
                        </div>

                      @endforeach

                     
                  </div>
 					<div class="text-center">
                        {{$products->links("pagination::bootstrap-4")}} 
                    </div>
      </div>
     

    </div>
  </div>

@include('includes.footer')
@endsection
