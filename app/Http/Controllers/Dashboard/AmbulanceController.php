<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmbulancesRequest;
use App\Http\Requests\UpdateAmbulancesRequest;
use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
   // Display a listing of the resource.
   public function index()
   {
       $ambulances = Ambulance::all();
       return view('Dashboard.Ambulances.index', compact('ambulances'));
   }


   // Show the form for creating a new resource.
   public function create()
   {
       return view('Dashboard.Ambulances.create');
   }


   // Store a newly created resource in storage.
   public function store(StoreAmbulancesRequest $request)
   {
       $ambulances = new Ambulance();
       $ambulances->car_number = $request->car_number;
       $ambulances->car_model = $request->car_model;
       $ambulances->car_year_made = $request->car_year_made;
       $ambulances->car_type = $request->car_type;
       $ambulances->save();
       return redirect()->back()->with('add','msg');
   }


   // Show the form for editing the specified resource.
   public function edit($id)
   {
       $ambulance = Ambulance::find($id);
       return view('Dashboard.Ambulances.edit', compact('ambulance'));
   }


   // Update the specified resource in storage.
   public function update(UpdateAmbulancesRequest $request, $id)
   {
    if (!$request->has('status'))
            $status = 0;
        else
            $status = 1;
       $ambulances = Ambulance::find($id);
       $ambulances->car_number = $request->car_number;
       $ambulances->car_model = $request->car_model;
       $ambulances->car_year_made = $request->car_year_made;
       $ambulances->car_type = $request->car_type;
       $ambulances->status = $status;
       $ambulances->save();
       return redirect()->route('ambulance.index')->with('edit','msg');
   }


   // Remove the specified resource from storage.
   public function destroy($id)
   {
       $ambulances = Ambulance::find($id);
       $ambulances->delete();
       return redirect()->back()->with('delete','msg');

   }
}
