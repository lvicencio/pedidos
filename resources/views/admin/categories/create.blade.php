@extends('layouts.app')

 @section('title', 'Categorias')

@section('content')

  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">

        <h2 class="title">Registrar Nueva Categoria</h2>
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

        <form method="post" action="{{ url('/admin/categories') }}">
         {{ csrf_field() }}

     
            <div class="form-group col-md-6">
              <label class="control-label">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
       
            <div class="form-group col-md-6">
              <label for="inputPassword4">Descripción</label>
              <textarea class="form-control" rows="4" name="description">{{ old('description') }}</textarea>
            </div>
 
        <button type="submit" class="btn btn-info">Guardar</button>
        <a href="{{ url('/admin/categories') }}" class="btn btn-info">Cancelar</a>
        </form>


      </div>
     

    </div>
  </div>
@include('includes.footer')
@endsection
