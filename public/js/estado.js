const app = new Vue({
    el: '#frm_formulario',
    data: {
        selected_pais: '',
        selected_estado: '',
        selected_city: '',
        states: [],
        cities: [],
        nombre:'',
        email:'',
        direccion:'',
        telefono:'',
        //errores:[],
        errores:{nombre:'',email:''},
        salir:false
        
    },

    mounted(){
        
        document.getElementById('estado').disabled  = true;
        document.getElementById('ciudad').disabled  =true;
        this.selected_pais = document.getElementById('pais').getAttribute('data-old');
        
      
        if(this.selected_pais !='')
        {
            this.loadStates();
           
        }

        this.selected_estado = document.getElementById('estado').getAttribute('data-old');
        if(this.selected_estado !='')
        { 
            this.loadcity();
        }        
        
        this.selected_estado = document.getElementById('estado').getAttribute('data-old');
        this.selected_city = document.getElementById('ciudad').getAttribute('data-old');               
    },

     methods: {
        loadStates() {

            this.selected_estado ='';
            
            document.getElementById('estado').disabled  =true;
            document.getElementById('ciudad').disabled  =true;
            

            if (this.selected_pais !="") {
              
                axios.get(`http://127.0.0.1:8080/estados/pais/id`, {params: {pais_id: this.selected_pais} }).then((response) => {
               // axios.get(`http://demo.modifiedpayments.com/estados/pais`, {params: {pais_id: this.selected_pais} }).then((response) => {                    
                this.states = response.data;
                this.cities=[];
                
                document.getElementById("ciudad").options.selectedIndex  = 0;
                document.getElementById('estado').disabled  =false;


                });
            }
            
        },


        loadcity() {

            this.selected_city ='';
            document.getElementById('ciudad').disabled  =true;

            if (this.selected_estado !="") {
                axios.get(`http://127.0.0.1:8080/ciudades/estado/id`, {params: {estado_id: this.selected_estado} }).then((response) => {
               // axios.get(`http://demo.modifiedpayments.com/ciudades/estado`, {params: {estado_id: this.selected_estado} }).then((response) => {
                this.cities = response.data;
                document.getElementById('ciudad').disabled  =false;

                });
            }
            
        },



        async checkForm (e) {
            this.salir=false;

            if (!this.nombre) {
              this.errores.nombre = 'El nombre  es obligatorio.';
              this.salir = true;
            }
     
            if(this.validEmail(this.email)==false)
            {
                this.errores.email= 'Por favor verifique el formato de correo.';
                this.salir =true;
                
            }

            if (this.salir ==true) {
            return true;
            }
            


            
            try {
                
                let cliente  ={
                    nombre:this.nombre,
                    email:this.email,
                    direccion:this.direccion,
                    telefono:this.telefono,
                    pais_id:this.selected_pais,
                    estado_id:this.selected_estado,
                    ciudad_id:this.selected_city
                }
 
                
              console.log(cliente)
              const response =  await axios.post(`http://127.0.0.1:8080/clientes`,  cliente )
              //alert('redirecciona');
              window.location.href = 'http://127.0.0.1:8080' +'/clientes';
                 /*   
                if((response.data.estado) =='400')
                {
                    alert('Ocurrio un error al conectarse con el servidor');
                }else
                {

                    

                }

        
                    */
               
               // e.preventDefault();
            } catch (error) {
                alert(error.response.data.errors.nombre)
                // this.errores = error.response.data.errors;
                 
                console.log(error.response.data);
 
            }

        },// fin funcion

        
        validEmail: function(email) 
          {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
          }
    
      
        
    },



});