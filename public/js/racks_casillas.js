const app2 = new Vue({
    el: '#frm_formulario',
    data: {
      errors: [],
      nombre: document.getElementById("nombre").value,
      selected_rack: document.getElementById("selected_rack").value,
      

    },
    methods:{
      checkForm: function (e) {
 
  
        this.errors = [];

    

        if (!this.selected_rack) {
            this.errors.push('Seleccione un Rack.');
          }
  
          
        if (!this.nombre) {
          this.errors.push('El Nombre es obligatorio.');
        }
 

         
        if (!this.errors.length) {
            return true;
        }


        e.preventDefault();
      }
    }
  })


  