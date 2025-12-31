<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $Status = Status::orderBy("id", "desc")->paginate(8);
        return view("pages.erp.Status.index", ["Status" => $Status]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Status $Status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $Status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $Status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $Status)
    {
        //
    }
}
