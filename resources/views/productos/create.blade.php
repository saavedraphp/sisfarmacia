@extends('layouts.app')

@section('content')
@inject('empresas','App\Services\Empresas')
@inject('presentaciones','App\Services\Presentaciones')

@section('scripts')
<script src="{{asset('js/productos.js') }}" ></script>

@endsection

<div class="container">

<div class="row">
<div class="col-md-8">
    @if ($errors->any())
    <div class="alert alert-danger">
      <h4>Por Favor corriga los siguientes errores   </h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif

<form action="/admin/productos" method="POST" id="frm_formulario" @submit="checkForm">
@csrf

  <p v-if="errors.length">
    <b style="color: red;">Por favor, corrija el(los) siguiente(s) error(es):</b>
    <ul>
      <li v-for="error in errors">@{{error}}</li>
    </ul>
  </p>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="producto">Producto *</label>
      <input type="text" class="form-control" v-model="producto" name="producto" id="producto" placeholder="Nombre" value="{{old('producto')}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Codigo</label>
      <input type="text" class="form-control" name="codigo_producto" id="inputPassword4" placeholder="Codigo" value="{{old('codigo_producto')}}">
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputAddress">Sku</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="sku" name="sku" value="{{old('sku')}}">

    </div>

    <div class="form-group col-md-6">
        <label for="inputAddress">Ean</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Ean" name="ean" value="{{old('ean')}}">
    </div>
  </div>








  <div class="form-row">


  <div class="form-group col-md-6">
      <label for="inputPassword4">Lote</label>
      <input type="text" class="form-control" name="lote" id="inputPassword4" placeholder="Lote" value="{{old('lote')}}">
    </div>


    <div class="form-group col-md-6">
      <label for="inputPassword4">Serie</label>
      <input type="text" class="form-control" name="serie" id="inputPassword4" placeholder="Serie" value="{{old('serie')}}">
    </div>

    
  </div>




  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cbo_presentacion">Presentacion</label>

      <select class="form-control" aria-label="Default select example" name="cbo_presentacion" id="cbo_presentacion_id"
      v-model="cbo_presentacion_id">
      {{$guion  =""}};
        @foreach ($presentaciones->get() as $index => $value)
        
          <option value="{{$index}}" >{{$index.$guion.$value}}</option>
            {{$guion  =" - "}};
        @endforeach
      </select>
 
   </div>


    <div class="form-group col-md-6">
        <label for="inputAddress">Precio</label>
        <input type="number" class="form-control" id="inputAddress" placeholder="Precio" name="precio" value="{{old('precio')}}">
    </div>
    
  </div>



 

 
  <div class="form-group">
    
  <label for="empresa_id">Empresa</label>
      <select v-model="empresa_id" id="empresa_id" data-old="{{old('cbo_empresa')}}"
      name="cbo_empresa"  class="form-control">
      {{$guion  =""}};
        @foreach ($empresas->get() as $index => $value)
        
          <option value="{{$index}}" >{{$index.$guion.$value}}</option>
            {{$guion  =" - "}};
        @endforeach
        
      </select>
 
  </div>




    <div class="form-group">
      <label for="inputEmail4">Comentario</label>
      <textarea class="form-control" id="comentario_id" name="comentario" rows="3" placeholder="Comentario"></textarea>
    </div>
 



  <button type="submit" class="btn btn-primary">Registrar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>

</form>
</div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/productos.js') }}" ></script>

@endsection