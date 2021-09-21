const app2 = new Vue({
    el: '#frm_formulario',
    data: {
      errors: [],
      producto: document.getElementById("producto").value,
      empresa_id: document.getElementById("empresa_id").value,
      cbo_presentacion_id:  document.getElementById("cbo_presentacion_id").value
    },
    methods:{
      checkForm: function (e) {
 
  
        this.errors = [];
  
        if (!this.producto) {
          this.errors.push('El Producto es obligatorio.');
        }
        if ( (!this.empresa_id)){
          this.errors.push('La Empresa es obligatoria.');
        }

        if (!this.cbo_presentacion_id) {
            this.errors.push('La Presentacion es obligatoria.');
          }        
  
         
          if (!this.errors.length) {
            return true;
          }


        e.preventDefault();
      }
    }
  })