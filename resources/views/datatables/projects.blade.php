@extends('layouts.datatable')
@section('content')

projects

<table class="table table-bordered" id="projects-table">

    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Owner</th>
            <th></th>
        </tr>
    </thead>
</table>

@endsection
@push('scripts')
    <script>
        $(function(){
           $('#projects-table').DataTable({
                 processing: true,
               serverSide: true,
               select:true,
                ajax:"{!! route('getProjects')  !!}",
                columns:[
                    {data:'id',name: 'id'},
                    {data:'name',name: 'name'},
                    {data:'description',name: 'description'},
                ]

           });
        });

    </script>

@endpush

