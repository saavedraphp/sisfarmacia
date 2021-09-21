@extends('layouts.app')

@section('content')
@inject('empresas','App\Services\Empresas')
@inject('documentos','App\Services\Documentos') 
@inject('servicios','App\Services\Servicios') 

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



    <div class="form-group">
    
      <label for="inputAddress">Empresa</label>
        <select v-model="selected_empresa" id="empresa_id" data-old="{{old('cbo_empresa')}}"
        name="cbo_empresa"  class="form-control">
        {{$guion  =""}};
          @foreach ($empresas->get() as $index => $value)
          
            <option value="{{$index}}" >{{$index.$guion.$value}}</option>
              {{$guion  =" - "}};
          @endforeach
        </select>
   
    </div>



 
    <div class="form-group">
      <label for="inputEmail4">Sub Cliente</label>
      <input type="text" class="form-control" name="acta_sub_cliente_id" id="inputEmail4" placeholder="Sub Cliente" value="{{old('acta_sub_cliente')}}">
    </div>
 
 



    <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputAddress">Tipo de Documento</label>
          <select v-model="selected_empresa" id="empresa_id" data-old="{{old('cbo_empresa')}}"
          name="cbo_empresa"  class="form-control">
          {{$guion  =""}};
            @foreach ($documentos->get() as $index => $value)
            
              <option value="{{$index}}" >{{$index.$guion.$value}}</option>
                {{$guion  =" - "}};
            @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          <label for="inputAddress">Nro Documento</label>
          <input type="text" class="form-control" name="codigo_producto" id="inputPassword4" placeholder="Codigo" value="{{old('codigo_producto')}}">
      </div>
    </div>




    <div class="form-group">
        <label for="inputEmail4">Tipo de Servicio</label>
        <select v-model="selected_empresa" id="empresa_id" data-old="{{old('cbo_empresa')}}"
          name="cbo_empresa"  class="form-control">

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
        <input type="text" class="form-control" id="inputAddress" placeholder="Precio" name="precio" value="{{old('precio')}}">
     </div>

    </div>


    <button type="submit" class="btn btn-primary">Registrar</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>


  </div>

 



    <div class="tab-pane fade" id="profile">
    <p>&nbsp;</p>
        <p>  <button type="button" class="btn btn-primary">Adicionar Productos</button></p>




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