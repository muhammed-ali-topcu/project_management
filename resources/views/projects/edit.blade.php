@extends('layouts.app')
@section('content')
<h1>Edit Project</h1>

@include('errors')
    <form action="{{ route('projects.update',compact('project') )}}" method="POST" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name')??  $project->name }}">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <textarea class="form-control" name="description" id="description">{{ old('description', $project->description)  }}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary" >
        </div>
    </form>
    <form action="{{ route('projects.destroy',compact('project')) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-primary btn-danger" >


    </form>
@endsection
