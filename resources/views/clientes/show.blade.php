@extends('layouts.app')

@section('content')
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$usuario->usua_nombre}}</h1>
    <p class="lead">{{$usuario->usua_email}}</p>
    <p class="lead">{{$usuario->usua_direccion}}</p>
    <p class="lead">{{$usuario->pais}}</p>
    <p class="lead">{{$usuario->estado}}</p>
    <p class="lead">{{$usuario->ciudad}}</p>
    <p class="lead">{{$usuario->usua_code_zip}}</p>
    
  </div>
</div>
@endsection

