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
                        <input type="text" class="form-control" id="product-price" name="price" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Producto Realizado</label>
                        <input type="number" class="form-control" name="total_product" >
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
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha de Producción</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="date"  required>
                        </div> 
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
            <th scope="col">Cantidad Elaborada</th>
            <th scope="col">Salario</th>
            <th scope="col">Fecha</th>
            <th colspan="1">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($productions as $production )
            <tr class="table-primary">
                <th>{{ $production->worker->name}} {{ $production->worker->last_name}}</th>
                <td>{{ $production->product->name }}</td>
                <td>{{ $production->product->price }} </td>
                <td>{{ $production->total_product }} </td>
                <td>{{ $production->payment }}</td>
                <td>{{ $production->date }} </td>
                <td> 
                    <form action="{{ route('produccion_eliminar', $production->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>    
            </tr>
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