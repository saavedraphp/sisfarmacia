@extends('layouts.app')

@section('content')


@inject('paises','App\Services\Paises')
@inject('documentos','App\Services\Documentos')
 
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
  <?php //echo @$cliente?>
    <div class="form-group col-md-4">
    <input type="hidden"  class="form-control" v-model="id" name="id" id="id"  value="{{@$cliente->id}}">

            <label for="cbo_presentacion">Tipo Documento *</label>
            <span class="text-danger"  v-if="errores.documentos.length>0"> @{{errores.documentos}}  </span>

            <select class="form-control" aria-label="Default select example" name="tipo_documento_id" id="tipo_documento_id" v-model="tipo_documento_id" >
              {{$guion =""}}
              @foreach ($documentos->get() as $index => $value)
              <option value="{{$index}}" <?php if(@$cliente->documento_identidad_id==$index) echo 'selected'?> >{{$index.$guion.$value}}</option>
              <?php $guion =" - "?>
              @endforeach
            </select>

     </div>

     <div class="form-group col-md-4">
      <label for="inputEmail4">Numero Documento </label>
       <span class="text-danger"  v-if="errores.numero_documento.length>0"> @{{errores.numero_documento}}  </span>
      <input type="text" v-model="numero_documento"  class="form-control" name="numero_documento" id="numero_documento" 
      placeholder="Numero Documento" value="{{@$cliente->nro_documento}}" >
    </div>


    <div class="form-group col-md-4">
      <label for="inputEmail4">Nombre legal </label>
       <span class="text-danger"  v-if="errores.nombre.length>0"> @{{errores.nombre}}  </span>
      <input type="text" v-model="nombre"  class="form-control" name="nombre" id="nombre" placeholder="Nombre"
       value="{{@$cliente->nombre}}">
    </div>

  </div>
  
  <div class="form-row">

      <div class="form-group col-md-8">
        <label for="inputAddress">Direccion</label>
        <input type="text"  v-model="direccion" class="form-control" id="direccion" placeholder="Direccion" name="direccion"
        value="{{@$cliente->direccion}}">
      </div>
      
      
      <div class="form-group col-md-4">
          <label for="inputZip">Tipo</label>
          <span class="text-danger"  v-if="errores.tipo_cliente.length>0"> @{{errores.tipo_cliente}}  </span>

          <select class="form-control" aria-label="Default select example" name="tipo_cliente_id" id="tipo_cliente_id"  
          v-model="tipo_cliente_id">
                  <option value="selected">Seleccione Tipo</option>
                  <option value="CLIENTE" <?php if(@$cliente->tipo_cliente=='CLIENTE') echo 'selected'?>>Cliente</option>
                  <option value="PROVEEDOR" <?php if(@$cliente->tipo_cliente=='PROVEEDOR') echo 'selected'?>>Proveedor</option>
                  <option value="CLIENTE/PROVEEDOR" <?php if(@$cliente->tipo_cliente=='CLIENTE/PROVEEDOR') echo 'selected'?>>Cliente/Proveedor</option>
                  
                  
          </select>    
      </div>

  </div>

 
  
  <div class="form-row">
    
    <div class="form-group col-md-4">
      <label for="inputZip">Teléfono</label>
        <input type="text" v-model="telefono" class="form-control" placeholder="Telefono"  id="telefono" name="telefono"
        value="{{@$cliente->telefono}}">
      </div>


    <div class="form-group col-md-4">
        <label for="inputPassword4">Email</label>
        <span class="text-danger"  v-if="errores.email.length>0"> @{{errores.email}}  </span>
        <input type="text" v-model="email" class="form-control" name="email" id="email" placeholder="Email" value="{{@$cliente->email}}">
      </div>


      <div class="form-group col-md-4">
            <label for="inputZip">Genero</label>
            <select class="form-control" aria-label="Default select example" name="genero_id" id="genero_id" 
            v-model="genero_id">
                    <option value="Select">Seleccione Genero</option>
                    <option value="F" <?php if(@$cliente->genero=='F') echo 'selected'?>>Femenino</option>
                    <option value="M" <?php if(@$cliente->genero=='M') echo 'selected'?>>Masculino</option>
                    
            </select>
      </div>
 

  </div>
 





  <div class="form-group">
          <label for="inputEmail4">Comentario</label>
          <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Comentario"
          v-model="comentario">{{@$cliente->comentario}}</textarea>
  </div>


 


  <button type="button" @click="checkForm()" class="btn btn-primary"><?php echo $valores['grabar']?></button>
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