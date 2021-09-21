const app = new Vue({
    el: '#frm_formulario',

    data: {
        empresa_id: '',
        total_productos:0,
        data: [],

        errors: [],
        selected_empresa: document.getElementById("empresa_id").value,
        tipo_documento_id: document.getElementById("tipo_documento_id").value,
        acta_sub_cliente_id: document.getElementById("acta_sub_cliente_id").value,
        grabar:false,
    },
 

    methods: {

        checkForm: function (e) {
 
            this.errors = [];
      
            if (!this.selected_empresa) {
              this.errors.push('Seleccione una empresa.');
            }
    
            if (!this.acta_sub_cliente_id) {
                this.errors.push('Seleccione un sub cliente.');
              }


            if (!this.tipo_documento_id) {
                this.errors.push('Seleccione un tipo de Documento.');
              }
            
                
          

            //verificar_cambios();

            if(this.verificar_cambios()==false)
            {
                this.errors.push('Por favor tiene que eleguir algún producto');
            }
    
            
            
            if (!this.errors.length) {
                return true;
            }

     
            e.preventDefault();
          },      



        obtenerProductos() {
            
          
                axios.get(url+`/productos/empresa`, {params: {empresa_id: this.selected_empresa} }).then((response) => {
                this.data = response.data;

                });
            
            
        },

        modificarStock: function(producto){
          

            if(parseInt(producto.valor)>=0)
            { 
                //RESTA DESPACHO
                if(document.getElementById('operacion_id').value ==0){
                
                    if(parseInt(producto.valor) > parseInt(producto.prod_stock) )
                    {
                        alert('El valor ingresado excede la cantidad del Stock');
                        this.errors.push('Tiene que ingresar una cantidad menor al Stock.');
                         
                        return false;
                    }
                    else
                    {
                        producto.total = parseInt(producto.prod_stock) - parseInt(producto.valor);
                    }
                }    
                
            
                //ADICIONAR SUMA
                if(document.getElementById('operacion_id').value ==1){
                    
                    producto.total = parseInt(producto.prod_stock) + parseInt(producto.valor);
                }
                    
                
                
                this.total_productos +=parseInt(producto.valor);
            }// SI ES NUMERICO

            // document.getElementById('lbTotal').text = producto.total;
                //alert(producto.total);
                //console.log(producto);
        
        },//END modificarStock

        verificar_cambios(){
            
            for(i=0;i<document.getElementsByName('cantidad[]').length;i++){
                if(document.getElementsByName('cantidad[]')[i].value > 0)
                {
                    
                    return  true;

                }
                
            }
            return  false;
/*

            for(x in this.data)
            {
                alert(this.data[x]['valor']);

                if(this.data[x]['valor'] >0)
                return  true;
            }
  */          
   

            
        }



        
        
    }// end method


});