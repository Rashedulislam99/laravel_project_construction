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
<form action="{{URL('system/employees')}}" class="d-flex justify-content-center md-3" method="GET">
    <input value="{{request('search')}}" class="form-control w-25 me-2" type="search" name="search" placeholder="Search...">
    <button class="btn btn-success">Search</button>
</form>

<a href="{{route('employees.create')}}"> Add employee</a>


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
                <th scope="row">{{$employee->id}}</th>
                <td>{{$employee->name}}</td>
                <!-- <td>{{$employee->role_id ?? '-'}}</td> -->
                <td>{{$employee->phone ?? '-'}}</td>
                <td>{{$employee->email ?? '-'}}</td>
                <td>{{$employee->address ?? '-'}}</td>
                <!-- <td>{{$employee->nid_number ?? '-'}}</td> -->
                <td>
                    @if($employee->photo)
                    <img src="{{ asset('uploads/employees/' . $employee->photo) }}"
                        width="90"
                        height="90"
                        style="object-fit: cover; border-radius: 5px;">
                    @else
                    {{ $employee->name }}
                    @endif
                </td>

                <!-- <td>{{$employee->active ?? '-'}}</td>
                <td>{{$employee->password ?? '-'}}</td> -->
                <td>
                    <a href="{{url("system/employees/$employee->id/edit")}}" class="btn btn-sm btn-warning me-1">Edit</a>
                    <a class="btn btn-info" href="{{url("system/employees/$employee->id")}}">View</a>

                    <form action="{{url('system/employees', $employee->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this employee?')">
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

    {{ $employees->appends(request()->query())->links() }}
</div>






@endsection
