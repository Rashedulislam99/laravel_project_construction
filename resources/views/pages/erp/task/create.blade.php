@extends('layout.erp.app')
@section('content')

  <h2>Create Project Tasks</h2>

  <form id="projectForm">
    <div class="mb-3">
      <label for="projectName" class="form-label">Project Name</label>
     <select name="project_id" class="form-select me-2 task-dropdown" required>
          @foreach ($projects as $project )
             <option value="{{$project->id}}">{{$project->name}}</option>
          @endforeach

        </select>
    </div>

    <div id="tasksContainer">
      <div class="mb-3 task-row d-flex align-items-center">
        <select name="task_id" class="form-select me-2 task-dropdown" required>
          @foreach ($tasks as $task )
             <option value="{{$task->id}}">{{$task->name}}</option>
          @endforeach

        </select>
        <button type="button" class="btn btn-danger btn-sm remove-task">Remove</button>
      </div>
    </div>

    <button type="button" id="addTask" class="btn btn-primary mb-3">Add Task</button>
    <br>
    <button type="submit" class="btn btn-success">Save Project</button>
  </form>

  <div id="result" class="mt-4"></div>
</div>










@endsection

@section('js')

<script>
document.addEventListener("DOMContentLoaded", () => {
  const tasksContainer = document.getElementById("tasksContainer");
  const addTaskBtn = document.getElementById("addTask");

  // Add new task row
  addTaskBtn.addEventListener("click", () => {
    const taskRow = document.createElement("div");
    taskRow.classList.add("mb-3", "task-row", "d-flex", "align-items-center");
    taskRow.innerHTML = `
      <select class="form-select me-2 task-dropdown" required>
        <option value="">Select Task</option>
        <option value="Design">Design</option>
        <option value="Development">Development</option>
        <option value="Testing">Testing</option>
        <option value="Deployment">Deployment</option>
      </select>
      <button type="button" class="btn btn-danger btn-sm remove-task">Remove</button>
    `;
    tasksContainer.appendChild(taskRow);

    // Add remove functionality
    taskRow.querySelector(".remove-task").addEventListener("click", () => {
      taskRow.remove();
    });
  });

  // Remove task row functionality for initial row
  tasksContainer.querySelector(".remove-task").addEventListener("click", function() {
    this.parentElement.remove();
  });

  // Handle form submission
  document.getElementById("projectForm").addEventListener("submit", (e) => {
    e.preventDefault();
    const projectName = document.getElementById("projectName").value;
    const tasks = Array.from(document.querySelectorAll(".task-dropdown")).map(t => t.value);
    const resultDiv = document.getElementById("result");
    resultDiv.innerHTML = `<h5>Project: ${projectName}</h5><p>Tasks: ${tasks.join(", ")}</p>`;
  });
});
</script>


@endsection
