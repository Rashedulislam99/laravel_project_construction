@extends('layout.erp.app')
@section("content")
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Edit Project</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('system/projects', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $project->name) }}" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">
                        {{ old('description', $project->description) }}
                    </textarea>
                </div>

                <!-- Status -->
               <div class="mb-3">
                    <label class="form-label">status_id</label>
                    <input type="number" step="0.01" name="status_id" class="form-control"
                           value="{{ old('status_id', $project->status_id) }}">
                </div>

                <!-- Place -->
                <div class="mb-3">
                    <label class="form-label">Place</label>
                    <input type="text" name="place" class="form-control"
                           value="{{ old('place', $project->place) }}">
                </div>

                <!-- Budget -->
                <div class="mb-3">
                    <label class="form-label">Budget</label>
                    <input type="number" step="0.01" name="budget" class="form-control"
                           value="{{ old('budget', $project->budget) }}">
                </div>

                <!-- Start Date -->
                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control"
                           value="{{ old('start_date', $project->start_date) }}">
                </div>

                <!-- End Date -->
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control"
                           value="{{ old('end_date', $project->end_date) }}">
                </div>

                <!-- Buttons -->
                <button type="submit" class="btn btn-success">Update Project</button>
                <a href="{{ url('system/projects') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
