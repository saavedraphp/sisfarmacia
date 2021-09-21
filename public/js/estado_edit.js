const app = new Vue({
    el: '#app',
    data: {
        selected_pais: document.getElementById('pais').value,
        selected_estado: document.getElementById('estado_id').value,
        selected_city: document.getElementById('ciudad_id').value,
        states: [],
        cities: [],
        
    },

    mounted(){
 
        document.getElementById('estado').disabled  = true;
        document.getElementById('ciudad').disabled  =true;

        if(document.getElementById('pais').getAttribute('data-old') !== "")
        {  
            this.selected_pais = document.getElementById('pais').getAttribute('data-old');
        }


        alert('valor data-old Estado:'+document.getElementById('estado').getAttribute('data-old')
        +'valor pais: '+document.getElementById('pais').getAttribute('data-old'));

        if(document.getElementById('estado').getAttribute('data-old') !== "")        
        {  
            this.selected_estado = document.getElementById('estado').value ;
            
        }

      
        if(this.selected_pais !='')
        {
            this.loadStates();
           
        }

       
       


        
        
        if(this.selected_estado !=='')
        { 
            this.loadcity();
        }        
        
        if(document.getElementById('estado').getAttribute('data-old') !== "")  
        {
            this.selected_estado = document.getElementById('estado').getAttribute('data-old');
            this.selected_city = document.getElementById('ciudad').getAttribute('data-old');               
        }

    },

     methods: {
        loadStates() {

 
            
            document.getElementById('estado').disabled  =true;
            document.getElementById('ciudad').disabled  =true;
            
        

            if (this.selected_pais !="") {

                axios.get(`http://localhost:80/estados/pais`, {params: {pais_id: this.selected_pais} }).then((response) => {
               // axios.get(`http://demo.modifiedpayments.com/estados/pais`, {params: {pais_id: this.selected_pais} }).then((response) => {                    
                
                if (response) 
                {
                this.states = response.data;
                this.cities=[];
                document.getElementById('estado').disabled  =false; 
                
                }

             
                
 
                });
            }
            
        },


        loadcity() {
           // this.selected_city ='';
            document.getElementById('ciudad').disabled  =true;

            if (this.selected_estado !="") {
                axios.get(`http://localhost:80/ciudades/estado`, {params: {estado_id: this.selected_estado} }).then((response) => {
               // axios.get(`http://demo.modifiedpayments.com/ciudades/estado`, {params: {estado_id: this.selected_estado} }).then((response) => {
                this.cities = response.data;
                document.getElementById('ciudad').disabled  =false;
                document.getElementById("ciudad").options.selectedIndex  = 0;                

                });
            }
            
        }
      
        
    }


});