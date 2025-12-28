<?php

namespace App\Http\Controllers;

use App\Models\employees_task;
use App\Models\EmployeesTask; 
use Illuminate\Http\Request;



class EmployeesTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $employees_tasks = employees_task::orderBy("id", "desc")->paginate(8);
        return view("pages.erp.employee_task.index", ["employees_tasks" => $employees_tasks ]);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("pages.erp.employee_task.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(employees_task $employees_task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employees_task $employees_task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employees_task $employees_task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employees_task $employees_task)
    {
        //
    }
}
