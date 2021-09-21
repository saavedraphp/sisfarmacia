@extends('layouts.app')

@section('content')

<div class="container">
<h2>Lista de Productos 
  <a href="productos/create"> <button type="button" class="btn btn-success float-right">Adicionar</button></a>
  

</h2>

@if(@$search)
<h6><div class="alert alert-primary" role="alert">
  Resultado de la busqueda '@{{$search}}'
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
      <th scope="col">Pedido</th>
      <th scope="col">Fecha</th>
      <th scope="col">Operacion</th>
    </tr>
  </thead>
  <tbody id="userList">
  	@foreach($pedidos as $pedido)

    <tr v-for>
      <th scope="row"> {{ $pedido->id }} </th>
      <td>{{$pedido->nombre}}</td>
      <td>{{$pedido->created_at}}</td>
  

      <td>


        <form action="{{route('pedidos.destroy',$pedido->id)}}" method="POST" id="frm_destroy{{$pedido->id}}">
          @method('DELETE')
          @csrf



          <a href="{{ route('reportePedido.pdf',$pedido->id)}}" title="{{MiConstantes::REPORTE}}"><i class="far fa-file-pdf"></i></a> |
         <a href="javascript:document.getElementById('frm_destroy{{$pedido->id}}').submit();" onclick="return confirm('Estas Seguro de Borrar el Registro Id:{{$pedido->id}}');" title="{{MiConstantes::ELIMINAR}}"><i class="fas fa-trash-alt"></i></a>

        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">{{$pedidos->links()}}</div>
</div>
</div>
 @endsection
@section('scripts')

@endsection