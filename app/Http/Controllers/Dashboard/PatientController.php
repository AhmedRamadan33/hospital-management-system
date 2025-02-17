<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Models\Invoice;
use App\Models\Lab;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Ray;
use App\Models\ReceiptAccount;
use App\Traits\UploadFilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    use UploadFilesTrait;
    // Display a listing of the resource.
    public function index()
    {
        $patients = Patient::all();
        return view('Dashboard.Patients.index', compact('patients'));
    }


    // Show the form for creating a new resource.
    public function create()
    {
        return view('Dashboard.Patients.create');
    }


    // Store a newly created resource in storage.
    public function store(StorePatientsRequest $request)
    {
        $patients = new Patient();
        $patients->name = $request->name;
        $patients->email  = $request->email;
        $patients->password = Hash::make($request->password);
        $patients->address = $request->address;
        $patients->age = $request->age;
        $patients->phone = $request->phone;
        $patients->gender = $request->gender;
        $patients->blood_group = $request->blood_group;
        $patients->save();
        $this->storeImage($request, 'photo', $patients->id, 'App\Models\Patient', 'patients'); // insert Patient image
        return redirect()->back()->with('add', 'msg');
    }

    // Display the specified resource.
    public function show($id)
    {
        $patient = Patient::find($id);
        $invoices = Invoice::where('patient_id',$id)->get();
        $receiptAccounts = ReceiptAccount::where('patient_id',$id)->get();
        $patientAccounts = PatientAccount::where('patient_id',$id)->get();
        $rays = Ray::where('patient_id',$id)->get();
        $labs = Lab::where('patient_id',$id)->get();
        return view('Dashboard.Patients.show', compact('patient','invoices','receiptAccounts','patientAccounts','rays','labs'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('Dashboard.Patients.edit', compact('patient'));
    }


    // Update the specified resource in storage.
    public function update(UpdatePatientsRequest $request, $id)
    {
        $patient = Patient::find($id);
        $patient->name = $request->name;
        $patient->email  = $request->email;
        // $patient->password = Hash::make($request->password);
        $patient->address = $request->address;
        $patient->age = $request->age;
        $patient->phone = $request->phone;
        $patient->gender = $request->gender;
        $patient->blood_group = $request->blood_group;
        $patient->save();
        return redirect()->route('patient.index')->with('edit', 'msg');
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $this->deleteImage($patient->id , 'patients','App\Models\Patient');

        $patient->delete();
        return redirect()->back()->with('delete', 'msg');
    }
}
