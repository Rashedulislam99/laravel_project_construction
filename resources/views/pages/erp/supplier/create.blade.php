

@extends("layout.erp.app")
@section("content")

<div class="container mt-4">
    <h2>Create New Supplier</h2>
<form action="{{ url('system/suppliers') }}" method="POST">
    @csrf
    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name"
               value="{{ old('name') }}" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email"
               value="{{ old('email') }}">
        <div class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone"
               value="{{ old('phone') }}">
    </div>

    <!-- Address -->
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" class="form-control" id="address" rows="3">{{ old('address') }}</textarea>
    </div>

    <!-- Status -->
    <!-- <div class="mb-3 form-check">
        <input type="checkbox" name="status" class="form-check-input" id="status" value="1" checked>
        <label class="form-check-label" for="status">Active</label>
    </div> -->

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
