<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInsurancesRequest;
use App\Http\Requests\UpdateInsurancesRequest;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $insurances = Insurance::all();
        return view('Dashboard.insurances.index', compact('insurances'));
    }


    // Show the form for creating a new resource.
    public function create()
    {
        return view('Dashboard.insurances.create');
    }


    // Store a newly created resource in storage.
    public function store(StoreInsurancesRequest $request)
    {
        $insurances = new Insurance();
        $insurances->name = $request->name;
        $insurances->insurance_code = $request->insurance_code;
        $insurances->discount_percentage = $request->discount_percentage;
        $insurances->company_rate = $request->company_rate;
        $insurances->save();
        return redirect()->back()->with('add', 'msg');
    }


    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $insurances = Insurance::find($id);
        return view('Dashboard.insurances.edit', compact('insurances'));
    }


    // Update the specified resource in storage.
    public function update(UpdateInsurancesRequest $request, $id)
    {
        if (!$request->has('status'))
            $status = 0;
        else
            $status = 1;

        $insurances = Insurance::find($id);
        $insurances->name = $request->name;
        $insurances->insurance_code = $request->insurance_code;
        $insurances->discount_percentage = $request->discount_percentage;
        $insurances->company_rate = $request->company_rate;
        $insurances->status = $status;
        $insurances->save();
        return redirect()->route('insurance.index')->with('edit', 'msg');
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $insurances = Insurance::find($id);
        $insurances->delete();
        return redirect()->back()->with('delete', 'msg');
    }
}
