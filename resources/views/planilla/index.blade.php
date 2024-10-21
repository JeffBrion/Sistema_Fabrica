@extends('Layout.layout')
@section('body')
<h3> Generar Planilla</h3>
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
    <form action="{{ route('create_planilla') }}" method="Post" name="user_form" >
        @csrf
        <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Seleccione el Trabajador</label>
                        <select  class="form-control selectwork" id="exampleFormControlInput1"  name="workers_id"  required>
                            <option  value="0" disabled selected>Escriba el Nombre</i>
                            @foreach ($trabajador as $worker)
                             <option value="{{ $worker->id }}">{{ $worker->name }} {{ $worker->last_name }}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha de Inicio </label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="start_date"  required>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Observación</label>
                        <input type="text" class="form-control" id="product-price" name="description">
                    </div> 
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha de Finalización</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="end_date"  required>
                        </div> 
                    </div> 
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">Generar Planilla</button>
                </div>
        </div>
    </form>
</div> 
 <h3 class="mt-3"> Planillas</h3>
<hr class="separador">
<div class="container card p-4">
    <table class="table">
        <thead>
          <tr class="table-secondary">
            <th scope="col">Trabajador</th>
            <th scope="col">Fecha de Inicio</th>
            <th scope="col">Fecha de Finalización</th>
            <th scope="col">Observaciones</th>
            <th colspan="1">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($planillas as $planilla)
            <tr class="table-primary">
                <th>{{ $planilla->worker->name}} {{ $planilla->worker->last_name}}</th>
                <td>{{ $planilla->start_date }}</td>
                <td>{{ $planilla->end_date }} </td>
                <td>{{ $planilla->description }} </td>
                <td> 
                    <form action="" method="POST" style="display: inline">
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
    $(document).ready(function() {
        $('.selectwork').select2({
            minimumInputLength: 1, 
                placeholder: 'Selecciona 1 opción'
        });
    
    });
</script>
@endsection