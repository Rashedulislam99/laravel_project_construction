@extends("layout.erp.app")
@section("content")

<div class="container mt-4">
    <h2>Create New Project</h2>
<form action="{{ url('system/projects') }}" method="POST">
    @csrf
    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Project Name</label>
        <input type="text" name="name" class="form-control" id="name"
               value="{{ old('name') }}" required>
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
    </div>

    <!-- Status ID -->
    <div class="mb-3">
        <label for="status_id" class="form-label">Status ID</label>
        <input type="number" name="status_id" class="form-control" id="status_id"
               value="{{ old('status_id') }}">
    </div>

    <!-- Place -->
    <div class="mb-3">
        <label for="place" class="form-label">Place</label>
        <input type="text" name="place" class="form-control" id="place"
               value="{{ old('place') }}">
    </div>

    <!-- Budget -->
    <div class="mb-3">
        <label for="budget" class="form-label">Budget</label>
        <input type="text" name="budget" class="form-control" id="budget"
               value="{{ old('budget') }}">
    </div>

    <!-- Start Date -->
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" class="form-control" id="start_date"
               value="{{ old('start_date') }}">
    </div>

    <!-- End Date -->
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" name="end_date" class="form-control" id="end_date"
               value="{{ old('end_date') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
