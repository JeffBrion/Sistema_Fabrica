@extends('Layout.layout')
@section('body')
<h3> Agregar Área</h3>
<hr class="separador">
<div class="container card  p-4">
    <form action="{{ Route('create_area') }}" method="Post" name="user_form" >
        @csrf
        <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Nombre del Area</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" required>
                    </div>   
                </div>
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="description" >
                    </div> 
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">Agregar Área</button>
                </div>
        </div>
    </form>
</div> 
<h3 class="mt-3"> Areas Agregadas</h3>
<hr class="separador">
<div class="container card p-4">
    <table class="table ">
        <thead>
          <tr class="table-secondary">
            <th scope="col">Id</th>
            <th scope="col">Nombre del Área</th>
            <th scope="col">Descripción</th>
            <th colspan="2">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($areas as $area)
            <tr class="table-primary">
                <th>{{ $area->id }}</th>
                <td>{{ $area->name}}</td>
                <td>{{ $area->description}}</td>
                <td> 
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen"></i></button>
                    <form action="{{ route('area_eliminar', $area->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onsubmit="confirmarEnvio(event)"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('editar_area', $area->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Nombre</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" required value="{{ $area->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Descripción</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="description" required value="{{ $area->description }}">
                            </div>  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="Submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
            @endforeach
       
        </tbody>
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination mt-3">
            <li class="page-item"> <a class="page-link" href="" >Anterior</a></li>
            <li class="page-item"><a class="page-link" href="">Siguiente</a></li>
        </ul>
      </nav>
</div>

@endsection