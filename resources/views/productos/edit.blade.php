@extends('layouts.app')

@section('content')
@inject('fabricantes','App\Services\Fabricantes')
@inject('presentaciones','App\Services\Presentaciones')
<div class="container">

  <div class="row">
    <div class="col-md-8">
 


      <form action="{{route('productos.update',$producto->prod_id)}}" id="frm_formulario">
        @method('PATCH')
        @csrf

        <p v-if="errors2.length">
          <b style="color: red;">Por favor, corrija el(los) siguiente(s) error(es):</b>
        <ul>
          <li v-for="error in errors2">@{{error}}</li>
        </ul>
        </p>

        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="producto">Producto ID - {{$producto->prod_id}}</label>
            <input type="hidden" class="form-control" v-model="id" name="id" id="id"  value="{{$producto->prod_id}}">
            <span class="text-danger"  v-if="errores.nombre.length>0"> @{{errores.nombre}}  </span>
            <input type="text" class="form-control" v-model="nombre" name="nombre" id="nombre" placeholder="Nombre" value="{{$producto->prod_nombre}}">
            
          </div>


          <div class="form-group col-md-4">
            <label for="inputAddress" title="European Article Number">Ean</label>
            <input type="text" class="form-control" id="ean_id" placeholder="Ean" name="ean" value="{{$producto->prod_ean}}">
          </div>


        </div>


        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputAddress" title="Unidad de mantenimiento de stock">Sku</label>
            <input type="text" class="form-control" id="sku_id" placeholder="sku" name="sku" value="{{$producto->prod_sku}}">

          </div>

          <div class="form-group col-md-4">
            <label for="inputPassword4">Serie</label>
            <input type="text" class="form-control" name="serie" id="serie_id" placeholder="Serie" value="{{$producto->prod_serie}}">
          </div>

          <div class="form-group col-md-4">
            <label for="cbo_presentacion_id">Presentacion</label>
            <span class="text-danger"  v-if="errores.presentacion.length>0"> @{{errores.presentacion}}  </span>

 
            <select class="form-control" aria-label="Default select example" name="cbo_presentacion" id="cbo_presentacion_id" v-model="cbo_presentacion_id">
              {{$guion =""}};
              @foreach ($presentaciones->get() as $index => $value)

              <option value={{$index}} @if($producto->presentacion_id ==$index) selected @endif>{{$index.$guion.$value}}</option>
              {{@$guion =" - "}}
              @endforeach
            </select>

          </div>          

        </div>





        <div class="form-row">
         


          <div class="form-group col-md-4">
            <label for="inputAddress">Precio</label>
            <span class="text-danger"  v-if="errores.precio.length>0"> @{{errores.precio}}  </span>
            <input type="text"    class="form-control" v-model="v_precio" id="precio_id" placeholder="0.00" name="precio" value="{{$producto->prod_precio}}">

          </div>


          <div class="form-group col-md-4">
            <label for="inputPassword4">Cant Minimo</label>
            <input type="text" class="form-control" name="cantidad_min" v-model="cantidad_min_id"  id="cantidad_min_id" placeholder="Cantidad Min" value="{{$producto->prod_cantidad_min}}">
          </div>          


          <div class="form-group col-md-4">
            <label for="empresa_id">Fabricante</label>
            <span class="text-danger"  v-if="errores.fabricante.length>0"> @{{errores.fabricante}}  </span>

            <select v-model="fabricante_id" id="fabricante_id" data-old="{{old('fabricante_id')}}" name="fabricante_id" class="form-control">
              {{$guion =""}};
              @foreach ($fabricantes->get() as $index => $value)

              <option value={{$index}} @if($producto->fabricante_id ==$index) selected @endif>{{$index.$guion.$value}}</option>
              {{@$guion =" - "}}
              @endforeach
            </select>
            </div>

        </div>
          
          


          
          

     





        <div class="form-row">


          <div class="form-group col-md-4">
            <label for="inputPassword4">Stock</label>
            <input type="text" class="form-control" name="stock" id="inputPassword4" placeholder="Stock" value="{{$producto->existencia}}">
          </div>


        </div>


 




        <div class="form-group">
          <label for="inputEmail4">Comentario</label>

          <textarea class="form-control" id="comentario_id" name="comentario" rows="3" placeholder="Comentario">{{$producto->prod_comentario}}</textarea>
        </div>


        <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check"> 
              <input class="form-check-input" @if($producto->prod_controlado==="1") checked @endif type="checkbox" value="1" id="controlado_id" name="controlado">
              
              <label class="form-check-label" for="flexCheckDefault">
                Producto Controlado
              </label>
            </div>
            
          </div>
        </div>

        <button type="button" @click="checkForm()" class="btn btn-primary" >Actualizar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>

      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/productos.js') }}"></script>
@endsection