@extends('layout.erp.app')
@section('css')
    <style>
        td {
            text-align: center !important;
        }

        th {
            text-align: center !important;
        }
    </style>
@endsection
@section('content')

    <form action="{{ URL('system/suppliers') }}" method="GET">
        <div class="mb-3 d-flex">
            <input value="{{ request('search') }}" type="text" class="form-control" id="search" name="search"
                placeholder="Search data">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

   
<a href="{{ route('suppliers.create') }}">Add Supplier</a>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                        <tr>
                            <th scope="row">{{ $supplier->id }}</th>
                            <td> {{ $supplier->name }}</td>
                            <td>{{ $supplier->email ?? '-' }}</td>
                            <td>{{ $supplier->phone ?? '-' }}</td>
                            <td class="text-center">

                                <a href="{{ url("system/suppliers/$supplier->id/edit") }}" class="btn btn-sm btn-warning me-1">Edit </a>

                                <a class="btn btn-info" href="{{ url("system/suppliers/$supplier->id") }}">view </a>
                                <form action="{{ url('system/suppliers', $supplier->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this supplier?')">
                                        Delete
                                    </button>
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

    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $suppliers->appends(request()->query())->links() }}
    </div>
@endsection

