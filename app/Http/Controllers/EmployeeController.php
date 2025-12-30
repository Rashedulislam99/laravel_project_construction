<?php

namespace App\Http\Controllers;

use App\Mail\UserNotification;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $employees= employee::select("id","name","phone","email","address","photo")->paginate(10);
         $employees =Employee::orderBy("id", "desc")->paginate(8);
        return view("pages.erp.employee.index", ["employees"=>$employees]);

          $employees = Employee::with("roles")->orderBy("id", "desc")->get();
        return $employees;

        // $employees = Employee::with('role')->orderBy('id', 'desc')->get();
        // return $employees;
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $roles = Role::all(); // Role dropdown
    return view('pages.erp.employee.create', compact('roles'));
}

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //      $employee= new employee();
    //    $employee->name= $request->name;
    //    $employee->role_id= $request->role_id;
    //    $employee->phone= $request->phone;
    //    $employee->email= $request->email;
    //    $employee->address= $request->address;
    //    $employee->nid_number= $request->nid_number;
    //    $employee->photo= $request->photo;
    //    $employee->active= $request->active;
    //    $employee->password= $request->password;


    //    $employee->save();
    //    return redirect("system/employees")->with("success", "employee Save
    //    Successfully");
    // }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'role_id' => 'required|exists:roles,id',
        'email' => 'required|email|unique:employees,email',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'nid_number' => 'nullable|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'password' => 'required|string|min:6',
        'active' => 'required|boolean',
    ]);

    $employee = new Employee();
    $employee->name       = $request->name;
    $employee->role_id    = $request->role_id;
    $employee->phone      = $request->phone;
    $employee->email      = $request->email;
    $employee->address    = $request->address;
    $employee->nid_number = $request->nid_number;

    // Photo upload
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/employees'), $filename);
        $employee->photo = $filename;
    }

    $employee->active    = $request->active;
    $employee->password  = bcrypt($request->password);
    $employee->save();

    Mail::to( $request->email)->send(new UserNotification(  $employee));

    return redirect()->route('employees.index')
        ->with('success', 'Employee created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = employee::find($id);
        return view("pages.erp.employee.view", compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $employee = Employee::with('role')->findOrFail($id); // employee data
    $roles = Role::all(); // সব role fetch করছো dropdown এর জন্য
    return view('pages.erp.employee.edit', compact('employee', 'roles'));
}


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //      $employee = employee::findOrFail($id); //
    // $employee->name        = $request->name;
    // $employee->role_id     = $request->role_id;
    // $employee->phone       = $request->phone;
    // $employee->email       = $request->email;
    // $employee->address     = $request->address;
    // $employee->nid_number  = $request->nid_number;
    // $employee->photo       = $request->photo;
    // $employee->active      = $request->active;
    // $employee->password    = $request->password;

    // $employee->save();

    // return redirect("system/employees")
    //     ->with("success", "employee updated successfully");
    // }


    public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);

    $employee->name       = $request->name;
    $employee->role_id    = $request->role_id;
    $employee->phone      = $request->phone;
    $employee->email      = $request->email;
    $employee->address    = $request->address;
    $employee->nid_number = $request->nid_number;
    $employee->active     = $request->active;

    // 🔹 Photo update
    if ($request->hasFile('photo')) {

        // old photo delete (optional but recommended)
        if ($employee->photo && file_exists(public_path('uploads/employees/' . $employee->photo))) {
            unlink(public_path('uploads/employees/' . $employee->photo));
        }

        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/employees'), $filename);
        $employee->photo = $filename;
    }

    // password only update if given
    if ($request->password) {
        $employee->password = bcrypt($request->password);
    }

    $employee->save();

    return redirect()->route('employees.index')
        ->with('success', 'Employee updated successfully');
}






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }


}
