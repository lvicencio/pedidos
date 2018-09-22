@extends('layouts.app')

 @section('title', 'Detalle Producto')

@section('content')


 


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">

        <h2 class="title">Información del Producto {{ $product->name }}</h2>
        <hr>
       @if (session('notification'))
                <div class="alert alert-success">
                     {{ session('notification') }} <br>
                     <a href="{{ url('/') }}" ><span>Volver a Productos</span></a>
                </div>
      @endif 
       
       <div class="row">
       

        <div class="col">
          
            <button class="btn btn-info btn-round" data-toggle="modal" data-target="#exampleModal">
                  <i class="material-icons">add</i> Añadir a Cesta
            </button>

            <div class="card" style="width: 24rem;">

              <div class="card-header">
                {{ $product->name }}
              </div>
                  <img class="card-img-top" src="{{ $product->featured_image_url }}" alt="Card image cap">
                  <div class="card-body">
                                       
                    <table class="table table-hover">
    
                      <tbody>
                        <tr>
                          <th scope="row">Descripción</th>
                          <td>{{ $product->description  }}</td>
                        </tr>
                        <tr>
                          <th scope="row">Precio</th>
                          <td>{{ $product->price  }}</td>
                          
                        </tr>
                        <tr>
                          <th scope="row">Categoria</th>
                          <td>{{ $product->category->name }}</td>
                          
                        </tr>
                      </tbody>
                    </table>



                      <p class="card-text"> {{ $product->long_description  }} </p>
                  </div>
            </div>

          </div>
          <div class="col">
          @foreach($images as $image)
            
             <!--  <div class="card col-md-5">
                <div class="card-body">
                  <img src="{{ $image->url }}" width="150" height="150">
                 
                  
                </div>
              </div>  -->

              <div class="card-deck col-md-7">
                <div class="card col-md-8 col-lg-8">
                  <img   src="{{ $image->url }}" width="150" height="150">                 
                </div>
              </div>
           
            @endforeach
            
              
          
          </div>
       </div>




      </div>
     

    </div>
  </div>


          <!--  MODAL -->

 
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione Cantidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ url('/carrito') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="modal-body">
                  <input type="number" name="quantity" value="1" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-info">Añadir</button>
                </div>
              </form>
            </div>
          </div>
        </div>



          <!--  CIERRE MODAL-->
@include('includes.footer')
@endsection
