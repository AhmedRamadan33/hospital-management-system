<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLabEmployeesRequest;
use App\Http\Requests\UpdateLabEmployeesRequest;
use App\Models\LabEmployees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LabEmployeeController extends Controller
{
     // Display a listing of the resource.
     public function index()
     {
         $lab_employees = LabEmployees::all();
         return view('Dashboard.lab_employee.index', compact('lab_employees'));
     }


     // Show the form for creating a new resource.
     public function create()
     {
         return view('Dashboard.lab_employee.add');
     }


     // Store a newly created resource in storage.
     public function store(StoreLabEmployeesRequest $request)
     {
         $lab_employee = new LabEmployees();
         $lab_employee->name =$request->name;
         $lab_employee->email  =$request->email ;
         $lab_employee->password = Hash::make($request->password);
         $lab_employee->save();
         return redirect()->back()->with('add','msg');
     }



     // Show the form for editing the specified resource.
     public function edit($id)
     {
         $lab_employee = LabEmployees::find($id);
         return view('Dashboard.lab_employee.edit', compact('lab_employee'));
     }


     // Update the specified resource in storage.
     public function update(UpdateLabEmployeesRequest $request, $id)
     {
         $lab_employee = LabEmployees::find($id);
         $lab_employee->name =$request->name;
         $lab_employee->email  =$request->email ;
         $lab_employee->password = Hash::make($request->password);
         $lab_employee->save();
         return redirect()->route('lab_employee.index')->with('edit','msg');
     }


     // Remove the specified resource from storage.
     public function destroy($id)
     {
         $lab_employee = LabEmployees::find($id);
         $lab_employee->delete();
         return redirect()->back()->with('delete','msg');
     }
}
