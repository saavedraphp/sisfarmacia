const app = new Vue({
    el: '#frm_formulario',
    data: {
        id:document.getElementById("id").value,
        tipo_documento_id:document.getElementById("tipo_documento_id").value,
        numero_documento:document.getElementById("numero_documento").value,

        nombre:document.getElementById("nombre").value,
        direccion:document.getElementById("direccion").value,
        tipo_cliente_id:document.getElementById("tipo_cliente_id").value,

        telefono:document.getElementById("telefono").value,
        email:document.getElementById("email").value,
        genero_id:document.getElementById("genero_id").value,
        comentario:document.getElementById("comentario").value,

        //errores:[],
        errores:{nombre:'',email:'',documentos:'',tipo_cliente:'',numero_documento:'',comentario:''},
        salir:false
        
    },

  
     methods: {
   
        reiniciar:function(){
            this.errores.nombre = '',
            this.errores.email = '',
            this.errores.documentos ='',
            this.errores.tipo_cliente ='',
            this.errores.numero_documento =''

        },
  
 
        async checkForm (e) {
            this.salir=false;
            this.reiniciar();

            if (!this.tipo_documento_id || this.tipo_documento_id=="selected") {
                this.errores.documentos = 'Requerido.';
                  this.salir = true;
            } 
              
            if (!this.numero_documento) {
                this.errores.numero_documento = 'Requerido.';
                this.salir = true;
            }         


            
            if (!this.tipo_cliente_id || this.tipo_cliente_id=="selected") {
                this.errores.tipo_cliente = 'Requerido.';
                  this.salir = true;
            } 


            if (!this.nombre) {
              this.errores.nombre = 'Requerido.';
              this.salir = true;
            }
     
            if(this.validEmail(this.email)==false)
            {
                this.errores.email= 'Requerido.';
                this.salir =true;
                
            }

 




            if (this.salir ==true) {
            return true;
            }
            


            
            try {
                
                let parametros  ={
                    documento_identidad_id:this.tipo_documento_id,
                    nro_documento:this.numero_documento,
                    nombre:this.nombre,
                    direccion:this.direccion,
                    tipo_cliente:this.tipo_cliente_id,
                    telefono:this.telefono,
                    email:this.email,
                    genero:this.genero_id, 
                    comentario:this.comentario
                    
                }
 
                
                let ruta =  'http://127.0.0.1:8080';
 
                if(this.id>0)
                    response =  await axios.put(`http://127.0.0.1:8080/clientes/`+this.id,  parametros )
                else
                  response =  await axios.post(`http://127.0.0.1:8080/clientes`,  parametros )
        
        
                window.location.href = ruta +'/clientes';
        
 
            } catch (error) {
                console.log('entro al catch');
                alert(error.response.data.errors.nombre)
                // this.errores = error.response.data.errors;
                 
                console.log(error);
 
            }

        },// fin funcion

        
        validEmail: function(email) 
          {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
          }
    
      
        
    },



});