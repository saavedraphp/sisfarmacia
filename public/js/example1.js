new Vue({

    el: '#tasks',

    data: {
        message: 'Tasks',
        completed: null,
        newTaskName: '',
        tasklist: [
            { description: 1, completed: true, editing: false ,total:2},
            { description: 2, completed: true, editing: false  ,total:3},
            { description: 3, completed: false, editing: false  ,total:4},
            { description: 4, completed: false, editing: false  ,total:5}
        ]
    },

    methods: {
        completeTask: function(task){
            task.completed = true;
        },
        newTask: function(){
            this.tasklist.push({description: this.newTaskName, completed: false, editing: false});
        },
        removeTask: function(task){
            this.tasklist.splice(this.tasklist.indexOf(task), 1);
            console.log(task);
        },
        editTask: function(task){
            
            task.total = parseInt(task.description) + parseInt(task.total);
            task.editing = false;
            console.log(task);
        }
    }

})