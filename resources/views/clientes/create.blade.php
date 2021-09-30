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


   
<form action="/clientes" method="POST" id="frm_formulario"  > 
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
       <span class="text-danger"  v-if="errores.nombre.length>0"> @{{errores.nombre}}  </span>
      <input type="text" v-model="nombre"  class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{old('nombre')}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <span class="text-danger"  v-if="errores.email.length>0"> @{{errores.email}}  </span>
      <input type="text" v-model="email" class="form-control" name="email" id="inputPassword4" placeholder="Email" value="{{old('email')}}">
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Direccion</label>
    <input type="text"  v-model="direccion" class="form-control" id="inputAddress" placeholder="Direccion" name="direccion" value="{{old('direccion')}}">
  </div>


  <div class="form-row">
    <div class="form-group col-md-4" id="div_pais">
      <label for="inputCity">Pais</label>
      <select v-model="selected_pais" id="pais" data-old="{{old('cbo_pais')}}"
      @change="loadStates" name="cbo_pais"  class="form-control">
        @foreach ($paises->get() as $index => $value)
          <option value="{{$index}}" >{{$value}}</option>
        @endforeach
      </select>


    </div>


    <div class="form-group col-md-4">
      <label for="inputCity">Estado</label>

       <select v-model="selected_estado" id="estado" data-old="{{old('cbo_estado')}}"  
       @change="loadcity" name="cbo_estado" class="form-control" >
        <option value="">Selecciona una Estado</option>
        <option v-for="(state, index) in states" v-bind:value="index">@{{state}}</option>
        </select>

    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Ciudad</label>
     
      <select  v-model="selected_city"  id="ciudad" data-old="{{old('cbo_ciudad')}}"  
       name="cbo_ciudad" class="form-control" >

       <option value="">Selecione un Ciudad</option>
       <option  v-for="(city, index) in cities" v-bind:value="index">
         @{{city}} </option>
      </select>
    </div>
  </div>


   <div class="form-group">
    <label for="inputZip">Teléfono</label>
      <input type="text" v-model="telefono" class="form-control" id="telefono" name="telefono">
    </div>





  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>


  <button type="button" @click="checkForm()" class="btn btn-primary">Registrar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>

</form>
</div>
</div>
</div>
@endsection
<script>


</script>


@section('scripts')

<script src="{{ asset('js/estado.js') }}" ></script>


@endsection