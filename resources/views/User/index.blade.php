@extends('Layout.Layout');
@section('body')
<h3> Agregar Usuario</h3>
<hr class="separador">
<div class="container card  p-4">
    <form action="{{ route('register') }}" method="Post" name="user_form" >
        @csrf
        <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Nombre de Usuario</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" required>
                    </div>      
                </div>
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email"  required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Rol del Usuario</label>
                        <select  class="form-control" id="exampleFormControlInput1" name="role"  required>
                            <option disabled selected>Seleccione Rol</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Recursos Humanos" >Recursos Humanos</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Usuario">Usuario</option>
                          </select>
                    </div>  
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">Agregar Usuario</button>
                </div>
        </div>
    </form>
</div> 
<h3 class="mt-3"> Usuarios Agregados</h3>
<hr class="separador">
<div class="container card p-4">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Usuario</th>
            <th scope="col">Correo</th>
            <th scope="col">Rol</th>
            <th colspan="2">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td> 
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $user->id }}"><i class="fa-solid fa-pen"></i></button>
                    <form action="{{ route('usuario_eliminar', $user->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            
            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('editar_usuario',$user->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Nombre de Usuario</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" required value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Correo Electrónico</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="email" required value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Rol</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="role" required value="{{ $user->role }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Contraseña</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="password" required value="{{ $user->password }}">
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
            <li class="page-item"> <a class="page-link" href="{{ $users->previousPageUrl()}}" >Anterior</a></li>
            <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Siguiente</a></li>
        </ul>
      </nav>
</div>

@endsection