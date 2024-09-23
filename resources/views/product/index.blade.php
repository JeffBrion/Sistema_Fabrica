@extends('Layout.layout')
@section('body')
<h3> Agregar Producto</h3>
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
    <form action="{{ route('create_product') }}" method="Post" name="user_form" >
        @csrf
        <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Nombre del Producto</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Precio del producto</label>
                        <input type="number" step="any"step=".01" class="form-control" id="exampleFormControlInput1" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Decripción</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="description"  required>
                    </div>     
                </div>
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Largo del Producto</label>
                        <input type="number" step="any"step=".01"class="form-control" id="exampleFormControlInput1" name="large"  required>
                    </div> 
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Diametro del Producto</label>
                        <input type="number" step="any"step=".01" class="form-control" id="exampleFormControlInput1" name="diameter"  required>
                    </div> 
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">Agregar Producto</button>
                </div>
        </div>
    </form>
</div> 
<h3 class="mt-3"> Productos Agregados</h3>
<hr class="separador">
<div class="container card p-4">
    <table class="table">
        <thead>
          <tr class="table-secondary">
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Diametro</th>
            <th scope="col">Largo</th>
            <th scope="col">Descripción</th>
            <th colspan="2">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product )
            <tr class="table-primary">
                <th>{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }} <b>C$</b></td>
                <td>{{ $product->diameter }} <b>cm</b></td>
                <td>{{ $product->large }} <b>cm</b></td>
                <td>{{ $product->description }}</td>
                <td> 
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen"></i></button>
                    <form action="{{ route('producto_eliminar', $product->id) }}" method="POST" style="display: inline">
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
                        <form action="{{ route('producto_editar', $product->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Nombre del Producto</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" value="{{ $product->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Precio del producto</label>
                                <input type="number" step="any"step=".01" class="form-control" id="exampleFormControlInput1" name="price"  value="{{ $product->price }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Largo del Producto</label>
                                <input type="number" step="any"step=".01" class="form-control" id="exampleFormControlInput1" name="large"   value="{{ $product->large }}" required>
                            </div>     
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Diametro del Producto</label>
                                <input type="number" step="any"step=".01"class="form-control" id="exampleFormControlInput1"  value="{{ $product->diameter}}" name="diameter"  required>
                            </div> 
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Descripción del Producto</label>
                                <input type="text"  class="form-control" id="exampleFormControlInput1" value="{{ $product->description }}"  name="description"  required>
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
            <li class="page-item"> <a class="page-link" href="{{ $products->previousPageUrl()}}" >Anterior</a></li>
            <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Siguiente</a></li>
        </ul>
      </nav>
</div>
@endsection