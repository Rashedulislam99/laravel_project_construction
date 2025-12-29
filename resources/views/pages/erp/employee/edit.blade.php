@extends('layout.erp.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Employee</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role_id" class="form-control">
                @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $employee->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ $employee->address }}">
        </div>

        <div class="mb-3">
            <label>NID Number</label>
            <input type="text" name="nid_number" class="form-control" value="{{ $employee->nid_number }}">
        </div>
        <div class="mb-3">
            <label>Photo</label><br>

            @if($employee->photo)
            <img src="{{ asset('uploads/employees/' . $employee->photo) }}"
                alt="Photo"
                width="100"
                class="mb-2">
            @endif

            <input type="file" name="photo" class="form-control">
        </div>


        <div class="mb-3">
            <label>Active</label>
            <select name="active" class="form-control">
                <option value="1" {{ $employee->active == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $employee->active == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="text" name="password" class="form-control" value="{{ $employee->password }}">
        </div>

        <button type="submit" class="btn btn-success">Update Employee</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection