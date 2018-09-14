@extends('layouts.app')

 @section('title', 'Bienvenidos')

@section('content')


 


  <div class="main main-raised">
    <div class="container">



      <div class="section text-center">

        <h2 class="title">Registrar Nuevo Producto</h2>
        <hr>

        <form method="post" action="{{ url('/admin/products') }}">
         {{ csrf_field() }}

     
            <div class="form-group col-md-6">
              <label class="control-label">Nombre</label>
              <input type="text" class="form-control" name="name" placeholder="Nombre">
            </div>

            <div class="form-group col-md-6">
              <label for="inputPassword4">Resumen</label>
              <input type="text" class="form-control" name="description" placeholder="Descripción">
            </div>

            
            <div class="form-group col-md-6">
              <label for="inputPassword4">Precio</label>
              <input type="number" class="form-control" name="price" placeholder="Password">
            </div>
       
            <div class="form-group col-md-6">
              <label for="inputPassword4">Descripción</label>
              <textarea class="form-control" rows="4" placeholder="Descripción del producto" name="long_description"></textarea>
            </div>
 
        <button type="submit" class="btn btn-info">Guardar</button>
        </form>


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
