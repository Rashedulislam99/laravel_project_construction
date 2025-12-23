<!-- Bootstrap 5 CSS -->

@extends('layout.erp.app')
@section("content")
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Edit Supplier</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('system/suppliers', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $supplier->name) }}"
                        required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $supplier->email) }}">
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        value="{{ old('phone', $supplier->phone) }}">
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea
                        name="address"
                        class="form-control"
                        rows="3">{{ old('address', $supplier->address) }}</textarea>
                </div>

                <!-- Buttons -->
                <button type="submit" class="btn btn-success">
                    Update Supplier
                </button>
                <a href="{{ url('system/suppliers') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
