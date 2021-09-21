const app2 = new Vue({
    el: '#frm_formulario',
    data: {
      errors: [],
      nombre_id: document.getElementById("nombre_id").value,
      correo_id: document.getElementById("correo_id").value,
      celular_id:  document.getElementById("celular_id").value,
      msg:[],
      encontroEmail: false,
    },
    methods:{
      checkForm: function (e) {
 
  
        this.errors = [];
  
        if (!this.nombre_id) {
          this.errors.push('El Nombre es obligatorio.');
        }

        

        if (!this.correo_id) {
            this.errors.push('El correo electrónico es obligatorio.');
        } else if (!this.validEmail(this.correo_id)) {
            this.errors.push('El correo electrónico debe ser válido.');
        }

        

        if (!this.celular_id) {
            this.errors.push('La Celular es obligatoria.');
          }        
  
         
          if (!this.errors.length) {
            return true;
          }



        e.preventDefault();
      },

      validEmail: function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      },


      existeEmail() {
 
         this.msg['email']="El correo existe en nuestra base de datos";
         this.encontroEmail = true;
      //  axios.get(url+`/existeEmail`, {params: {email: email} }).then((response) => {
      //  if(response.data==1)
      //  {

      //  }

        //});
      }





    }
  })