@extends('layout.erp.app')
@section('css')
    <style>
        td {
            text-align: center !important;
        }

        th {
            text-align: center !important;
        }
        thead th {
            color: white!important;
            text-align: center !important;
        }
    </style>

@endsection
@section('content')
<form  action="{{URL('system/projects')}}" class="d-flex justify-content-center md-3" method="GET">
    <input value="{{request('search')}}" class="form-control w-25 me-2" type="search" name="search" placeholder="Search...">
    <button class="btn btn-success">Search</button>
</form>

<a href="{{route('projects.create')}}"> Add Project</a>


    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
          <thead class="table-dark text-white fw-bold">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status_id</th>
                    <th scope="col">Place</th>
                    <th scope="col">Budget</th>
                    <th scope="col">Start_date</th>
                    <th scope="col">end_date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td>{{$project->name}}</td> 
                    <td>{{$project->description ?? '-'}}</td>
                    <td>{{$project->status_id ?? '-'}}</td>
                    <td>{{$project->place ?? '-'}}</td> 
                    <td>{{$project->budget ?? '-'}}</td>
                    <td>{{$project->start_date ?? '-'}}</td>
                    <td>{{$project->end_date ?? '-'}}</td>
                    <td>
                        <a href="{{url("system/projects/$project->id/edit")}}" class="btn btn-sm btn-warning me-1">Edit</a>
                        <a class="btn btn-info" href="{{url("system/projects/$project->id")}}">View</a>
                        
                        <form action="{{url('system/projects', $project->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this project?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>             
        </table>
    </div>

 <div class="d-flex justify-content-center mt-3">
     
        {{ $projects->appends(request()->query())->links() }}
    </div>

    
@endsection