@extends('layouts.app')
@section('content')
<h1>Projects</h1>
<a href="{{ route('projects.create') }}" class="btn btn-primary">Add New</a>
<ul>
@foreach ($projects as $project)
    <li> <a href="{{ route('projects.edit',$project) }}">{{ $project->name }}</a> </li>
@endforeach
</ul>
{{ $projects->links() }}

@endsection
