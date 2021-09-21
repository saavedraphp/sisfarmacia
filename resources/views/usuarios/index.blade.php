@extends('layouts.app')

@section('content')

<div class="container">
<h2>Lista de Usuarios 
  <a href="usuarios/create"> <button type="button" class="btn btn-success float-right">Adicionar</button></a>
  <a href="{{ route('users.pdf')}}"> <button type="button" class="btn btn-success float-right">Exportar PDF</button></a>

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
  	@foreach($usuarios as $usuario)

    <tr v-for>
      <th scope="row"> {{ $usuario->usua_id }} </th>
      <td>{{$usuario->usua_nombre}}</td>
      <td>{{$usuario->usua_email}}</td>
      <td>{{$usuario->usua_f_nacimiento->toFormattedDateString()}}</td>
      <td>


        <form action="{{route('usuarios.destroy',$usuario->usua_id)}}" method="POST">
          @method('DELETE')
          @csrf

         <a href="{{route('usuarios.show',$usuario->usua_id)}}"> <button type="button" class="btn btn-secondary">Ver</button></a>

         <a href="{{route('usuarios.edit',$usuario->usua_id)}}"> <button type="button" class="btn btn-danger">Editar</button></a>

         <button type="submit" class="btn btn-primary">Eliminar</button>

        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">{{$usuarios->links()}}</div>
</div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/user-list.js') }}" ></script>
@endsection