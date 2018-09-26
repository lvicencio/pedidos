@extends('layouts.app')

 @section('title', 'Detalle Producto')

@section('content')


 


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">

        <h2 class="title">Información de la Categoria  '{{ $category->name }}'</h2>
        <hr>
        
       <div class="row" align="center">
       

        <div class="col">
          
            <div class="card" style="width: 24rem;">

              <div class="card-header">
                <strong>Nombre: </strong>{{ $category->name }}
              </div>
                 
                  <div class="card-body">
                                       
                    <table class="table table-hover">
    
                      <tbody>
                        <tr>
                          <th scope="row">Descripción</th>
                          <td>{{ $category->description  }}</td>
                        </tr>
                     
                      </tbody>
                    </table>








                  </div>
                  <a href="{{ url('/admin/categories') }}" class="btn btn-info"> Volver</a>
            </div>

          </div>
         
       </div>

Listado de Producto de la Categoria <strong>{{ $category->name }}</strong>

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
