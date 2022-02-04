 
const app2 = new Vue({
    el: '#frm_formulario',
    data: {
      id:document.getElementById("id").value,
      errors2: [],
      nombre: document.getElementById("nombre").value,
      fabricante_id: document.getElementById("fabricante_id").value,
      cbo_presentacion_id:  document.getElementById("cbo_presentacion_id").value,
      v_precio:document.getElementById("precio_id").value,
      cantidad_min_id:document.getElementById("cantidad_min_id").value,
      categoria_id:document.getElementById("categoria_id").value,
      salir: false,
      errores:{nombre:'',presentacion:'',precio:'',fabricante:'',categoria:''}
      
    },
    methods:{
      
      reiniciar:function(){
        this.errores.nombre = '',
        this.errores.presentacion = '',
        this.errores.precio ='',
        this.errores.fabricante ='',
        this.categoria =''

    },

      async checkForm (e) {
      
        this.salir =false;
        this.reiniciar();
   
        if (!this.nombre) {
          this.errores.nombre = 'Requerido.';
          this.salir = true;
        }

        if (!this.cbo_presentacion_id || this.cbo_presentacion_id=="selected") {
          this.errores.presentacion = 'Requerido.';
          this.salir = true;
        }        
  
        if (this.v_precio <= 0) {
          this.errores.precio = 'Requerido.';
          this.salir = true;
        }         
 
        if (!this.fabricante_id || this.fabricante_id=="selected") {
          this.errores.fabricante = 'Requerido.';
          this.salir = true;
        }


        if (!this.categoria_id || this.categoria_id=="selected") {
          this.errores.categoria = 'Requerido.';
          this.salir = true;
        }


        if(this.salir==true)
          return true;
        /*
        if (!this.errors.length) {
          return true;
        }
        */
 

      try {
         let parametros ={
          nombre:this.nombre,
          ean:document.getElementById("ean_id").value,
          sku:document.getElementById("sku_id").value,
          serie:document.getElementById("serie_id").value,
          precio:this.v_precio,
          cantidad_min:this.cantidad_min_id,
          fabricante_id:this.fabricante_id,
          comentarios:document.getElementById("comentario_id").value,
          presentacion_id:this.cbo_presentacion_id,
          categoria_id:this.categoria_id,
          controlado:document.getElementById("controlado_id").checked
        }
    
        let ruta =  'http://127.0.0.1:8080';

        if(this.id>0)
          response =  await axios.put(`http://127.0.0.1:8080/productos/`+this.id,  parametros )
        else
          response =  await axios.post(`http://127.0.0.1:8080/productos`,  parametros )


        window.location.href = ruta +'/productos';


      } catch (error) {
        //alert(error.response.data.errors.nombre);
        console.log(error)
      }
       // e.preventDefault();
      }

      
    }
  })