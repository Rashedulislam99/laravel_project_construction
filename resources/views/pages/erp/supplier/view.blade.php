@extends('layout.erp.app')

@section("css")
<style>
     td{
        text-align: left !important;
    }
    th{
        text-align: left !important;
    }
</style>
@endsection

@section('content')
<div class="container">

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Supplier Details</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered align-middle mb-0">
                <tbody>
                    <tr>
                        <th style="width: 200px;">ID</th>
                        <td>{{ $supplier->id }}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{ $supplier->name }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $supplier->email ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Phone</th>
                        <td>{{ $supplier->phone ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{ $supplier->address ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>
                            {{ $supplier->created_at
                                ? $supplier->created_at->format('d M Y, h:i A')
                                : '-' }}
                        </td>
                    </tr>

                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $supplier->updated_at
                                ? $supplier->updated_at->format('d M Y, h:i A')
                                : '-' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer text-end">
            <a href="{{ url('system/suppliers') }}" class="btn btn-secondary">
                Back
            </a>

            <a href="{{ url("system/suppliers/$supplier->id/edit") }}"
               class="btn btn-warning ms-1">
                Edit
            </a>
        </div>
    </div>

</div>
@endsection
