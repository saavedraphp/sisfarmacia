@extends('layouts.app')

@section('content')



<div class="container">

<h2>Lista de Actas
<a href="actas/create-despacho"> <button type="button" class="btn btn-danger float-right">Add Despacho</button></a>
  <a href="actas/create"> <button type="button" class="btn btn-success float-right mr-3">Add Recepcion</button></a>  

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

<form action="" method="GET">
<div class="form-outline">
  <div class="form-row">
    
    <div class="form-group col-md-5" >
      <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Nro Documento" aria-label="Search" name="nro_documento">
          <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
              </button>
          </div>
      </div>

    </div>
    
    <div class="form-group col-md-1">
    </div>

    <div class="form-group col-md-6">
          <div class="form-check form-check-inline">
          
        <input
          class="form-check-input"
          type="radio"
          name="rbo_lista"
          id="inlineRadio1"
          value="DESPAC" 
          onchange="this.form.submit()" 
          
        />
        <label class="form-check-label" for="inlineRadio1">Despacho</label>
      </div>

      <div class="form-check form-check-inline">
        <input
          class="form-check-input"
          type="radio"
          name="rbo_lista"
          id="inlineRadio2"
          value="ALMACE"
          onchange="this.form.submit()" 
          

        />
        <label class="form-check-label" for="inlineRadio2">Almacenamiento</label>
      </div>

      <div class="form-check form-check-inline">
        <input
          class="form-check-input"
          type="radio"
          name="rbo_lista"
          id="inlineRadio3"
          value="ALL"
          onchange="this.form.submit()" 
          
        />
        <label class="form-check-label" for="inlineRadio2">Todos</label>
      </div>
      
    </div>

  </div>
</div>
</form>

<table class="table table-hover" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Empresa</th>
      <th scope="col">Tipo Servicio</th>
      <th scope="col">Nro Documento</th>
      <th scope="col">Costo</th>
      <th scope="col">Fecha de Creacion</th>      
    </tr>
  </thead>
  <tbody id="userList">
  	@foreach($actas as $acta)

    <tr v-for>
      <th scope="row"> {{ $acta->acta_id }} </th>
      <td>{{$acta->empr_nombre}}</td>
      <td>{{$acta->serv_nombre}}</td>
      <td>{{$acta->acta_numero_ingr_sali}}</td>
      <td>{{number_format($acta->acta_costo,2)}}</td>
      <td>{{ date('M d Y', strtotime($acta->created_at)) }}</td>

      <td>


        <form action="{{route('actas.destroy',$acta->acta_id)}}" method="POST" id="frm_destroy{{$acta->acta_id}}">
          @method('DELETE')
          @csrf

 
         <a href="{{route('actas.show',$acta->acta_id)}}" title="{{MiConstantes::VER}}"><i class="far fa-eye"></i></a> |
         <a href="{{ route('reporteRecepcion.pdf',$acta->acta_id)}}" title="{{MiConstantes::REPORTE}}"><i class="far fa-file-pdf"></i></a> |
         <a href="javascript:document.getElementById('frm_destroy{{$acta->acta_id}}').submit();" onclick="return confirm('Estas Seguro de Borrar el Registro Id:{{$acta->acta_id}}');" title="{{MiConstantes::ELIMINAR}}"><i class="fas fa-trash-alt"></i></a>
         
     
        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">{{$actas->links()}}</div>
</div>
</div>
 @endsection
@section('scripts')

@endsection