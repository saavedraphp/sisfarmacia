@extends('layouts.app_usuario')

@section('content')

<div class="container">
<h2>Stock de Productos 

</h2>

@if($search)
<h6><div class="alert alert-primary" role="alert">
  Resultado de la busqueda '{{$search}}'
  </div>
</h6>
@endif

<table class="table table-hover" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Empresa</th>
    </tr>
  </thead>
  <tbody id="userList">
  	@foreach($productos as $producto)

    <tr v-for>
      <th scope="row"> {{ $producto->prod_id }} </th>
      <td>{{$producto->prod_nombre}}</td>
      <td>{{$producto->prod_codigo}}</td>
      <td>{{number_format($producto->prod_precio,2)}}</td>
      <td>{{$producto->empr_id}}</td>

      <td>


        <form action="{{route('productos.destroy',$producto->prod_id)}}" method="POST">
          @method('DELETE')
          @csrf




 
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
<script src="{{ asset('js/user-list.js') }}" ></script>
@endsection