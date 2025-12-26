<?php

namespace App\Http\Controllers;

use App\Models\Task;
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

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.erp.tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new task();
        $task->name= $request->name;
        $task->phase_id=$request->phase_id;
        $task->project_id=$request->project_id;
        $task->start_date=$request->start_date;
        $task->end_date=$request->end_date;
        $task->status_id=$request->status_id;
        $task->supervisor_id=$request->supervisor_id;
        $task->save;
        return redirect("system/tasks")->with("success", "tasks save Successfully");

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
    public function edit(Task $task)
    {
         
        return view("pages.erp.task.edit", compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, string $id)
    {
       $task= task::findOrFail($id);
        $task->name= $request->name;
        $task->phase_id=$request->phase_id;
        $task->project_id=$request->project_id;
        $task->start_date=$request->start_date;
        $task->end_date=$request->end_date;
        $task->status_id=$request->status_id;
        $task->supervisor_id=$request->supervisor_id;
    
       $task->save();
       return redirect("system/tasks")->with("success", "task updated
       Successfully");
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
