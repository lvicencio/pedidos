@extends('layouts.app')

@section('title', 'Listado de Productos')
 

@section('content')


  <div class="main main-raised">
    <div class="container">
      

      <div class="section text-center">
        <h2 class="title">Listado de Productos</h2>
        <div class="team">
          <div class="row">

            <div class="mx-auto" style="width: 200px;">
             <a href="{{ url('/admin/products/create') }}" class="btn btn-info btn-round">Nuevo Producto</a>
        </div>
            

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
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
                      <button type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-sm" >
                        <i class="fa fa-info"></i>
                      </button>
                      <button type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-sm" >
                        <i class="fa fa-edit"></i>
                      </button>
                      <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-sm" >
                        <i class="fa fa-times"></i>
                      </button>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>


              <div align="center">
                {{ $products->links() }}
              </div>
          </div>
        </div>
      </div>

    
    </div>
  </div>


 <footer class="footer">
      <div class="container">
        <nav class="float-left">
          
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, realizado por  Luis V
        </div>
      </div>
    </footer>



@endsection
