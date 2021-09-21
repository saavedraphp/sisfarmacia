const app2 = new Vue({
    el: '#frm_formulario',
    data: {
      errors: [],
      imagen: document.getElementById("id_imagen").value,
       v_fecha: document.getElementById("fecha_id").value,
      v_rbo_proveedor: "",
      

      

    },
    methods:{
 

      checkForm: function (e) {
 
  
        this.errors = [];

    
 

        if (!this.$refs.imagen.value) {
            this.errors.push('Seleccione un archivo Excel por favor');
        }
 
  
         if (!this.v_rbo_proveedor) {
           
            this.errors.push('Seleccione un Proveedor');
        }
        
       
        let isValidDate = Date.parse(this.v_fecha);
        if (isNaN(isValidDate)) {
            this.errors.push('Ingrese la fecha del archivo. YYYY-MM-DD');

        }
      
        
            
          
         
        if (!this.errors.length) {
          if(confirm('Estas Seguro de Actualizar los datos del Proveedor: '+this.v_rbo_proveedor))
            return true;
        }


        e.preventDefault();
      }

 

    }// method
  })


  