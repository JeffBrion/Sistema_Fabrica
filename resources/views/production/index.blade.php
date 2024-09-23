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
                    @if (isset($worker))
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Trabajador Seleccionado</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" readonly required value="{{ $worker->name }}">
                        <input type="hidden" name="id_worker" value="{{ $worker->id }}">
                    </div> 
                    @else
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Seleccione el Trabajador</label>
                        <select  class="form-control selectwork" id="exampleFormControlInput1"  name="id_worker"  required>
                            <option  value="0" disabled selected>Escriba el Nombre</i>
                            @foreach ($trabajador as $worker)
                             <option value="{{ $worker->id }}">{{ $worker->name }} {{ $worker->last_name }}</option>
                            @endforeach
                          </select>
                    </div>  
                    @endif
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
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Seleccione el Área</label>
                            <select  class="form-control" id="exampleFormControlInput1" name="role"  required>
                                <option disabled selected>Seleccione ↓</option>                           
                                @foreach ($area as $areas )
                                <option value="{{ $areas->id }}">{{ $areas->name }}</option>
                                @endforeach
                            </select>
                        </div>  
                    </div> 
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fecha de Finalización</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="end_date"  required>
                    </div> 
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">Agregar Producto</button>
                </div>
        </div>
    </form>
</div> 

<script>
    $(document).ready(function() {
        $('.selectwork').select2({
            minimumInputLength: 1, 
                placeholder: 'Selecciona 1 opción'
        });
    
    });
</script>
@endsection