<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDriversRequest;
use App\Http\Requests\UpdateDriversRequest;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
   // Display a listing of the resource.
   public function index()
   {
       $drivers = Driver::all();
       return view('Dashboard.drivers.index', compact('drivers'));
   }


   // Show the form for creating a new resource.
   public function create()
   {
       return view('Dashboard.drivers.create');
   }


   // Store a newly created resource in storage.
   public function store(StoreDriversRequest $request)
   {
       $drivers = new Driver();
       $drivers->name = $request->name;
       $drivers->license_type = $request->license_type;
       $drivers->license_number = $request->license_number;
       $drivers->phone = $request->phone;
       $drivers->save();
       return redirect()->back()->with('add','msg');
   }


   // Show the form for editing the specified resource.
   public function edit($id)
   {
       $driver = Driver::find($id);
       return view('Dashboard.drivers.edit', compact('driver'));
   }


   // Update the specified resource in storage.
   public function update(UpdateDriversRequest $request, $id)
   {
    if (!$request->has('status'))
            $status = 0;
        else
            $status = 1;
       $driver = Driver::find($id);
       $driver->name = $request->name;
       $driver->license_type = $request->license_type;
       $driver->license_number = $request->license_number;
       $driver->phone = $request->phone;
       $driver->status = $status;
       $driver->save();
       return redirect()->route('driver.index')->with('edit','msg');
   }


   // Remove the specified resource from storage.
   public function destroy($id)
   {
       $driver = Driver::find($id);
       $driver->delete();
       return redirect()->back()->with('delete','msg');

   }
}
