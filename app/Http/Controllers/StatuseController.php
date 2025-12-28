<?php

namespace App\Http\Controllers;

use App\Models\Statuse;
use Illuminate\Http\Request;

class StatuseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $statuse = Statuse::orderBy("id", "desc")->paginate(8);
        return view("pages.erp.statuse.index", ["Statuse" => $statuse]);
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
    public function show(Statuse $statuse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statuse $statuse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statuse $statuse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statuse $statuse)
    {
        //
    }
}
