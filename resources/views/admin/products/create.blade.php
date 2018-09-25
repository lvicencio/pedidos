@extends('layouts.app')

 @section('title', 'Bienvenidos')

@section('content')


 


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">

        <h2 class="title">Registrar Nuevo Producto</h2>
        <hr>

          @if($errors->any())
          <div class="alert alert-danger" role="alert">
              <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach

              </ul>
          </div>
        @endif

        <form method="post" action="{{ url('/admin/products') }}">
         {{ csrf_field() }}

     
            <div class="form-group col-md-6">
              <label class="control-label">Nombre</label>
              <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">
            </div>

           <div class="form-group col-md-6">
              <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
              <select class="custom-select" name="category_id">
                <option value="0">General</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="inputPassword4">Resumen</label>
              <input type="text" class="form-control" name="description"  value="{{ old('description') }}"placeholder="Descripción">
            </div>

            
            <div class="form-group col-md-6">
              <label for="inputPassword4">Precio</label>
              <input type="number" class="form-control" name="price"   value="{{ old('price') }}" placeholder="Precio">
            </div>
       
            <div class="form-group col-md-6">
              <label for="inputPassword4">Descripción</label>
              <textarea class="form-control" rows="4" placeholder="Descripción del producto" name="long_description"> {{ old('long_description') }}</textarea>
            </div>
 
        <button type="submit" class="btn btn-info">Guardar</button>
        </form>


      </div>
     

    </div>
  </div>
@include('includes.footer')
@endsection
