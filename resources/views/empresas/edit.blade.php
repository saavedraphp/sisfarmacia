@extends('layouts.app')

@section('content')



<div class="container">

<div class="row">
<div class="col-md-8">
    @if ($errors->any())
    <div class="alert alert-danger">
      <h4>Por Favor corriga los siguientes errores   </h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif

   <form action="{{route('empresas.update',$empresa->empr_id)}}" method="POST">
@method('PATCH')
@csrf


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Empresa</label>
      <input type="text" class="form-control" name="nombre" id="inputEmail4" placeholder="Nombre" value="{{$empresa->empr_nombre}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Ruc</label>
      <input type="number" maxlength="10" class="form-control" name="ruc" id="inputPassword4" placeholder="Ruc" value="{{$empresa->empr_ruc}}">
    </div>
  </div>


  <div class="form-group">
    <label for="inputAddress">Direccion</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Direccion" name="direccion" value="{{$empresa->empr_direccion}}">
  </div>

  <div class="form-group">
    <label for="inputAddress">Email</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Email" name="correo" value="{{$empresa->empr_correo}}">
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Telefono</label>
      <input  type="number" maxlength="9"  class="form-control" name="telefono" id="inputEmail4" placeholder="Telefono" value="{{$empresa->empr_telefono}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Celular</label>
      <input type="number" maxlength="9" class="form-control" name="celular" id="inputPassword4" placeholder="Celular" value="{{$empresa->empr_celular}}">
    </div>
  </div>

 

  <button type="submit" class="btn btn-primary">Actualizar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>

</form>
</div>
</div>
</div>
@endsection
@section('scripts')

@endsection