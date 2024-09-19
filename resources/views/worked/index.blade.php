@extends('Layout.layout');
@section('body')
<h3> Agregar Trabajador</h3>
<hr class="separador">
<div class="container card  p-4">
    @if (session('error'))
    <div class="alert alert-warning" role="alert">
       {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
       {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('create_worker') }}" method="Post" name="user_form" >
        @csrf
        <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Primer Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="last_name" required>
                    </div>      
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Numero de Teléfono</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="numbre_phone">
                    </div> 
                </div>
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="middle_name" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="middle_last_name" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Seleccione el Área</label>
                        <select  class="form-control" id="exampleFormControlInput1" name="area"  required>
                            <option  value="0" disabled selected>Seleleccione</i>
                            @foreach ($areas as $area)
                             <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                          </select>
                    </div>  
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">Agregar Usuario</button>
                </div>
        </div>
    </form>
</div> 
<h3 class="mt-3"> Trabajadores Agregados</h3>
<hr class="separador">
<div class="container card p-4">
    <table class="table">
        <thead>
          <tr class="table-secondary">
            <th scope="col">Id</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Segundo Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Número de Telefono</th>
            <th scope="col">Área</th>
            <th colspan="2">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker )
            <tr class="table-primary">
                <th>{{ $worker->id }}</th>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->middle_name }}</td>
                <td>{{ $worker->last_name }}</td>
                <td>{{ $worker->middle_last_name }}</td>
                <td>{{ $worker->email }}</td>
                <td>{{ $worker->numbre_phone }}</td>
                <td>{{ $worker->area->name }}</td>
                <td> 
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen"></i></button>
                    <form action="{{ route('worker_delete', $worker->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
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
                        <form action="{{ route('edit_worker', $worker->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Primer Nombre</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" required value="{{$worker->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Segundo Nombre</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="middle_name" required value="{{$worker->middle_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Primer Apellido</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="last_name" required value="{{ $worker->last_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Segundo Apellido</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="middle_last_name" required value="{{ $worker->middle_last_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Correo Electronico</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"  name="email" required value="{{ $worker->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Célular</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="numbre_phone" required value="{{ $worker->numbre_phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Seleccione el Área</label>
                                <select  class="form-control" id="exampleFormControlInput1" name="area"  required>
                                    <option  value="{{ $worker->area->id }}" selected>{{ $worker->area->name }}</i>
                                    @foreach ($areas as $area)
                                     <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                  </select>
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
        <ul class="pagination">
            <li class="page-item"> <a class="page-link" href="" >Anterior</a></li>
            <li class="page-item"><a class="page-link" href="">Siguiente</a></li>
        </ul>
      </nav>
</div>
    
@endsection