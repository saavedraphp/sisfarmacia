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
 
    </tr>
  </thead>
  <tbody id="userList">
   

    <tr v-for>
      <th scope="row"> </th>
      <td></td>
 
      <td>


        <form action="" method="POST">
          @method('DELETE')
          @csrf

         <a href=""> <button type="button" class="btn btn-secondary">Ver</button></a>

         <a href=""> <button type="button" class="btn btn-danger">Editar</button></a>

         <button type="submit" class="btn btn-primary">Eliminar</button>

        </form>

      </td>
    </tr>
    
    
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">paginacion</div>
</div>
</div>
<div> @{{data}}</div>
@endsection
@section('scripts')
 
@endsection