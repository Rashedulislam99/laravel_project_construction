<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
   public function index()
{
    $inventorys = Inventory::orderBy("id", "desc")->paginate(8);
    return view("pages.erp.inventory.index", ["inventorys" => $inventorys]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.erp.inventory.create");
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
       $inventorys= Inventory::find($id);
        return view("pages.erp.inventory.view", compact('inventorys'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
