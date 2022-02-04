@extends('layouts.app')

@section('content')

<div class="container" id="container">
<h2>Lista de Productos 
  <a href="productos/create"> <button type="button" class="btn btn-success float-right">Nuevo Producto</button></a>
  

</h2>
 
@if($search)
<h6><div class="alert alert-primary" role="alert">
  Resultado de la busqueda '{{$search}}'
  </div>
</h6>
@endif


 <div :class="classMensaje ? 'alert alert-success alert-dismissible' : 'alert alert-danger alert-dismissible'"  role="alert"  v-if="visible"  id="notifications">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <span  v-text="mensaje"></span>
</div>
 

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
      <th scope="col">Producto</th>
      <th scope="col">Total</th>
      <th scope="col">Precio</th>
      <th scope="col">Fabricante</th>
    </tr>
  </thead>
  <tbody id="userList">

    <tr v-for="producto in productos" :key="producto.prod_id" >
      <th scope="row"> @{{producto.prod_id }} </th>
      <td>@{{producto.prod_nombre}}</td>
      <td>@{{producto.prod_existencia}}</td>
      <td>@{{producto.prod_precio_venta}}</td>
      <td>@{{producto.fabricante.fabr_nombre}}</td>

      <td>
 


         <a :href="'/productos/'+producto.prod_id+'/edit'" title="{{MiConstantes::EDITAR}}"> <i class="far fa-edit" ></i></a> |
         <a href="#" @click="eliminar(producto.prod_id)"><i class="fas fa-trash-alt"></i></a>
 
 
      </td>
    </tr>
   </tbody>
</table>
 
<div class="row">
  <div class="mx-auto">{{$productos->links()}}</div>
</div>
</div>

 @endsection
@section('scripts')
<script>
 
  const app = new Vue({
    el: '#container',

    data:{
      productos:[],
      ruta:`{{MiConstantes::DOMINIO}}`,
      visible:false,
      mensaje:"",
      classMensaje:false
      
    },
    
    methods:{
      async getData()
      {
        const resp = await axios.get('obtenerProductos');
        this.productos = resp.data;
        console.log(this.productos);

      },

      async eliminar(id)
      {
        if(confirm('Estas Seguro de Borrar el Registro Id: '+id ))
        {
          response =  await axios.delete(this.ruta+`/productos/`+id )
          this.getData();
/*
          this.notifications.push({
                        type: 'success',
                        message: 'Product updated successfully',
                        
                    });
*/
          this.visible=true;
          this.classMensaje=true;

          this.mensaje="La operacion se realizo con exito";
        }

      }

    },

    created()
      {
         this.getData();
      

      },
          
  });
</script>
@endsection