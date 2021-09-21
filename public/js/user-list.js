import Axios from "axios";

const app = new Vue({
    el: '#userList',
    created: function(){
        this.getUsers();
    },
    data: {
        users = []
    },

    methods:{

        getUsers: function(){
            var url = "users";
            Axios(url).then(Response=>{
                this.users = Response.data;
            });
        }
    }
    
});