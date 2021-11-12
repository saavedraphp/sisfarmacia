@extends('layouts.app')

@section('content')
@inject('fabricantes','App\Services\Fabricantes')
@inject('presentaciones','App\Services\Presentaciones')

 <div class="container">

  <div class="row">
    <div class="col-md-8">
 

      <form method="POST" id="frm_formulario" >
        @csrf

        <p v-if="errors2.length">
          <b style="color: red;">Por favor, corrija el(los) siguiente(s) error(es):</b>
        <ul>
          <li v-for="error in errors2">@{{error}}</li>
        </ul>
        </p>





        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="producto">Producto *</label>
            <input type="hidden" class="form-control" v-model="id" name="id" id="id">
 
            <span class="text-danger"  v-if="errores.nombre.length>0"> @{{errores.nombre}}  </span>
            <input type="text" class="form-control" v-model="nombre" name="nombre" id="nombre" placeholder="Nombre" value="">
          </div>

          <div class="form-group col-md-4">
            <label for="inputAddress" title="European Article Number">Ean</label>
            <input type="text" class="form-control" id="ean_id" placeholder="Ean" name="ean" value="{{old('ean')}}">
          </div>

        </div>


        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputAddress" title="Unidad de mantenimiento de stock">Sku</label>
            <input type="text" class="form-control" id="sku_id" placeholder="sku" name="sku" value="{{old('sku')}}">

          </div>

          <div class="form-group col-md-4">
            <label for="inputPassword4">Serie</label>
            <input type="text" class="form-control" name="serie" id="serie_id" placeholder="Serie" value="{{old('serie')}}">
          </div>

          <div class="form-group col-md-4">
            <label for="cbo_presentacion">Presentacion *</label>
            <span class="text-danger"  v-if="errores.presentacion.length>0"> @{{errores.presentacion}}  </span>

            <select class="form-control" aria-label="Default select example" name="cbo_presentacion" id="cbo_presentacion_id" v-model="cbo_presentacion_id">
              {{$guion =""}};
              @foreach ($presentaciones->get() as $index => $value)

              <option value="{{$index}}">{{$index.$guion.$value}}</option>
              {{$guion =" - "}};
              @endforeach
            </select>

          </div>



        </div>



        <div class="form-row">

          <div class="form-group col-md-4">
            <label for="inputAddress">Precio *</label>
            <span class="text-danger"  v-if="errores.precio.length>0"> @{{errores.precio}}  </span>
            <input type="text"    class="form-control" v-model="v_precio" id="precio_id" placeholder="0.00" name="precio" >
          </div>


          <div class="form-group col-md-4">
            <label for="inputPassword4">Cant Minimo</label>
            <input type="text" class="form-control" v-model="cantidad_min_id" name="cantidad_min" id="cantidad_min_id" placeholder="Cantidad Min" value="{{old('cantidad_min')}}">
          </div>


          <div class="form-group col-md-4">
          <label for="empresa_id">Fabricante *</label>
          <span class="text-danger"  v-if="errores.fabricante.length>0"> @{{errores.fabricante}}  </span>

            <select v-model="fabricante_id" id="fabricante_id" data-old="{{old('cbo_empresa')}}" name="fabricante_id" class="form-control">
              {{$guion =""}};
              @foreach ($fabricantes->get() as $index => $value)

              <option value="{{$index}}">{{$index.$guion.$value}}</option>
              {{$guion =" - "}};
              @endforeach

            </select>
          </div>

        </div>







 


        <div class="form-group">
          <label for="inputEmail4">Comentario</label>
          <textarea class="form-control" id="comentario_id" name="comentario" rows="3" placeholder="Comentario"></textarea>
        </div>

        <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="controlado_id" name="controlado" >
              <label class="form-check-label" for="flexCheckDefault">
                Producto Controlado
              </label>
            </div>
            
          </div>
        </div>

        <button type="button" @click="checkForm()" class="btn btn-primary">Registrar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>

      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/productos.js') }}"></script>

@endsection