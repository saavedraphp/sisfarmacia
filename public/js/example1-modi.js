new Vue({

    el: '#tasks',

    data: {
        message: 'Tasks',
        completed: null,
        newTaskName: '',
        tasklist: [
            { description: 'Read', completed: true, editing: false },
            { description: 'Write', completed: true, editing: false  },
            { description: 'Edit', completed: false, editing: false  },
            { description: 'Publish', completed: false, editing: false  }
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
            task.editing = false;
            console.log(task);
        }
    }

})