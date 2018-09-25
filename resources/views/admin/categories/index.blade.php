@extends('layouts.app')

@section('title', 'Listado de Categorias')
 

@section('content')


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">
      

      <div class="section text-center">
        <h2 class="title">Listado de Categorias</h2>
         @if (session('notification'))
                <div class="alert alert-success">
                     {{ session('notification') }} <br>
                </div>
          @endif 
          @if (session('noti'))
                <div class="alert alert-danger">
                     {{ session('noti') }} <br>
                </div>
          @endif 

        <div class="team">
          <div class="row">

            <div class="mx-auto" style="width: 100px;">
             <a href="{{ url('/admin/categories/create') }}" class="btn btn-info btn-round">Nueva Categoria</a>
        </div>
            

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="col-md-2">Nombre</th>
                    <th class="col-md-4" scope="col">Descripción</th>
                    <th class="text-right">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="td-actions text-right">
                      <form method="post" action="{{ url('/admin/categories/'.$category->id.'/delete') }}">
                         {{ csrf_field() }}
                      <a href="{{ url('/admin/categories/'.$category->id) }}"type="button" rel="tooltip" title="Ver Categoria" class="btn btn-info btn-simple btn-sm" >
                        <i class="fa fa-info"></i>
                      </a> 
                      <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar Categoria" class="btn btn-success btn-simple btn-sm" >
                        <i class="fa fa-edit"></i>
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
                {{$categories->links("pagination::bootstrap-4")}} 
              </div>

              
          </div>
        </div>
      </div>

    
    </div>
  </div>

@include('includes.footer')
@endsection
