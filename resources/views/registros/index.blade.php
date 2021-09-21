@extends('layouts.app')

@section('content')

<div class="container">
<h2>Lista de Registros 
  <a href="registros/create"> <button type="button" class="btn btn-success float-right">Adicionar</button></a>
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
      <th scope="col">Comentario</th>
      <th scope="col">Tipo Servicio</th>      
      <th scope="col">Costo</th>
      <th scope="col">Fecha Ini</th>
      <th scope="col">Fecha Fin</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody id="userList">
  	@foreach($registros as $registro)

    <tr v-for>
      <th scope="row"> {{ $registro->regi_id }} </th>
      <td>{{$registro->empr_comenario}}</td>
      <td>{{$registro->serv_id}}</td>
      <td>{{$registro->regi_costo}}</td>
      <td>{{$registro->regi_fecha_ini}}</td>
      <td>{{$registro->regi_fecha_fin}}</td>

      <td>


        <form action="{{route('registros.destroy',$registro->empr_id)}}" method="POST">
          @method('DELETE')
          @csrf

         <a href="{{route('registros.show',$registro->empr_id)}}"> <button type="button" class="btn btn-secondary">Ver</button></a>

         <a href="{{route('registros.edit',$registro->empr_id)}}"> <button type="button" class="btn btn-danger">Editar</button></a>

         <button type="submit" class="btn btn-primary" 
         onclick="return confirm('Estas Seguro de Borrar el Registro Id:{{$registro->empr_id}}');">Eliminar</button>

        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">{{$registros->links()}}</div>
</div>
</div>
<div> @{{users}}</div>
@endsection
@section('scripts')

@endsection