<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Material;
use App\Models\Project;
use App\Models\Status;
use App\Models\Supplier;
use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy("id", "desc")->paginate(8);
        $tasks = Task::when($request->search, function($query) use($request){
            return $query->whereAny([
                "name",
                "start_date",
                "end_date",
                "manpower"
            ], "LIKE","%".$request->search."%");
        })->orderBy("id","desc")->paginate(8);
        return view("pages.erp.task.index",["tasks"=>$tasks]);

//         {
//     $projects = Project::with([
//         'tasks.status',        // Task এর Status
//         'tasks.supervisor',   // Task এর Supervisor
//         'tasks.employees',     // Task এর Workers
//         'tasks.materials.material.supplier' // Task Materials + Vendor
//     ])->orderBy('id', 'desc')->get();

//     return $projects;
// }
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $projects = Project::all();
    //     $tasks = Task::all();
    //     return view("pages.erp.task.create",compact('tasks', 'projects'));
    // }

   public function create()
{
    $projects    = Project::all();
    $statuses    = Status::all();
    $supervisors = Employee::all();
    $phases      = Status::all();
    $materials   = Material::all();
    $suppliers   = Supplier::all();

    return view('pages.erp.task.create', compact(
        'projects',
        'statuses',
        'supervisors',
        'phases',
        'materials',
        'suppliers'
    ));
}


    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $task = new task();
    //     $task->name= $request->name;
    //     $task->phase_id=$request->phase_id;
    //     $task->project_id=$request->project_id;
    //     $task->start_date=$request->start_date;
    //     $task->end_date=$request->end_date;
    //     $task->status_id=$request->status_id;
    //     $task->supervisor_id=$request->supervisor_id;
    //     $task->save;
    //     return redirect("system/tasks")->with("success", "tasks save Successfully");

    // }


    public function store(Request $request)
{
    $request->validate([
        'name'         => 'required|string|max:255',
        'project_id'   => 'required',
        'status_id'    => 'required',
        'supervisor_id'=> 'required',
        'start_date'   => 'required|date',
        'end_date'     => 'required|date',
        'manpower'     => 'required|numeric',
        'phase_id'     => 'nullable',
        'materials.*.material_id' => 'required',
        'materials.*.quantity'    => 'required|numeric',
    ]);

    // Create Task
    $task = Task::create([
        'name'          => $request->name,
        'project_id'    => $request->project_id,
        'status_id'     => $request->status_id,
        'supervisor_id' => $request->supervisor_id,
        'phase_id'      => $request->phase_id,
        'start_date'    => $request->start_date,
        'end_date'      => $request->end_date,
        'manpower'      => $request->manpower,
    ]);

    // Save Task Details
    if($request->has('materials')){
        foreach($request->materials as $detail){
            $task->details()->create([
                'material_id' => $detail['material_id'],
                'quantity'    => $detail['quantity'],
                'project_id'  => $request->project_id,
                'supplier_id' => $detail['supplier_id'],
            ]);
        }
    }

    return redirect()->route('tasks.index')->with('success','Task created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task= task::find($id);
        return view("pages.erp.task.view", compact('task'));
    }
    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $task        = Task::with('details')->findOrFail($id);
    $projects    = Project::all();
    $statuses    = Status::all();
    $supervisors = Employee::all();
    $materials   = Material::all();
    $suppliers   = Supplier::all();

    return view('pages.erp.task.edit', compact(
        'task',
        'projects',
        'statuses',
        'supervisors',
        'materials',
        'suppliers'
    ));
}

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
{
    $request->validate([
        'name'         => 'required|string|max:255',
        'project_id'   => 'required',
        'status_id'    => 'required',
        'supervisor_id'=> 'required',
        'start_date'   => 'required|date',
        'end_date'     => 'required|date',
        'manpower'     => 'required|numeric',
        'phase_id'     => 'nullable',
        'materials.*.material_id' => 'required',
        'materials.*.quantity'    => 'required|numeric',
        'materials.*.supplier_id' => 'required',
    ]);

    $task = Task::findOrFail($id);

    $task->update([
        'name'          => $request->name,
        'project_id'    => $request->project_id,
        'status_id'     => $request->status_id,
        'supervisor_id' => $request->supervisor_id,
        'phase_id'      => $request->phase_id,
        'start_date'    => $request->start_date,
        'end_date'      => $request->end_date,
        'manpower'      => $request->manpower,
    ]);

    // Delete old details & add new ones
    $task->details()->delete();

    if($request->has('materials')){
        foreach($request->materials as $detail){
            $task->details()->create([
                'material_id' => $detail['material_id'],
                'quantity'    => $detail['quantity'],
                'project_id'  => $request->project_id,
                'supplier_id' => $detail['supplier_id'],
            ]);
        }
    }

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         task::findOrFail($id)->delete();
         return redirect("system/tasks")->with("success", "task deleted
        Successfully");
    }




}
