@extends('layouts.app')

@section('content')
@inject('empresas','App\Services\Empresas')
@inject('documentos','App\Services\Documentos') 
@inject('servicios','App\Services\Servicios') 
@inject('presentaciones','App\Services\Presentaciones')

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#home" class="nav-link active" data-toggle="tab">Acta</a>
    </li>
    <li class="nav-item">
        <a href="#profile" class="nav-link" data-toggle="tab">Registro de Productos</a>
    </li>
 
</ul>

<form  method="POST" name="frm_actas">
<div class="tab-content col-md-10" id="crud">


  <div class="tab-pane fade show active" id="home">
    
    @csrf
    <div class="form-group">
    
      <label for="inputAddress">Empresa</label>
        <select v-model="selected_empresa"  @change="obtenerProductos" id="empresa_id" data-old="{{old('cbo_empresa')}}"
        name="cbo_empresa"  class="form-control">
        {{$guion  =""}};
          @foreach ($empresas->get() as $index => $value)
          
            <option value="{{$index}}"  >{{$index.$guion.$value}}</option>
              {{$guion  =" - "}};
          @endforeach
        </select>
   
    </div>



 
    <div class="form-group">
      <label for="inputEmail4">Sub Cliente</label>
      <input type="text" class="form-control" name="sub_cliente" id="acta_sub_cliente_id" placeholder="Sub Cliente"
       value="{{old('acta_sub_cliente')}}" >
    </div>
 
 



    <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputAddress">Tipo de Documento</label>
          <select  id="tipo_documento_id" data-old="{{old('cbo_empresa')}}"
          name="tipo_documento"  class="form-control">
          {{$guion  =""}};
            @foreach ($documentos->get() as $index => $value)
            
              <option value="{{$index}}"  >{{$index.$guion.$value}}</option>
                {{$guion  =" - "}};
            @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          <label for="inputAddress">Nro Documento</label>
          <input type="text" class="form-control" name="nro_documento" id="nro_documento_id" placeholder="Nro Documento" 
          value="{{old('codigo_producto')}}">
      </div>
    </div>




    <div class="form-group">
        <label for="inputEmail4">Tipo de Servicio</label>
        <select  id="tipo_servicio_id" data-old="{{old('cbo_empresa')}}"
          name="tipo_servicio"  class="form-control">

          {{$guion  =""}};
            @foreach ($servicios->get() as $index => $value)
            
              <option value="{{$index}}" >{{$index.$guion.$value}}</option>
                {{$guion  =" - "}};
            @endforeach
            </select>    
    </div>


    
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputAddress">Precio</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Precio" name="precio"
         value="{{old('precio')}}">
     </div>

    </div>


    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputAddress">Comentario</label>
        <textarea class="form-control" id="comentario_id" name="comentario" rows="3"></textarea>
     </div>

    </div>

    


    <button type="button" onclick="grabarActa()" class="btn btn-primary">Registrar</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
    

  </div>

 



    <div class="tab-pane fade" id="profile">
    <p>&nbsp;</p>
    
    
 



 
        <div class="col-sm-12">
          <table class="table table-hover"  >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Lote</th>
                <th scope="col">Stock</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
              </tr>
            </thead>

            <tbody id="userList">
              <tr v-for="producto in data"   >
                <th class="item-{{$index}}" scope="row">@{{producto.prod_id}} 
                <input  type="hidden" class="form-control"     v-model="producto.prod_id"  size="3" name="prod_id[]" >
                </th>
                <td>@{{producto.prod_nombre}}</td>
                <td>@{{producto.prod_lote}}</td>
                <td>@{{producto.prod_stock}}</td>
                <td>
                    <input v-model="producto.valor"  @keyup.enter="modificarStock(producto)"  type="text" class="form-control"     size="3" placeholder="Cantidad"  
                          name="cantidad[]" value="0" maxlength="5"   >                
                </td>

                <td><p>@{{producto.total}}</p></td>
 
              </tr>
              
              <tr>
              <td colspan="6"><input  type="hidden" class="form-control"  size="3"  v-model="total_productos"  name="txt_total_productos"  value="0"></td>
              <input  type="hidden" class="form-control"  size="3"   id="operacion_id" name="operacion"  value="1">
              </tr>
          
            </tbody>
          </table>
        </div>

        




    </div>



</div>

</form>



@endsection
@section('scripts')
<script>
function grabarActa()
{

  document.frm_actas.action = '/admin/actas';
  document.frm_actas.submit();


}

function mensaje(obj)
{

  alert(obj)
}
</script>
<script src="{{ asset('js/lista_productos.js') }}" ></script>
 
@endsection