const app2 = new Vue({
    el: '#app',
    data: {
      errors: [],
      nombre: document.getElementById("nombre").value,
      
      
    },
    methods:{
      checkForm: function (e) {
 
  
        this.errors = [];
  
        if (!this.nombre) {
          this.errors.push('El nombre  es obligatorio.');
        }
 
        
        if (!this.errors.length) {
        return true;
        }

        alert('envia');
        axios.post(`http://127.0.0.1:8080/clientes`, {params: {pais_id: this.selected_pais} }).then((response) => {
            
            this.states = response.data;
           });
       
        e.preventDefault();
      }
    }
  })