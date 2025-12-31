@extends('layout.erp.app')

@section("css")
<style>
    td {
        text-align: left !important;
    }
    th {
        text-align: left !important;
    }
    thead th {
        color: white !important;
        text-align: center !important;
    }

    /* ===== PRINT ONLY CSS ===== */
    @media print {
        body * {
            visibility: hidden;
        }

        .print-area, .print-area * {
            visibility: visible;
        }

        .print-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .no-print {
            display: none !important;
        }
    }
</style>
@endsection

@section('content')
<div class="print-area">
<div class="container mt-4">
    <h2>Task Details</h2>

    {{-- Main Task Info --}}
    <div class="card mb-3">
        <div class="card-body">
            <h4>{{ $task->name }}</h4>
            <p><strong>Project:</strong> {{ $task->project->name ?? 'N/A' }}</p>
            <p><strong>Status:</strong> {{ $task->status->name ?? 'N/A' }}</p>
            <p><strong>Supervisor:</strong> {{ $task->supervisor->name ?? 'N/A' }}</p>
            <p><strong>Start Date:</strong> {{ $task->start_date }}</p>
            <p><strong>End Date:</strong> {{ $task->end_date }}</p>
            <p><strong>Manpower:</strong> {{ $task->manpower }}</p>
        </div>
    </div>

    {{-- Task Materials / Details --}}
    @if($task->details->count())
    <div class="card">
        <div class="card-header">
            <h5>Materials / Task Details</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered align-middle">
    <thead class="table-dark text-white fw-bold">
        <tr>
            <th>Material</th>
            <th>Quantity</th> {{-- quantity দেখাব --}}
            <th>Unit</th>
            <th>Vendor / Supplier</th>
        </tr>
    </thead>
    <tbody>
        @php $totalQuantity = 0; @endphp
        @foreach($task->details as $detail)
            <tr>
                <td>{{ $detail->material->name ?? 'N/A' }}</td>
                <td>{{ $detail->quantity ?? 0 }}</td>
                <td>{{ $detail->material->unit ?? 'N/A' }}</td>
                <td>{{ $detail->supplier->name ?? 'N/A' }}</td>
            </tr>
            @php $totalQuantity += $detail->quantity ?? 0; @endphp
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th>{{ $totalQuantity }}</th>
            <th colspan="2"></th>
        </tr>
    </tfoot>
</table>

        </div>
    </div>
    @else
    <p>No materials or task details found.</p>
    @endif

    
</div>
</div>



<div>
    <!-- buttons (will not print) -->
<button onclick="window.print()" class="btn btn-primary mb-3 no-print">
    🖨️ Print
</button>

<a href="{{ url('system/tasks') }}" class="btn btn-secondary mb-3 no-print">
    Back to Task
</a>

</div>


<!-- <div class="container">

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
                        <th>Project ID</th>
                        <td>{{ $task->project_id ?? '-' }}</td>
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
                        <th>Status ID</th>
                        <td>
                            <span class="badge bg-info">
                                {{ $task->status_id ?? '-' }}
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <th>Supervisor ID</th>
                        <td>{{ $task->supervisor_id ?? '-' }}</td>
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

</div> -->
@endsection
