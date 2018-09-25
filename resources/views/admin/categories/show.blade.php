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
          <div class="col">
           
          
          </div>
       </div>




      </div>
     

    </div>
  </div>

@include('includes.footer')
@endsection
