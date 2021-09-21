const app = new Vue({
    el: '#app',
    data: {
        selected_empresa: '',
        empresas: [],
 
        
    },

    mounted(){
        
        this.selected_empresa = document.getElementById('empresa_id').getAttribute('data-old');
        
      
        if(this.selected_empresa !='')
        {
            this.cargarEmpresa();
           
        }
   
       // this.selected_empresa = document.getElementById('empresa_id').getAttribute('data-old');
                    
    },

     methods: {
        cargarEmpresa() {
            
            if (this.selected_empresa !="") {
                axios.get(`http://127.0.0.1:80/estados/pais`, {params: {pais_id: this.selected_pais} }).then((response) => {
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
                axios.get(`http://127.0.0.1:80/ciudades/estado`, {params: {estado_id: this.selected_estado} }).then((response) => {
                //axios.get(`http://demo.modifiedpayments.com/ciudades/estado`, {params: {estado_id: this.selected_estado} }).then((response) => {                    
                    
                this.cities = response.data;
                document.getElementById('ciudad').disabled  =false;

                });
            }
            
        }
      
        
    }


});