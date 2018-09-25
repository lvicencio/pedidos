@extends('layouts.app')

 @section('title', 'Bienvenidos')

@section('content')


 


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">

        <h2 class="title">Editar Producto {{ $product->name }}</h2>
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
        <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
         {{ csrf_field() }}

     
            <div class="form-group col-md-6">
              <label class="control-label">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
            </div>


            <div class="form-group col-md-6">
              <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
              <select class="custom-select" name="category_id">
                <option value="0">General</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                    @if($category->id == old('category_id', $product->category_id))
                     selected
                    @endif >
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="inputPassword4">Resumen</label>
              <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">
            </div>

            
            <div class="form-group col-md-6">
              <label for="inputPassword4">Precio</label>
              <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}">
            </div>
       
            <div class="form-group col-md-6">
              <label for="inputPassword4">Descripción</label>
              <textarea class="form-control" rows="4"  name="long_description">{{ old('long_description', $product->long_description) }}</textarea>
            </div>
 
        <button type="submit" class="btn btn-info">Actualizar Cambios</button>
        <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar </a>
        </form>


      </div>
     

    </div>
  </div>

@include('includes.footer')
@endsection
