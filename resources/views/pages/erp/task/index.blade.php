@extends('layout.erp.app')
@section('css')
<style>
        td {
            text-align: left !important;
        }

        th {
            text-align: left !important;
        }
        thead th {
            color: white!important;
            text-align: center !important;
        }
    </style>
    @endsection
    @section('content')
    <form action="{{url('system/tasks')}}" class="d-flex justify-content-center md-3" method="GET">
        <input value="{{request('search')}}" class="form-control w-25 me-2" type="search" name="search" placeholder="Search...">
        <button class="btn btn-success">Search</button>
    </form>

    <a href="{{route('tasks.create')}}"> Create Task</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark text-white fw-bold">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phase_id</th>
                    <th scope="col">Project_id</th>
                    <th scope="col">Start_date</th>
                    <th scope="col">End_date</th>
                    <th scope="col">Status_id</th>
                    <th scope="col">Supervisor_id</th>
                    <th scope="col">Manpower</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td>{{$task->name}}</td>
                        <td>{{$task->phase_id ?? '-'}}</td>
                        <td>{{$task->project_id ?? '-'}}</td>
                        <td>{{$task->start_date ?? '-'}}</td>
                        <td>{{$task->end_date ?? '-'}}</td>
                        <td>{{$task->status_id ?? '-'}}</td>
                        <td>{{$task->supervisor_id ?? '-'}}</td>
                        <td>{{$task->manpower ?? '-'}}</td>
                        <td>
                            <a href="{{url("system/tasks/$task->id/edit")}}"class="btn btn-sm btn-warning me-1">Edit</a>
                            <a href="{{url("system/tasks/$task->id")}}"class="btn btn-info">View</a>
                            <form action="{{ url('system/tasks', $task->id) }}" method="POST" class="d-inline"> 
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm ('Are you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No Data Found</td>
                    </tr>
                    @endforelse

                </tbody>
        </table>

    </div>
    
    <div class="d-flex justify-content-center mt-3">
        {{ $tasks->appends(request()->query())->links() }}
    </div>


    @endsection