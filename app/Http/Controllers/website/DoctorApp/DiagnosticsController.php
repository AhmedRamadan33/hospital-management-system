<?php

namespace App\Http\Controllers\website\DoctorApp;

use App\Http\Controllers\Controller;
use App\Models\Diagnostics;
use App\Models\Invoice;
use App\Models\Lab;
use App\Models\Ray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosticsController extends Controller
{
    public function index(){
        $docId = Auth::user()->id;
        $invoices = Invoice::where('doctor_id',$docId)->get();
        return view('Dashboard.doctorDashboard.diagnose.index',compact('invoices'));

    }
    public function store(Request $request)
    {
        $docId = Auth::user()->id;
        $diagnostics = new Diagnostics();
        $diagnostics->date = date('Y-m_d');
        $diagnostics->review_date = $request->review_date;
        $diagnostics->name = $request->name;
        $diagnostics->medicine = $request->medicine;
        $diagnostics->invoice_id = $request->invoice_id;
        $diagnostics->patient_id = $request->patient_id;
        $diagnostics->doctor_id = $docId;
        $diagnostics->save();
        return redirect()->back()->with('add', 'msg');
    }
    public function show($id)
    {
        $docId = Auth::user()->id;
        $rays = Ray::where('patient_id', $id)->where('doctor_id',$docId)->get();
        $labs = Lab::where('patient_id', $id)->where('doctor_id',$docId)->get();
        $patient_records = Diagnostics::where('patient_id', $id)->get();

        return view('Dashboard.doctorDashboard.patient_details', compact('patient_records','rays','labs'));
    }


}
