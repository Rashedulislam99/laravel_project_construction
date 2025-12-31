@extends('layout.erp.app')

@section('content')
<div class="container mt-4">
    <h2>Create Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        {{-- Task Info --}}
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Project</label>
            <select name="project_id" class="form-control" required>
                <option value="">-- Select Project --</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status_id" class="form-control" required>
                <option value="">-- Select Status --</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Supervisor</label>
            <select name="supervisor_id" class="form-control" required>
                <option value="">-- Select Supervisor --</option>
                @foreach($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Phase</label>
            <select name="phase_id" class="form-control">
                <option value="">-- Select Phase --</option>
                @foreach($phases as $phase)
                    <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Manpower</label>
            <input type="number" name="manpower" class="form-control" required>
        </div>

        {{-- Task Details / Materials --}}
        <hr>
        <h5>Task Materials / Details</h5>

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
        <tr>
            <td>
                <select name="materials[0][material_id]" class="form-control material-select" required>
                    <option value="">-- Select Material --</option>
                    @foreach($materials as $material)
                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="materials[0][quantity]" class="form-control" required>
            </td>
            <td>
                <select name="materials[0][supplier_id]" class="form-control supplier-select" required>
                    <option value="">-- Select Supplier --</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>


        <button type="submit" class="btn btn-primary mt-2">Save Task</button>
    </form>
</div>

{{-- Dynamic JS --}}
@section('js')
<script>
let rowIndex = 1;

document.getElementById('add_row').addEventListener('click', function(){
    let table = document.getElementById('materials_table').getElementsByTagName('tbody')[0];
    let newRow = table.insertRow();
    newRow.innerHTML = `
        <td>
            <select name="materials[${rowIndex}][material_id]" class="form-control material-select" required>
                <option value="">-- Select Material --</option>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" name="materials[${rowIndex}][quantity]" class="form-control" required>
        </td>
        <td>
            <select name="materials[${rowIndex}][supplier_id]" class="form-control supplier-select" required>
                <option value="">-- Select Supplier --</option>
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

@endsection
