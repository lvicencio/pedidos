@extends('layouts.app')

@section('title', 'Listado de Imagenes')
 

@section('content')


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">
      

      <div class="section">
        <h2 class="title text-center">Imagenes del Producto "{{ $product->name }}"</h2>
        <div class="team">

          <div class="card">
            <div class="card-body">
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="photo" required>
                 <button type="submit" class="btn btn-info btn-round">Subir Imagen</button>
                 <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver a Productos</a> 
              
              </form>
            </div>
          </div>

          <div class="row">
            @foreach($images as $image)
            
              <div class="card col-md-4">
                <div class="card-body">
                  <img src="{{ $image->url }}" width="250" height="250">
                  <form action="" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                    <button type="submit" class="btn btn-danger btn-round">Eliminar Imagen</button>  
                    @if($image->featured)
                    <button type="button" class="btn btn-warning btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada">
                      <i class="material-icons">favorite</i>
                    </button>
                    @else
                    <a href="{{ url('/admin/products/'.$product->id.'/images/featured/'.$image->id) }}" class="btn btn-info btn-fab btn-fab-mini btn-round">
                      <i class="material-icons">favorite</i>
                    </a>
                    @endif
                  </form>
                  
                </div>
              </div>
           
            @endforeach
          </div>


        </div>
      </div>

    
    </div>
  </div>

@include('includes.footer')
@endsection
