@extends('layouts.app')

@section('content')
@inject('empresas','App\Services\Empresas')
@inject('documentos','App\Services\Documentos') 
@inject('servicios','App\Services\Servicios') 
@inject('presentaciones','App\Services\Presentaciones')

 

<h2>{{$array_titulos['CABECERA']}}</h2>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#home" class="nav-link active" data-toggle="tab">Acta</a>
    </li>
    <li class="nav-item">
        <a href="#profile" class="nav-link" data-toggle="tab">{{$array_titulos['TAB']}}</a>
    </li>
 
</ul>

<form  method="POST" name="frm_actas">
<div class="tab-content col-md-10" id="crud">


  <div class="tab-pane fade show active" id="home">
    
    @csrf





    
    <div class="form-group">
    
      <label for="inputAddress">Empresa</label>
        <select  id="empresa_id" name="cbo_empresa"  class="form-control" disabled>
        {{$guion  =""}};
          @foreach ($empresas->get() as $index => $value)
          
            <option value="{{$index}}"  @if($acta->empr_id==$index)   selected @endif >{{$index.$guion.$value}}</option>
              {{$guion  =" - "}};
          @endforeach
        </select>
   
    </div>



 
    <div class="form-group">
      <label for="inputEmail4">Sub Cliente</label>
      <input type="text" class="form-control" name="sub_cliente" id="acta_sub_cliente_id" placeholder="Sub Cliente"
       value="{{$acta->acta_sub_cliente}}" disabled>
    </div>
 
 



    <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputAddress">Tipo de Documento</label>
          <select  id="tipo_documento_id" data-old="{{old('cbo_empresa')}}"
          name="tipo_documento"  class="form-control" disabled>
          {{$guion  =""}};
            @foreach ($documentos->get() as $index => $value)
            
              <option value="{{$index}}"  @if($acta->tipo_docu_id ==$index) selected @endif >{{$index.$guion.$value}}</option>
                {{$guion  =" - "}};
            @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          <label for="inputAddress">Nro Documento</label>
          <input type="text" class="form-control" name="nro_documento" id="nro_documento_id" placeholder="Nro Documento" 
          value="{{$acta->acta_numero_ingr_sali}}" disabled>
      </div>
    </div>




    <div class="form-group">
        <label for="inputEmail4">Tipo de Servicio</label>
        <select  id="tipo_servicio_id" data-old="{{old('cbo_empresa')}}"
          name="tipo_servicio"  class="form-control" disabled>

          {{$guion  =""}};
            @foreach ($servicios->get() as $index => $value)
            
              <option value="{{$index}}"  @if($acta->serv_id ==$index)   selected @endif >{{$index.$guion.$value}}</option>
                {{$guion  =" - "}};
            @endforeach
            </select>    
    </div>


    
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputAddress">Precio</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Precio" name="precio"
         value="{{$acta->acta_costo}}" disabled>
     </div>

    </div>


    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputAddress">Comentario</label>
        <textarea class="form-control" id="comentario_id" name="comentario" rows="3" disabled>{{$acta->acta_comentario}}</textarea>
     </div>

    </div>

    


    

  </div>

 



    <div class="tab-pane fade" id="profile">
    <p>&nbsp;</p>
    
    
 



 
        <div class="col-sm-12">
          <table class="table table-hover" >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Lote</th>

                <th scope="col">Cantidad</th>
               </tr>
            </thead>

            <tbody id="userList">
            @foreach($detalles as $item)
              <tr >
               <th class="item-{{$index}}" scope="row">{{$item->prod_id}}
                <input  type="hidden" class="form-control"     v-model="producto.prod_id"  size="3" name="prod_id[]" >
                </th>
                <td>{{$item->prod_nombre}}</td>
                <td>{{$item->prod_lote}}</td>

                <td align="center"> {{abs($item->kard_cantidad)}}</td>
              </tr>
            @endforeach  
            
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

 
@endsection