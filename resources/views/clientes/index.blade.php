@extends('layouts.app')

@section('content')

<div class="container">
<h2>Lista de clientes 
  <a href="clientes/create"> <button type="button" class="btn btn-success float-right">Nuevo</button></a>
  

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
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody id="userList">
  	@foreach($clientes as $cliente)

    <tr v-for>
      <th scope="row"> {{ $cliente->id }} </th>
      <td>{{$cliente->nombre}}</td>
      <td>{{$cliente->email}}</td>
      <td>{{$cliente->f_nacimiento->toFormattedDateString()}}</td>
      <td>


        <form action="{{route('clientes.destroy',$cliente->id)}}" method="POST" id="frm_destroy{{$cliente->id}}">
 
          @method('DELETE')
          @csrf

         

         <a href="{{route('clientes.edit',$cliente->id)}}" title="{{MiConstantes::EDITAR}}"> <button type="button" class="btn btn-secondary"><i class="far fa-edit" ></i></button></a>
          

         <a href="javascript:document.getElementById('frm_destroy{{$cliente->id}}').submit();" onclick="return confirm('Estas Seguro de Borrar el Registro Id:{{$cliente->id}}');" title="{{MiConstantes::ELIMINAR}}"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt" ></i></button></a>
         

 
        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">{{$clientes->links()}}</div>
</div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/user-list.js') }}" ></script>
@endsection