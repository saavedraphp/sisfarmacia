const app = new Vue({
  el: "#frm_formulario",
  data: {
    casillas_rack: [],
    casillas_empresa: [],
    errors: [],

  
    exists: null
  },
  methods: {
     obtenerCasillas(rack_id) {
 
            axios.get(url+`/racks/obtenerCasillas`, {params: {rack_id: rack_id} }).then((response) => {
            this.casillas_rack = response.data;

            });
        
   
    },


 

    asignarCasilla (item) {
      this.casillas_empresa.push({'rc_id': item.rc_id, 'rc_nombre': item.rc_nombre })
     /* this.checkIfExists(item.rc_id)
      if (!this.exists) {
      	this.items.push({'id': 4, 'text': 'Item 4' })
      }
      */
    },



    quitarCasilla (index) {
      this.$delete(this.casillas_empresa, index);
 
    },
    
    

    mounted(empresa_id) {

      axios.get(`http://laravel/racks/obtenerCasillasEmpresa`, {params: {empresa_id: empresa_id} }).then((response) => {
        // axios.get(`http://sistema.almagri.com/racks/obtenerCasillasEmpresa`,{params: {empresa_id: empresa_id} }).then((response) => {
         this.casillas_empresa = response.data;

         });      

    },

    
    checkIfExists(itemId) {
      this.exists = this.items.some((item) => {
      	return item.id === itemId
      })
    }




  }
})