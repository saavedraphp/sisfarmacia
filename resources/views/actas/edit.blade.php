@extends('layouts.app')

@section('content')
@inject('empresas','App\Services\Empresas')
@inject('documentos','App\Services\Documentos') 
@inject('servicios','App\Services\Servicios') 
@inject('presentaciones','App\Services\Presentaciones')

<h2>Registro de Despacho </h2>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#home" class="nav-link active" data-toggle="tab">Acta</a>
    </li>
    <li class="nav-item">
        <a href="#profile" class="nav-link" data-toggle="tab">Registro de Productos</a>
    </li>
 
</ul>

<div class="tab-content col-md-8">


  <div class="tab-pane fade show active" id="home">
  <form action="{{route('actas.update',$acta->acta_id)}}" method="POST"  name="frm_formulario" id="frm_formulario" @submit="checkForm">

  

<p v-if="errors.length">
    <b style="color: red;">Por favor, corrija el(los) siguiente(s) error(es):</b>
    <ul>
      <li v-for="error in errors">@{{error}}</li>
    </ul>
  </p>



@method('PATCH')
@csrf



    <div class="form-group">
    
      <label for="inputAddress">Empresa</label>
        <select v-model="selected_empresa" id="empresa_id" data-old="{{old('cbo_empresa')}}"
        name="cbo_empresa"  class="form-control">
        {{$guion  =""}};
          @foreach ($empresas->get() as $index => $value)
          
            <option value="{{$index}}"  @if($acta->empr_id ==$index) selected @endif>{{$index.$guion.$value}}</option>
              {{$guion  =" - "}};
          @endforeach
        </select>
   
    </div>



 
    <div class="form-group">
      <label for="inputEmail4">Sub Cliente</label>
      <input type="text" class="form-control" name="sub_cliente" id="acta_sub_cliente_id" placeholder=""
       value="{{$acta->acta_sub_cliente}}" >
    </div>
 
 



    <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputAddress">Tipo de Documento</label>
          <select v-model="selected_empresa" id="tipo_documento_id" data-old="{{old('cbo_empresa')}}"
          name="tipo_documento"  class="form-control">
          {{$guion  =""}};
            @foreach ($documentos->get() as $index => $value)
            
              <option value="{{$index}}"   @if($acta->tipo_docu_id ==$index) selected @endif>{{$index.$guion.$value}}</option>
                {{$guion  =" - "}};
            @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          <label for="inputAddress">Nro Documento</label>
          <input type="text" class="form-control" name="nro_documento" id="nro_documento_id" placeholder="Codigo" 
          value="{{$acta->acta_numero_ingr_sali}}">
      </div>
    </div>




    <div class="form-group">
        <label for="inputEmail4">Tipo de Servicio</label>
        <select v-model="selected_empresa" id="tipo_servicio_id" data-old="{{old('cbo_empresa')}}"
          name="tipo_servicio"  class="form-control">

          {{$guion  =""}};
            @foreach ($servicios->get() as $index => $value)
            
              <option value="{{$index}}"  @if($acta->serv_id ==$index) selected @endif>{{$index.$guion.$value}}</option>
                {{$guion  =" - "}};
            @endforeach
            </select>    
    </div>


    
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputAddress">Precio</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Precio" name="precio" 
        value="{{$acta->acta_costo }}">
     </div>

    </div>


    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputAddress">Comentario</label>
        <textarea class="form-control" id="comentario_id" name="comentario" rows="3">{{$acta->acta_comentario}}</textarea>
     </div>

    </div>

    


    <button type="submit" class="btn btn-primary">Actualizar</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
    
    </form>
  </div>

 



    <div class="tab-pane fade" id="profile">



    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Adicionar Productos
    </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
            <lu>
            
              @foreach ($presentaciones->get() as $index => $value)
              
                <li>{{$index.$guion.$value}}</li>
              @endforeach
              
            </lu>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>



      

        <table class="table table-hover" >
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Producto</th>
              <th scope="col">Lote</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Accion</th>      
            </tr>
          </thead>
          <tbody id="userList">


            <tr v-for>
              <th scope="row">1 </th>
              <td>Producto 1</td>
              <td>10000</td>
              <td>5</td>
              
              <td>

              <form action="#" method="POST">
                  @method('DELETE')
                  @csrf
                <a href="#"> <button type="button" class="btn btn-danger">Editar</button></a>

                <button type="button" class="btn btn-primary" 
                onclick="return confirm('Estas Seguro de Borrar el Registro Id: 1');">Eliminar</button>

              </form>

              </td>

            </tr>


            <tr v-for>
              <th scope="row">2 </th>
              <td>Producto 2</td>
              <td>20000</td>
              <td>8</td>
              
              <td>

              <form action="#" method="POST">
                  @method('DELETE')
                  @csrf
                <a href="#"> <button type="button" class="btn btn-danger">Editar</button></a>

                <button type="button" class="btn btn-primary" 
                onclick="return confirm('Estas Seguro de Borrar el Registro Id: 1');">Eliminar</button>

              </form>

              </td>
              
            </tr>      



            <tr v-for>
              <th scope="row">3 </th>
              <td>Producto 3</td>
              <td>30000</td>
              <td>5</td>
              
              <td>

              <form action="#" method="POST">
                  @method('DELETE')
                  @csrf
                <a href="#"> <button type="button" class="btn btn-danger">Editar</button></a>

                <button type="button" class="btn btn-primary" 
                onclick="return confirm('Estas Seguro de Borrar el Registro Id: 1');">Eliminar</button>

              </form>

              </td>
              
            </tr>                  
         
          </tbody>
        </table>


    </div>



</div>


@endsection
@section('scripts')

@endsection