@extends('layouts.app')

@section('content')

<div class="container" id="container">
<h2>Lista de clientes / Proveedores
  <a href="clientes/create"> <button type="button" class="btn btn-success float-right">Nuevo Cliente/Proveedor</button></a>
  

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
      <th scope="col">Nombre / Razón social </th>
      <th scope="col">Documento</th>
      <th scope="col">Tipo</th>
      <th scope="col">Dirección</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody id="userList">
 
    <tr v-for="cliente in data" :key="cliente.id" >
      <th scope="row"> @{{cliente.id }}</th>
      <td>@{{cliente.nombre}}</td>
      <td>@{{cliente.nro_documento}}</td>
      <td>@{{cliente.tipo_cliente}}</td>
      <td>@{{cliente.direccion}}</td>
      <td>@{{cliente.telefono}}</td>
   
      <td>

 
      <a :href="'/clientes/'+cliente.id+'/edit'" title="{{MiConstantes::EDITAR}}"> <i class="far fa-edit" ></i></a> |
      <a href="#" @click="eliminar(cliente.id)"><i class="fas fa-trash-alt"></i></a>
 

      </td>
    </tr>
  
  </tbody>
</table>

<div class="row">
  <div class="mx-auto">{{$clientes->links()}}</div>
</div>
</div>

@endsection
@section('scripts')
<script>
 
  const app = new Vue({
    el: '#container',

    data:{
      data:[],
      ruta:`{{MiConstantes::DOMINIO}}`,
      visible:false,
      mensaje:"",
      classMensaje:false
      
    },
    
    methods:{
      async getData()
      {
        const resp = await axios.get('obtenerClientes');
        this.data = resp.data;
        console.log(this.data);

      },

      async eliminar(id)
      {
      
      try
      {
        if(confirm('Estas Seguro de Borrar el Registro Id: '+id ))
        {
          
          response =  await axios.delete(this.ruta+`/clientes/`+id )
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

      } catch (error) {
                alert(error)
                console.log(error);

      }


      }//FIN ELIMINAR

    },//FIN METODOS

    created()
      {
         this.getData();
      

      },
          
  });
</script>


 @endsection