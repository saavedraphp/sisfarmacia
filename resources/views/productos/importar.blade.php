@extends('layouts.app')

@section('content')

<div class="container">



   
<h2>Importar Data de Excel 
  
  

</h2>
 


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
 




<form action="{{route('products.import.excel')}}" method="POST" 
id="frm_formulario" enctype="multipart/form-data" name="frm_formulario"  @submit="checkForm">

@csrf
<p v-if="errors.length">
    <b style="color: red;">Por favor, corrija el(los) siguiente(s) error(es):</b>
    <ul>
      <li v-for="error in errors">@{{error}}</li>
    </ul>
  </p>


  <div class="form-group">
        <label for="inputAddress">Imagen</label>
        <div class="input-group mb-3">

            <div class="input-group-prepend">
                <span class="input-group-text">Archivo</span>
            </div>

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="id_imagen"    ref="imagen" name="img">
                <label class="custom-file-label" for="inputGroupFile01">Seleccione Archivo</label>
            </div>
        
        </div>
      


  </div>

  
  <div class="form-group">
  <label for="inputAddress">Cantidad de Productos por Proveedor</label>

    <ul>
    @foreach($proveedores as $proveedor) 
        <li>   <input class="form-check-input" type="radio" name="rbo_proveedor" v-model="v_rbo_proveedor" 
        value="{{$proveedor->prov_code}}"  >{{$proveedor->cantidad}} - {{$proveedor->prov_nombre}}
        </li>
    @endforeach
    </ul>


  </div>

  <div class="form-group">
      <div class="col-md-4">
          <label for="fechaNacimiento">Fecha del excel</label>
            <span class="asteriskField">*</span>
          
            <input class="form-control" id="fecha_id" name="fecha"    v-model="v_fecha"
            placeholder="YYYY-MM-DD" type="text"  />
      </div>
      
   </div>

 
  <button type="submit" class="btn btn-primary">Cargar Datos</button>

  <p></p><br><br><br><br><br>
  <p></p>
<hr><h2 style="color:#2F993A"> Datos Informativos</h2>

  <div class="form-group">
    <label for="inputAddress">Por favor mantener el ORDEN y FORMATO de los campos</label>
    <img src="{{ asset('img/formato_excel.jpg') }}" alt="Formato de excel"   >
  </div>



  <div class="form-group">
    <ul>
    <li>Sin filtros <img src="{{ asset('img/filtro.jpg') }}" alt="Filtro de excel"   ></li>
    <li>Sin cabeceras</li>
    <li>Sin Formatos: Ejemplo S/.</li>
    </ul>
    
  </div>




 
</form> 
 
</div>
 @endsection



@section('scripts')

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


 
<script>
  const url = '{{ env('MY_URL') }}';
  
</script>
<script src="{{asset('js/frm_importar.js') }}" ></script>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="fecha"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})

</script>

@endsection