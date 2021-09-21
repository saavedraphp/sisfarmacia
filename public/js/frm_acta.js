const app2 = new Vue({
    el: '#frm_formulario',
    data: {
      errors: [],
      selected_empresa: document.getElementById("empresa_id").value,
 
    },
    methods:{
      checkForm: function (e) {
 
  
        this.errors = [];
  
        if (!this.selected_empresa) {
          this.errors.push('Seleccione una empresa.');
        }

      
          if (!this.errors.length) {
            return true;
          }

 
        e.preventDefault();
      },

      validEmail: function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      }



    }
  })