@extends('layout.erp.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" name="name" id="name" value="{{ $task->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="project_id" class="form-label">Project</label>
            <select name="project_id" id="project_id" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status_id" class="form-label">Status</label>
            <select name="status_id" id="status_id" class="form-control" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $task->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="supervisor_id" class="form-label">Supervisor</label>
            <select name="supervisor_id" id="supervisor_id" class="form-control" required>
                @foreach($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}" {{ $task->supervisor_id == $supervisor->id ? 'selected' : '' }}>{{ $supervisor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ $task->start_date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ $task->end_date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="manpower" class="form-label">Manpower</label>
            <input type="number" name="manpower" id="manpower" value="{{ $task->manpower }}" class="form-control" required>
        </div>

        {{-- Task Materials / Details --}}
        <h4>Materials / Details</h4>
        <table class="table table-bordered" id="materials_table">
            <thead>
                <tr>
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Supplier</th>
                    <th>
                        <button type="button" id="add_row" class="btn btn-success btn-sm">Add</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($task->details as $index => $detail)
                <tr>
                    <td>
                        <select name="materials[{{ $index }}][material_id]" class="form-control" required>
                            @foreach($materials as $material)
                                <option value="{{ $material->id }}" {{ $material->id == $detail->material_id ? 'selected' : '' }}>{{ $material->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="materials[{{ $index }}][quantity]" value="{{ $detail->quantity }}" class="form-control" required>
                    </td>
                    <td>
                        <select name="materials[{{ $index }}][supplier_id]" class="form-control" required>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $supplier->id == $detail->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove_row">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary mt-3">Save Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection

{{-- Dynamic JS --}}
@section('js')
<script>
let rowIndex = {{ $task->details->count()}};

document.getElementById('add_row').addEventListener('click', function(){
    let table = document.getElementById('materials_table').getElementsByTagName('tbody')[0];
    let newRow = table.insertRow();
    newRow.innerHTML = `
        <td>
            <select name="materials[${rowIndex}][material_id]" class="form-control" required>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" name="materials[${rowIndex}][quantity]" class="form-control" required>
        </td>
        <td>
            <select name="materials[${rowIndex}][supplier_id]" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove_row">Remove</button>
        </td>
    `;
    rowIndex++;
});

document.addEventListener('click', function(e){
    if(e.target && e.target.classList.contains('remove_row')){
        e.target.closest('tr').remove();
    }
});
</script>
@endsection
