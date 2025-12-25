<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      
        $projects = Project::when($request->search, function($query) use($request){
            return $query->whereAny([
               "name",  
               "place", 
               "budget"
            ], "LIKE","%".$request->search."%");
        })->orderBy("id","desc")->paginate(8);
        return view('pages.erp.project.index', ["projects"=>$projects]);

      //  return view("pages.erp.supplier.index", ["suppliers"=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.erp.project.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $project = new Project();
    $project->name = $request->name;
    $project->description = $request->description;
    $project->status_id = $request->status_id;
    $project->place = $request->place;
    $project->budget = $request->budget;
    $project->start_date = $request->start_date;
    $project->end_date = $request->end_date;
    $project->save();

        return redirect("system/projects")->with("success", "project Save successfully");


    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project= Project::find($id);
    
        return view("pages.erp.project.view", compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
         return view("pages.erp.project.edit", compact('project'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

{
    $project = Project::findOrFail($id); // 
    $project->name        = $request->name;
    $project->description = $request->description;
    $project->status_id   = $request->status_id;
    $project->place       = $request->place;
    $project->budget      = $request->budget;
    $project->start_date  = $request->start_date;
    $project->end_date    = $request->end_date;

    $project->save();

    return redirect("system/projects")
        ->with("success", "Project updated successfully");
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project::findOrFail($id)->delete(); return redirect("system/projects")->with("success", "Project deleted successfully");
    }
}
