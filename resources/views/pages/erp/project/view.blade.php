@extends("layout.erp.app")
@section('css')
    <style>
        td {
            text-align: left !important;
        }

        th {
            text-align: left !important;
        }
        thead th {
            color: rgb(0, 0, 0)!important;
            text-align: center !important;
        }
    </style>

@endsection

@section("content")

@php
// dd($project->toArray());
@endphp


<div class="container mt-4">
    <h2>Project Details</h2>
    <table class="table table-bordered">
        <tr><th>ID</th><td>{{ $project->id }}</td></tr>
        <tr><th>Name</th><td>{{ $project->name }}</td></tr>
        <tr><th>Description</th><td>{{ $project->description ?? '-' }}</td></tr>
        <tr><th>Status</th><td>{{ $project->status_id ?? '-' }}</td></tr>
        <tr><th>Place</th><td>{{ $project->place ?? '-' }}</td></tr>
        <tr><th>Budget</th><td>{{ $project->budget ?? '-' }}</td></tr>
        <tr><th>Start Date</th><td>{{ $project->start_date ?? '-' }}</td></tr>
        <tr><th>End Date</th><td>{{ $project->end_date ?? '-' }}</td></tr>
    </table>
    <h2>Project Task Details</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Task ID</th>
                <th>Task Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($project->tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>





    <a href="{{ url('system/projects') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
