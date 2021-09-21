@extends('layouts.app')

@section('content')

<div class="container">
<h2>Lista de Empresas 
  <a href="empresas/create"> <button type="button" class="btn btn-success float-right">Adicionar</button></a>
  

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
      <th scope="col">Empresa</th>
      <th scope="col">Ruc</th>      
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody id="userList">
  	@foreach($empresas as $empresa)

    <tr v-for>
      <th scope="row"> {{ $empresa->empr_id }} </th>
      <td>{{$empresa->empr_nombre}}</td>
      <td>{{$empresa->empr_ruc}}</td>
      <td>{{$empresa->empr_correo}}</td>
      <td>{{$empresa->empr_telefono}}</td>

      <td>


        <form action="{{route('empresas.destroy',$empresa->empr_id)}}" method="POST" id="frm_destroy{{$empresa->empr_id}}"> 
          @method('DELETE')
          @csrf


        <a href="{{route('casillas_add',$empresa->empr_id)}}" title="{{MiConstantes::ASIGNAR_CASILLAS}}"> <i class="fas fa-border-none"></i></a> |
        <a href="{{route('imagesHead',$empresa->empr_id)}}" title="{{MiConstantes::IMG_REPORTE}}"> <i class="far fa-images" ></i></a> |
         <a href="{{route('empresas.edit',$empresa->empr_id)}}" title="{{MiConstantes::EDITAR}}"> <i class="far fa-edit" ></i></a> |
         
         <a title="{{MiConstantes::ELIMINAR}}" href="javascript:document.getElementById('frm_destroy{{$empresa->empr_id}}').submit();" onclick="return confirm('Estas Seguro de Borrar el Registro Id:{{$empresa->empr_id}}');"><i class="fas fa-trash-alt"></i></a>

        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">{{$empresas->links()}}</div>
</div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/user-list.js') }}" ></script>
@endsection