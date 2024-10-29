@extends('Layout.layout')
@section('body')

<div class="container my-5 p-4 border rounded">
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Planilla</h1>
      <div>
          <p class="mb-0">Periodo de Planilla: De  <strong>{{ $planilla->start_date }}</strong> hasta  <strong>{{ $planilla->start_date }} </strong></p>
      </div>
  </div>
  <div class="mb-4">
      <h4 class="fw-semibold">Información del Cliente</h4>
      <p class="mb-1">Nombre: <strong>{{ $worker->name }} {{ $worker->last_name }}</strong></p>
      <p class="mb-1">Correo Electronico: <strong>{{ $worker->email }}</strong></p>
      <p class="mb-1">Teléfono: <strong>{{ $worker->numbre_phone }}</strong></p>
  </div>
  <table class="table table-bordered table-striped">
      <thead class="table-dark">
          <tr>
              <th scope="col">Producto Total</th>
              <th scope="col">Pago</th>
              <th scope="col">Fecha de Producción</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($productions as $production )
          <tr>
              <td>C${{ $production->total_product}}</td>
              <td>C${{ $production->payment }}</td>
              <td>{{ $production->date }}</td>
          </tr>
          @endforeach
      </tbody>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $productions->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $productions->previousPageUrl() }}" tabindex="-1">Anterior</a>
            </li>
    
            @for ($i = 1; $i <= $productions->lastPage(); $i++)
                <li class="page-item {{ $productions->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $productions->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
    
            <li class="page-item {{ $productions->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $productions->nextPageUrl() }}">Siguiente</a>
            </li>
        </ul>
    </nav>
    
  </table>
  <div class="d-flex justify-content-end mt-4">
      <table class="table w-100">
          <tr>
              <td class="text-end"><strong>Subtotal:</strong></td>
              <td class="text-end">C${{ $payment }}</td>
          </tr>
          <tr>
              <td class="text-end"><strong>INSS (15%):</strong></td>
              <td class="text-end">C${{ $INSS }}</td>
          </tr>
          <tr>
            <td class="text-end"><strong>IR (7%):</strong></td>
            <td class="text-end">C${{ $IR }}</td>
        </tr>
          <tr>
              <td class="text-end"><strong>Total:</strong></td>
              <td class="text-end fw-bold">C${{ $pago_net }}</td>
          </tr>
      </table>
  </div>
</div>
@endsection