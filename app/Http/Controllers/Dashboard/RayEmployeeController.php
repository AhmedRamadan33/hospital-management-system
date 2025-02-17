<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRayEmployeesRequest;
use App\Http\Requests\UpdateRayEmployeesRequest;
use App\Models\RayEmployees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RayEmployeeController extends Controller
{

    // Display a listing of the resource.
    public function index()
    {
        $ray_employees = RayEmployees::all();
        return view('Dashboard.ray_employee.index', compact('ray_employees'));
    }


    // Show the form for creating a new resource.
    public function create()
    {
        return view('Dashboard.ray_employee.add');
    }


    // Store a newly created resource in storage.
    public function store(StoreRayEmployeesRequest $request)
    {
        $ray_employee = new RayEmployees();
        $ray_employee->name =$request->name;
        $ray_employee->email  =$request->email ;
        $ray_employee->password = Hash::make($request->password);
        $ray_employee->save();
        return redirect()->back()->with('add','msg');
    }



    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $ray_employee = RayEmployees::find($id);
        return view('Dashboard.ray_employee.edit', compact('ray_employee'));
    }


    // Update the specified resource in storage.
    public function update(UpdateRayEmployeesRequest $request, $id)
    {
        $ray_employee = RayEmployees::find($id);
        $ray_employee->name =$request->name;
        $ray_employee->email  =$request->email ;
        $ray_employee->password = Hash::make($request->password);
        $ray_employee->save();
        return redirect()->route('ray_employee.index')->with('edit','msg');
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $ray_employee = RayEmployees::find($id);
        $ray_employee->delete();
        return redirect()->back()->with('delete','msg');
    }
}
