const app = new Vue({
    el: '#app',
    data: {
        selected_pais: '',
        selected_estado: '',
        selected_city: '',
        states: [],
        cities: [],
        
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
                axios.get(`http://localhost:80/estados/pais`, {params: {pais_id: this.selected_pais} }).then((response) => {
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
                axios.get(`http://localhost:80/ciudades/estado`, {params: {estado_id: this.selected_estado} }).then((response) => {
               // axios.get(`http://demo.modifiedpayments.com/ciudades/estado`, {params: {estado_id: this.selected_estado} }).then((response) => {
                this.cities = response.data;
                document.getElementById('ciudad').disabled  =false;

                });
            }
            
        }
      
        
    }


});