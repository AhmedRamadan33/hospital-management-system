<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Lab;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Ray;
use App\Models\ReceiptAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAppController extends Controller
{
    public function invoices()
    {
        $authUser = Auth::guard('patient')->user()->id;
        $invoices = Invoice::where('patient_id', $authUser)->get();
        return view('Dashboard.patientDashboard.invoices', compact('invoices'));
    }

    public function rays()
    {
        $authUser = Auth::guard('patient')->user()->id;
        $rays = Ray::where('patient_id', $authUser)->get();
        return view('Dashboard.patientDashboard.rays', compact('rays'));
    }

    public function view_ray($id){
        $ray = Ray::find($id);
        $authUser = Auth::guard('patient')->user()->id;

        if($ray->patient_id != $authUser){
            return abort(404);
        }
        return view('Dashboard.patientDashboard.view_ray', compact('ray'));
    }

    public function labs()
    {
        $authUser = Auth::guard('patient')->user()->id;
        $labs = Lab::where('patient_id', $authUser)->get();
        return view('Dashboard.patientDashboard.labs', compact('labs'));
    }

    public function view_lab($id){
        $lab = Lab::find($id);
        $authUser = Auth::guard('patient')->user()->id;

        if($lab->patient_id != $authUser){
            return abort(404);
        }
        return view('Dashboard.patientDashboard.view_lab', compact('lab'));
    }

    public function payments(){
        $authUser = Auth::guard('patient')->user()->id;

        $patient = Patient::find($authUser);
        $invoices = Invoice::where('patient_id',$authUser)->get();
        $receiptAccounts = ReceiptAccount::where('patient_id',$authUser)->get();
        $patientAccounts = PatientAccount::where('patient_id',$authUser)->get();
        $rays = Ray::where('patient_id',$authUser)->get();
        $labs = Lab::where('patient_id',$authUser)->get();
        return view('Dashboard.patientDashboard.show', compact('patient','invoices','receiptAccounts','patientAccounts','rays','labs'));
    }

}
