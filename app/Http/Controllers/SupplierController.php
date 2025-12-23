<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers= Supplier::select("id","name","email","phone")->paginate(5);
      return view("pages.erp.supplier.index", ["suppliers"=>$suppliers]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view("pages.erp.supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier= new supplier();
       $supplier->name= $request->name;
       $supplier->email= $request->email;
       $supplier->phone= $request->phone;
       $supplier->address= $request->address;
    //    $supplier->password= Hash::make($request->password);
       $supplier->save();
       return redirect("system/suppliers")->with("success", "supplier Save
       Successfully");
    }

    /**
     * Display the specified resource.
     */
     public function show(string $id)
    {
        $supplier= supplier::find($id);
        return view("pages.erp.supplier.view", compact('supplier'));
        // print_r($supplier);

    }
    /**
     * Show the form for editing the specified resource.
     */
     public function edit(supplier $supplier)
    {
        return view("pages.erp.supplier.edit", compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $supplier= supplier::findOrFail($id);
       $supplier->name= $request->name;
       $supplier->email= $request->email;
       $supplier->phone= $request->phone;
       $supplier->address= $request->address;
       //$supplier->password= Hash::make($request->password);
       $supplier->save();
       return redirect("system/suppliers")->with("success", "supplier updated
       Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        supplier::findOrFail($id)->delete();
         return redirect("system/suppliers")->with("success", "supplier deleted
        Successfully");
    }
}
