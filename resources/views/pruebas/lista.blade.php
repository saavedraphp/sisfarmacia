@extends('layouts.app')

@section('content')


<div class="col-md-12"   id="tasks">

<div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
            @{{ message }}
        </h3>
      </div>
      <ul class="list-group">
        <li class="list-group-item clearfix" v-for="task in tasklist" >
            <strong v-if="!task.editing">@{{task.description }}</strong>
            <strong >@{{task.total }}</strong>
            <input v-model="task.description" v-if="task.editing" @keyup.enter="editTask(task)" type="text" class="form-control input-height pull-left">
            <div class="btn-group btn-group-sm pull-right" role="group" v-if="!task.completed">
              <button type="button" class="btn btn-default" @click="completeTask(task)">Complete</button>
              <button type="button" @click="task.editing = true" class="btn btn-default">Edit</button>
              <button type="button" class="btn btn-default" @click="removeTask(task)">Remove</button>
            </div>
            <button class="btn btn-default btn-sm completed text-muted pull-right disabled btn-width" v-else>Completed</button>
        </li>
        <li class="list-group-item clearfix">
            <input v-model="newTaskName" @keyup.enter="newTask" type="text" class="form-control input-height pull-left">
            <button class="btn btn-success btn-sm pull-right btn-width" @click="newTask">Add Task</button>
        </li>
      </ul>
    </div>


</div>


@endsection
@section('scripts')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
<script src="{{ asset('js/example1.js') }}" ></script>
 
@endsection