@extends('layout.erp.app')

@section("css")
<style>
    td, th {
        text-align: left !important;
        vertical-align: middle;
    }
</style>
@endsection

@section('content')
<div class="container">

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Task Details</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered align-middle mb-0">
                <tbody>

                    <tr>
                        <th style="width: 220px;">ID</th>
                        <td>{{ $task->id }}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{ $task->name }}</td>
                    </tr>

                    <tr>
                        <th>Phase ID</th>
                        <td>{{ $task->phase_id ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Project</th>
                        <td>{{ $task->project->name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Start Date</th>
                        <td>{{ $task->start_date ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>End Date</th>
                        <td>{{ $task->end_date ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge bg-info">
                                {{ $task->status->name ?? '-' }}
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <th>Supervisor</th>
                        <td>{{ $task->supervisor->name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Manpower</th>
                        <td>{{ $task->manpower ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>
                            {{ $task->created_at
                                ? $task->created_at->format('d M Y, h:i A')
                                : '-' }}
                        </td>
                    </tr>

                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $task->updated_at
                                ? $task->updated_at->format('d M Y, h:i A')
                                : '-' }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="card-footer text-end">
            <a href="{{ url('system/tasks') }}" class="btn btn-secondary">
                Back
            </a>

            <a href="{{ url("system/tasks/$task->id/edit") }}"
               class="btn btn-warning ms-1">
                Edit
            </a>
        </div>
    </div>

</div>
@endsection
