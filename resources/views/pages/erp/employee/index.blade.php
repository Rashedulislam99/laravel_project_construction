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
            color: white !important;
            text-align: center !important;
        }
    </style>
@endsection
@section('content')
    <form action="{{ URL('system/employees') }}" class="d-flex justify-content-center md-3" method="GET">
        <input value="{{ request('search') }}" class="form-control w-25 me-2" type="search" name="search"
            placeholder="Search...">
        <button class="btn btn-success">Search</button>
    </form>

    <a href="{{ route('employees.create') }}"> Add employee</a>


    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark text-white fw-bold">
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Name</th>
                    <!-- <th scope="col">Role_id</th> -->
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <!-- <th scope="col">NID Number</th> -->
                    <th scope="col">Photo</th>
                    <!-- <th scope="col">Active</th> -->
                    <!-- <th scope="col">Password</th> -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <th scope="row">{{ $employee->id }}</th>
                        <td>{{ $employee->name }}</td>
                        <!-- <td>{{ $employee->role_id ?? '-' }}</td> -->
                        <td>{{ $employee->phone ?? '-' }}</td>
                        <td>{{ $employee->email ?? '-' }}</td>
                        <td>{{ $employee->address ?? '-' }}</td>
                        <!-- <td>{{ $employee->nid_number ?? '-' }}</td> -->
                        <td>
                            @if ($employee->photo)
                                <img src="{{ asset('uploads/employees/' . $employee->photo) }}" width="90"
                                    height="90" style="object-fit: cover; border-radius: 5px;">
                            @else
                                {{ $employee->name }}
                            @endif
                        </td>

                        <!-- <td>{{ $employee->active ?? '-' }}</td>
                            <td>{{ $employee->password ?? '-' }}</td> -->
                        <td>
                            <a href="{{ url("system/employees/$employee->id/edit") }}" class="btn btn-sm btn-warning me-1"
                                title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg>
                            </a>
                            <a class="btn btn-sm btn-info me-1" href="{{ url("system/employees/$employee->id") }}"
                                title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                            </a>

                            <form action="{{ url('system/employees', $employee->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this employee?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">

        {{ $employees->appends(request()->query())->links() }}
    </div>
@endsection
