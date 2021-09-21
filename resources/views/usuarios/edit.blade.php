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

   
<form action="{{route('usuarios.update',$usuario->usua_id)}}" method="POST">
@method('PATCH')
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="inputEmail4" placeholder="Nombre" value="{{$usuario->usua_nombre}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="text" class="form-control" name="email" id="inputPassword4" placeholder="Email" value="{{$usuario->usua_email}}">
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Direccion</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="direccion" value="{{$usuario->usua_direccion}}">
  </div>
 
  <div class="form-row">
 
    <div class="form-group col-md-4">
      <label for="inputCity">Pais</label>
      <select v-model="selected_pais" id="pais" data-old="{{old('cbo_pais')}}"
      @change="loadStates" name="cbo_pais"  class="form-control">
        @foreach ($paises->get() as $index => $value)        
          <option value="{{$index}}" @if($usuario->pais_id===$index) selected @endif  
            >{{$value}}</option>  
        @endforeach
        
      </select>

    </div>

    <div class="form-group col-md-4">
      <label for="inputCity">Estado</label>
       <input type="text" id="estado_id" value="{{$usuario->estado_id}}">
     
       <select v-model="selected_estado" id="estado" data-old="{{old('cbo_estado')}}"  
       @change="loadcity" name="cbo_estado" class="form-control" >
        <option value="">Selecciona una Estado</option>
        <option v-for="(state, index) in states" v-bind:value="index">@{{state}}</option>
        </select>

    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Ciudad</label>
      <input type="text" id="ciudad_id" value="{{$usuario->ciudad_id}}">

      <select  v-model="selected_city"  id="ciudad" data-old="{{old('cbo_ciudad')}}"  
       name="cbo_ciudad" class="form-control" >

       <option value="">Selecione una Ciudad</option>
       <option  v-for="(city, index) in cities" v-bind:value="index">
         @{{city}} </option>
      </select>
    </div>
  </div>


   <div class="form-group">
    <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip"
      value="{{$usuario->usua_code_zip}}">
   </div>



   <div class="form-row">
      <div class="col-md-4">
          <label for="fechaNacimiento">Fecha Nacimiento</label>
            <span class="asteriskField">*</span>
          
            <input class="form-control" id="fechaNacimiento" name="fechaNacimiento" 
            placeholder="MM/DD/YYYY" type="text" value="{{$usuario->usua_f_nacimiento->format('m/d/Y')}}"/>
      </div>
     
   </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>




  <button type="submit" class="btn btn-primary">Actualizar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>

</form>
</div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/estado_edit.js') }}" ></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
 

<script>
	$(document).ready(function(){
		var date_input=$('input[name="fechaNacimiento"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})

</script>

@endsection