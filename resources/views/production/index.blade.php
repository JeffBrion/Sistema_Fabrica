@extends('Layout.layout')

@section('body')
<h3> Agregar Producción</h3>
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
    <form action="{{ route('create_production') }}" method="Post" name="user_form" >
        @csrf
        <div class="row">
                <div class="col-md-6 mt-3">
                    @if (isset($worker))
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Trabajador Seleccionado</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" readonly required value="{{ $worker->name }}">
                        <input type="hidden" name="id_workers" value="{{ $worker->id }}">
                    </div> 
                    @else
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Seleccione el Trabajador</label>
                        <select  class="form-control selectwork" id="exampleFormControlInput1"  name="id_workers"  required>
                            <option  value="0" disabled selected>Escriba el Nombre</i>
                            @foreach ($trabajador as $worker)
                             <option value="{{ $worker->id }}">{{ $worker->name }} {{ $worker->last_name }}</option>
                            @endforeach
                          </select>
                    </div>  
                    @endif
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Precio del Producto</label>
                        <input type="text" class="form-control" id="product-price" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="start_date"  required>
                    </div>     
                </div>
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Seleccione el Producto</label required>
                            <select class="form-control" id="product-select" name="id_products" required>
                                <option disabled selected>Productos</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fecha de Finalización</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="end_date"  required>
                    </div> 
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Seleccione el Estado</label>
                        <select  class="form-control" id="exampleFormControlInput1" name="status"  required>
                            <option disabled selected>Estados</option>                           
                            <option value="Anulado">Anulado</option>    
                            <option value="En Proceso">En Proceso</option>     
                            <option value="Finalizado">Finalizado</option>                              
                        </select>
                    </div> 
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">Agregar Producción</button>
                </div>
        </div>
    </form>
</div> 
<h3 class="mt-3"> Producción</h3>
<hr class="separador">
<div class="container card p-4">
    <table class="table">
        <thead>
          <tr class="table-secondary">
            <th scope="col">Trabajador</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio del Producto</th>
            <th scope="col">Fecha de Inicio</th>
            <th scope="col">Fecha de Finalización</th>
            <th scope="col">Estado</th>
            <th scope="col">Salario</th>
            <th colspan="2">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($productions as $production )
            <tr @if ($production->status == 'En Proceso') class="table-warning"   @endif @if ($production->status == 'Finalizado') class="table-success"   @endif @if ($production->status == 'Anulado') class="table-danger"   @endif>
                <th>{{ $production->worker->name}} {{ $production->worker->last_name}}</th>
                <td>{{ $production->product->name }}</td>
                <td>{{ $production->product->price }} </td>
                <td>{{ $production->start_date }} </td>
                <td>{{ $production->end_date }} </td>
                <td>{{ $production->status }} </td>
                <td>{{ $production->payment }}</td>
                <td> 
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen"></i></button>
                    <form action="" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                
            </tr>
            
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            </div> --}}
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

<script>
    document.getElementById('product-select').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        document.getElementById('product-price').value = price;
    });

    $(document).ready(function() {
        $('.selectwork').select2({
            minimumInputLength: 1, 
                placeholder: 'Selecciona 1 opción'
        });
    
    });
</script>
@endsection