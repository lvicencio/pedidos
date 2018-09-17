@extends('layouts.app')

@section('title', 'Listado de Productos')
 

@section('content')


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">
      

      <div class="section text-center">
        <h2 class="title">Listado de Productos</h2>
        <div class="team">
          <div class="row">

            <div class="mx-auto" style="width: 100px;">
             <a href="{{ url('/admin/products/create') }}" class="btn btn-info btn-round">Nuevo Producto</a>
        </div>
            

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="col-md-2">Nombre</th>
                    <th class="col-md-4" scope="col">Descripción</th>
                    <th>Categoria</th>
                    <th class="text-right">Precio</th>
                    <th class="text-right">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category ? $product->category->name : 'Generico'}}</td>
                    <td>&dollar;{{ $product->price }}</td>
                    <td class="td-actions text-right">
                      <form method="post" action="{{ url('/admin/products/'.$product->id.'/delete') }}">
                         {{ csrf_field() }}
                      <a href=""type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-sm" >
                        <i class="fa fa-info"></i>
                      </a> 
                      <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-sm" >
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{ url('/admin/products/'.$product->id.'/images') }}" type="button" rel="tooltip" title="Imagenes" class="btn btn-warning btn-simple btn-sm" >
                        <i class="fa fa-image"></i>
                      </a> 
                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-sm" >
                          <i class="fa fa-times"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>


              <div class="section text-center">
                {{$products->links("pagination::bootstrap-4")}} 
              </div>

              
          </div>
        </div>
      </div>

    
    </div>
  </div>

@include('includes.footer')
@endsection
