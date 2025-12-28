<?php

namespace App\Http\Controllers;

use App\Models\material;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::orderBy("id", "desc")->paginate(8);
        return view("pages.erp.material.index", ["material" => $materials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.erp.material.create");
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
    public function show(string $id)
    {
       $material= material::find($id);
        return view("pages.erp.material.view", compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $materials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $materials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $materials)
    {
        //
    }
}
