@extends('layouts.app')

 @section('title', 'Bienvenidos')

@section('content')


    
   <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Sushi y Productos alimenticios a tu domicilio</h1>
          <h4>Pedidos gratis dentro del sector.</h4>
          <br>
          <a href="#" class="btn btn-danger btn-raised btn-lg">
            Despacho Gratis
     </a>
        </div>
      </div>
    </div>
  </div>


  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            
            <h5 class="description">Recibe tus productos en la comodidad de tu hogar, con calidad y los mejores precios.</h5>
           </div>
        </div>
       <div class="section">
        <h2 class="title">Listado de Categoria de Productos</h2>
         <div class="text-center">
            <form class="form-inline" method="get" action="{{ url('/search') }}">
              <input class="form-control" type="text" name="busqueda" placeholder="¿Buscar Producto?">
              <button class="btn btn-info btn-just-icon" type="submit">
                <i class="material-icons">search</i>
              </button>

            </form>
          </div>

          <div class="row">

          

            @foreach ($categories as $category)
              
              <div class="card col-md-4 mx-auto" >
             
                <div class="card card-plain ">
                
                  <h4 class="card-title"> <div class="text-center"><a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a></div> 
                  </h4>
                  <div class="card-body">
                     <p>Contiene {{ $category->count() }} clase de productos</p><br>
                    <p class="card-description"> {{ $category->description }} </p>
                  </div>
               
                </div>
              
              </div>

            @endforeach

           
          </div>


      
      </div>

    </div>
  </div>

@include('includes.footer')
@endsection
