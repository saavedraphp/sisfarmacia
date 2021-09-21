@extends('layouts.app')

@section('content')


@inject('paises','App\Services\Paises')
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

<form action="/admin/empresas" method="POST"  id="frm_formulario" @submit="checkForm">
@csrf

<p v-if="errors.length">
    <b style="color: red;">Por favor, corrija el(los) siguiente(s) error(es):</b>
    <ul>
      <li v-for="error in errors">@{{error}}</li>
    </ul>
  </p>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Empresa</label>
      <input type="text" class="form-control" v-model="nombre_id" name="nombre" id="nombre_id" placeholder="Nombre" value="{{old('nombre')}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Ruc</label>
      <input type="number"   onKeyPress="if(this.value.length==11) return false;"   class="form-control" name="ruc" id="inputPassword4" placeholder="Ruc" value="{{old('ruc')}}">
    </div>
  </div>


  <div class="form-group">
    <label for="inputAddress">Direccion</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Direccion" name="direccion" value="{{old('direccion')}}">
  </div>

  <div class="form-group">
    <label for="inputAddress">Email</label>
    <input   type="text" class="form-control"   v-model="correo_id"  id="correo_id" placeholder="Email" name="correo" 
    value="{{old('correo')}}"  @blur="existeEmail" >
    <span    v-if="encontroEmail" class="alert alert-danger">El correo existe en nuestra base de datos</span>
  </div>


  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputPassword4">Celular</label>
      <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" class="form-control" v-model="celular_id" name="celular" id="celular_id" placeholder="Celular" value="{{old('celular')}}">
    </div>


    <div class="form-group col-md-6">
      <label for="inputEmail4">Telefono</label>
      <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" class="form-control" name="telefono" id="inputEmail4" placeholder="Telefono" value="{{old('telefono')}}">
    </div>

  </div>

 

  <button type="submit" class="btn btn-primary">Registrar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>

</form>
</div>
</div>
</div>
@endsection
@section('scripts')
<script>
  const url = '{{ env('MY_URL') }}';
  
</script>
<script src="{{asset('js/frm_empresa.js') }}" ></script>
@endsection