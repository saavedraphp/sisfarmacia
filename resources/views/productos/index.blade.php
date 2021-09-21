@extends('layouts.app')

@section('content')

<div class="container">
<h2>Lista de Productos 
  <a href="productos/create"> <button type="button" class="btn btn-success float-right">Adicionar</button></a>
  

</h2>

@if($search)
<h6><div class="alert alert-primary" role="alert">
  Resultado de la busqueda '{{$search}}'
  </div>
</h6>
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

<table class="table table-hover" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Total</th>
      <th scope="col">Precio</th>
      <th scope="col">Empresa</th>
    </tr>
  </thead>
  <tbody id="userList">
  	@foreach($productos as $producto)

    <tr v-for>
      <th scope="row"> {{ $producto->prod_id }} </th>
      <td>{{$producto->prod_nombre}}</td>
      <td>{{$producto->prod_stock}}</td>
      <td>{{number_format($producto->prod_precio,2)}}</td>
      <td>{{$producto->empr_nombre}}</td>

      <td>


        <form action="{{route('productos.destroy',$producto->prod_id)}}" method="POST" id="frm_destroy{{$producto->prod_id}}">
          @method('DELETE')
          @csrf



         <a href="{{route('productos.edit',$producto->prod_id)}}" title="{{MiConstantes::EDITAR}}"> <i class="far fa-edit" ></i></a> |
         <a href="javascript:document.getElementById('frm_destroy{{$producto->prod_id}}').submit();" onclick="return confirm('Estas Seguro de Borrar el Registro Id:{{$producto->prod_id}}');" title="{{MiConstantes::ELIMINAR}}"><i class="fas fa-trash-alt"></i></a>

        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">{{$productos->links()}}</div>
</div>
</div>
 @endsection
@section('scripts')

@endsection