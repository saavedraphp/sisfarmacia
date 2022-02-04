@extends('layouts.app')



@section('content')



<div class="container"  id="autocomplete_app" >


    <form action="" method="GET" id="frm_formulario"  >
     @csrf
        <span style="font-weight:bold;font-size: 6mm;"> COMPRA NUEVA</span>

        <div class="row">
            <div class="col-md-8" style="background-color: red;">

                <div class="form-row">

                    <div class="form-group col-md-8"  >
                        <input type="text" placeholder="Ingrese Producto " ref="r_query" v-model="query" 
                        @keyup="getData()" autocomplete="off" 
                        class="form-control" style="text-transform: uppercase"/>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="text" placeholder="Cantidad"  id="v_cantidad" ref="r_cantidad" class="form-control"  @keyup.enter="add_cantidad()" v-model="v_cantidad"/>
                    </div>

                </div>

                <div class="panel-footer" v-if="search_data.length">

                    <ul class="list-group">
                        <a href="#" class="list-group-item" v-for="(data1,index) in search_data"  @click="getName(data1,index)">@{{ data1.id }} - @{{ data1.pp_nombre }} - @{{ data1.prov_code }} -  @{{ formatPrice(data1.pp_precio) }}</a>
                    </ul>

                </div>

                <div class="form-row">
                    <table  border="1" style="padding: 10px;background-color:#00FF00;"  width="100%">

                        <tr>
                            <th>Producto</th>
                            <th>Proveedor</th>
                            <th>Laboratorio</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Operacion</th>
                        </tr>

                        <tr v-for="(data2, index) in lista">
                            <td>@{{ data2.id}} - @{{ data2.pp_nombre}} </td>
                            <td>@{{ data2.prov_code}} </td>
                            <td>@{{ data2.pp_laboratorio}} </td>
                            <td>@{{ formatPrice(data2.pp_precio)}} </td>
                            <td @click="calculo(data2)"> <input type="text" name="cantidad[]" v-bind:value="data2.cantidad" size="5"> </td>
                            <td style="text-align:right"><a  href="#" v-on:click="eliminar(data2,index)">Eliminar</a></td>
                        </tr>

                    </table>
                </div>




            </div>

            <div class="col-md-4" style="background-color: yellow;">
                MENU DERECHO
                    <div>contender 1
                    intr. Pelear, luchar, batallar materialmente.
                    fig.Competir, rivalizar.
                    Disputar (debatir).
                    V. conjugación (cuadro) [3] como entender.
                    Diccionario Enciclopédico Vox 1. © 2009 Larousse Editorial, S.L.
                </div>

                <div>contender  2
                    intr. Pelear, luchar, batallar materialmente.
                    fig.Competir, rivalizar.
                    Disputar (debatir).
                    V. conjugación (cuadro) [3] como entender.
                    Diccionario Enciclopédico Vox 1. © 2009 Larousse Editorial, S.L.
                </div>        
                
                <div>contender 3
                    intr. Pelear, luchar, batallar materialmente.
                    fig.Competir, rivalizar.
                    Disputar (debatir).
                    V. conjugación (cuadro) [3] como entender.
                    Diccionario Enciclopédico Vox 1. © 2009 Larousse Editorial, S.L.
                </div>

                <div>contender 4
                    intr. Pelear, luchar, batallar materialmente.
                    fig.Competir, rivalizar.
                    Disputar (debatir).
                    V. conjugación (cuadro) [3] como entender.
                    Diccionario Enciclopédico Vox 1. © 2009 Larousse Editorial, S.L.
                </div> 
                
                <div>contender 5
                    intr. Pelear, luchar, batallar materialmente.
                    fig.Competir, rivalizar.
                    Disputar (debatir).
                    V. conjugación (cuadro) [3] como entender.
                    Diccionario Enciclopédico Vox 1. © 2009 Larousse Editorial, S.L.
                </div>
            </div>

        </div>
        
    </form>     
 
 







 

@endsection

@section('scripts')

<script>

const CancelToken = axios.CancelToken;

const app = new Vue({

    el: '#autocomplete_app',



    data: {
        bug: true,
        v_total:"0.00",
        query:'',
        search_data:[],
        temp:[],
        v_cantidad: '',
        cancelar: null,
        lista:[],
        temp:[],
        v_cantidad: '',    

     },

    created: function () {
    // `this` hace referencia a la instancia vm

    if(this.bug==true)
    {
      lista:[{id:100, pp_nombre:'APRONAX', prov_code:'PIONERO',
        pp_laboratorio:'ROCHE', pp_presentacion:'CAJA',
        pp_precio:100.20, cantidad:2},
        
        {id:101, pp_nombre:'AMOXICILINA', prov_code:'NOVA',
        pp_laboratorio:'ALEXAN', pp_presentacion:'CAJA',
        pp_precio:150.20, cantidad:5},
      
        {id:103, pp_nombre:'NOTIL', prov_code:'MEDIFARMA',
        pp_laboratorio:'GENFAR', pp_presentacion:'CAJA',
        pp_precio:150.20, cantidad:7}],

      this.calcularTotal()
      

    }
  },
 

    methods:{

      grabarListaPedido:function()
      {

        console.log('grabarListaPedido');
         axios.get(`{{ env('MY_URL') }}/grabarListaPedido`, {params: {listaProductos: this.lista, total:this.v_total} }).then((response) => {
         alert(response.data);
          location.reload();
         //console.log(response.data);
         });


      },


      calcularTotal:function(){
        var subTotal = 0.00;
        

        for(x in this.lista)
        {
          subTotal += this.lista[x].pp_precio * this.lista[x].cantidad;
        
       
        }
        this.v_total = this.formatPrice(subTotal);
        
      },

      getName:function(data1,index){

        this.query = data1.pp_nombre;

        this.search_data = [];

        this.temp = data1;

        this.$refs.r_cantidad.focus();

        

      },









      add_cantidad:function(){

     



     if(this.temp=="")

     {

       

       alert("Seleccione un pais");

       this.$refs.r_query.focus();

       this.v_cantidad = "";

       return;

     }

     if(v_cantidad.value>0){

       this.lista.push({id:this.temp.id, pp_nombre:this.temp.pp_nombre, prov_code:this.temp.prov_code,

        pp_laboratorio:this.temp.pp_laboratorio, pp_presentacion:this.temp.pp_presentacion,

        pp_precio:this.temp.pp_precio, cantidad:v_cantidad.value});

       this.query='';

       this.v_cantidad = "";

       this.temp = [];

       this.$refs.r_query.focus();
       this.calcularTotal();

     }

     

     //Vue.set(this.lista, this.new_item, {id:this.temp.id ,name:this.temp.name,numcode:this.temp.numcode, cantidad: this.temp.numcode})

     

     

   },









      eliminar:function(data,index) {

        if(confirm("Estas seguro de eliminar el registro Id: "+data.id+" "+data.pp_nombre)){

                  this.$delete(this.lista, index);
                  this.calcularTotal();

        }

  

      },





      formatPrice:function(value) {

        let val = (value/1).toFixed(2)

        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")

    },

    



      getData:function(){

       

        

        if(event.keyCode==27)
        {
          this.search_data = []; 
          return;

        }

        else
        { 

            console.log('cancelo',this.cancelar,CancelToken);

            let self = this;

          if (this.cancelar !== null) {

            this.cancelar();

          }

          axios.get(`{{ env('MY_URL') }}/obtenerProductos`,

                    {params: {palabra: this.query} ,

                    cancelToken: new CancelToken(function executor(c) {

                      console.log('c',c);

                      self.cancelar = c;

                    })}

                    ).then((response) => {

                   this.search_data = response.data;

                  this.cancelar = null;

                  console.log(this.search_data);  



          });

        }

      },

    }









    

});

</script>

@endsection

