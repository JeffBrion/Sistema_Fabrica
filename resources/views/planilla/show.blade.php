@extends('Layout.layout')
@section('body')
<h3 class="mt-3"> Planillas de {{ $worker_name }} {{ $worker_lastname }}</h3>
<hr class="separador">
<div class="container card p-4">
  <table class="table">
    <thead>
        <tr class="table-secondary">
        <th scope="col">Producto Total</th>
        <th scope="col">Pago</th>
        <th scope="col">Fecha de Producción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productions as $production )
        <tr class="table-primary">
            <th>{{ $production->total_product}}</th>
            <td>{{ $production->payment }} </td>
            <td>{{ $production->date }} </td>  
        </tr>
        @endforeach
    </tbody>
  </table>
  <h1>{{ $payment }}</h1>
</div>
@endsection