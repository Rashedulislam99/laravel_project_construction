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

@section("content")



<!-- ===== PRINT AREA START ===== -->
<div class="print-area">

    <div class="container mt-4">
        <h2 class="text-center mb-3">Employee Details</h2>

        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $employee->id }}</td></tr>
            <tr><th>Name</th><td>{{ $employee->name }}</td></tr>
            <tr><th>Role ID</th><td>{{ $employee->role_id ?? '-' }}</td></tr>
            <tr><th>Phone</th><td>{{ $employee->phone ?? '-' }}</td></tr>
            <tr><th>Email</th><td>{{ $employee->email ?? '-' }}</td></tr>
            <tr><th>Address</th><td>{{ $employee->address ?? '-' }}</td></tr>
            <tr><th>NID Number</th><td>{{ $employee->nid_number ?? '-' }}</td></tr>

            <tr>
                <th>Photo</th>
                <td>
                    @if($employee->photo)
                        <img src="{{ asset('uploads/employees/' . $employee->photo) }}"
                             width="120"
                             style="border-radius: 6px;">
                    @else
                        {{ $employee->name }}
                    @endif
                </td>
            </tr>

            <tr><th>Active</th><td>{{ $employee->active ? 'Yes' : 'No' }}</td></tr>
        </table>

        <h4 class="mt-4">Employee Role Details</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Role ID</th>
                    <th>Role Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $employee->role->id ?? '-' }}</td>
                    <td>{{ $employee->role->name ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

    </div>

</div>
<div>
    <!-- buttons (will not print) -->
<button onclick="window.print()" class="btn btn-primary mb-3 no-print">
    🖨️ Print
</button>

<a href="{{ url('system/employees') }}" class="btn btn-secondary mb-3 no-print">
    Back
</a>

</div>


@endsection
