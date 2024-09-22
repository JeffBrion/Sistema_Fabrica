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
                    <button class="btn btn-primary" type="submit">Agregar Usuario</button>
                </div>
        </div>
    </form>
</div> 
@endsection