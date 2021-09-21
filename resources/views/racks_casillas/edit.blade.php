@extends('layouts.app')

@section('content')


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

<form action="{{route('casillas.update',$casillas->rc_id)}}" method="POST" id="frm_formulario" @submit="checkForm">
@method('PATCH')
@csrf

  <p v-if="errors.length">
    <b style="color: red;">Por favor, corrija el(los) siguiente(s) error(es):</b>
    <ul>
      <li v-for="error in errors">@{{error}}</li>
    </ul>
  </p>





    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="producto">Rack *</label>
            <select class="form-control" name="cbo_rack_id" id="selected_rack" v-model="selected_rack">
            <option value="">Seleccione un Rack</option>
                @foreach($filas as $item)
                <option value="{{$item->rack_id}}"  @if($casillas->rack_id ==$item->rack_id) selected @endif>{{$item->rack_nombre}}</option>
                
                @endforeach
            </select>
        </div>
    </div>


  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="producto">Casilla *</label>
      <input type="text" class="form-control" v-model="nombre" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" name="nombre" id="nombre" placeholder="Nombre" value="{{$casillas->rc_nombre}}">
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
<script src="{{asset('js/racks_casillas.js') }}" ></script>

@endsection