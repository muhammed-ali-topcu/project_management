@extends('layouts.app')
@section('content')
<h1>Edit Project</h1>

@include('errors')
<form action="{{ route('projects.destroy',compact('project')) }}" method="POST" id="form_delete_project">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-primary btn-danger" >


    </form>

<form action="{{ route('projects.update',compact('project') )}}" method="POST" id="form_edit_project" >
        @method('PATCH')
        @csrf
        <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary"  onchange="">
            </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name')??  $project->name }}">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <textarea class="form-control" name="description" id="description">{{ old('description', $project->description)  }}</textarea>
        </div>
 </form>
        @foreach ($project->tasks as $task)
        <div class="row">

        <form  action="{{ route('task.update',compact('task')) }}" method="POST" >
            @csrf
            @method('PUT')
                    <div class="row form-group">
                            <div class="col form-control">
                                <input type="checkbox" name="task_completed" {{ ($task->completed)?'checked':'' }} >
                                <label for=""> completed </label>
                            </div>
                            <div class="col">
                                <input type="text" name="task_title" class="form-control" value="{{ $task->title }}">
                            </div>
                            <div class="col">
                                <input type="date" name="task_last_date" class="form-control" placeholder="last date" value="{{ $task->last_date }}">
                            </div>
                            <div class="col ">
                                <input type="submit" value="OK">
                            </div>
                        </div>
        </form>
        <form action="{{ route('task.destroy',compact('task')) }}" method="post">
            @csrf
            @method('DELETE')
            <input class="col" type="submit" value="Remove" >
        </form>

    </div>
        @endforeach


    <form  action="/projects/{{ $project->id }}/tasks" method="post">
        @csrf
                    <div class="row form-group">
                        <div class="col form-control">
                            <input type="checkbox" name="task_completed" checked >
                            <label for=""> completed </label>
                        </div>
                        <div class="col">
                            <input type="text" name="task_title" class="form-control" placeholder="title">
                        </div>
                        <div class="col">
                            <input type="date" name="task_last_date" class="form-control" placeholder="last date">
                        </div>
                        <div class="col ">
                            <input type="submit" value="save">
                        </div>
                    </div>
    </form>
@endsection
