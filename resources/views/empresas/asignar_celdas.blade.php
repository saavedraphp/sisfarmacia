@extends('layouts.app')

@section('content')



<div class="container">

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

@if(Session::get('operacion')=='1')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@if(Session::get('operacion')=='0')
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>

@endif



<form action="{{route('upload_mages',$empresa->empr_id)}}" method="POST" 
id="frm_formulario"  >

@csrf

 

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Empresa</label>
      {{$empresa->empr_nombre}}  -  {{$empresa->empr_ruc}}
    </div>
  </div>


 


  <div class="form-row">
  

  <div class="form-group col-md-4">
      <button type="button" class="list-group-item list-group-item-action active"> Racks </button>
      @foreach($racks as $rack)
      <button type="button" class="list-group-item list-group-item-action" @click="obtenerCasillas({{$rack->rack_id}})" >{{$rack->rack_nombre}}</button>
      @endforeach
  </div>


  <div class="form-group col-md-4">
      <ul class="list-group" id="casillas_id">
          <li class="list-group-item active" aria-current="true">Celdas</li>
          <li class="list-group-item"  v-for="option in casillas_rack" v-bind:value="option.value"  >@{{ option.rc_nombre }} - 
          <a href="#"  @click="asignarCasilla(option)"><i class="fas fa-plus-circle" style="font-size: 12px;"></i></a></li>
      </ul>
    
  </div>



  <div class="form-group col-md-4">
  <ul class="list-group" id="casillas_id">
          <li class="list-group-item active" aria-current="true">Celdas</li>
          <li class="list-group-item"  v-for="(option, index) in casillas_empresa" v-bind:value="option.value"  >@{{ option.rc_nombre }} - 
          <a href="#"  @click="quitarCasilla(index)"><i class="fas fa-minus-circle" style="font-size: 12px;"></i></a></li>
      </ul>
    
  </div>



  </div>

 

  <button type="submit" class="btn btn-primary">Grabar Cambios</button>

  @if(!empty($empresa->empr_ruta_img_reporte))
    <a href="{{route('dropImages',$empresa->empr_id)}}" 
    onclick="return confirm('Estas Seguro de Borrar la Imagen de la Empresa Id:{{$empresa->empr_id}}');">
    <button type="button" class="btn btn-danger">Eliminar Imagen</button></a>
  @endif
</form>
</div>
</div>
</div>
@endsection
@section('scripts')

<script>
  const url = '{{ env('MY_URL') }}';
</script>

<script src="{{asset('js/casillasEmpresa.js') }}" ></script>

@endsection