<?php

namespace App\Http\Controllers\website\DoctorApp;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorStatementController extends Controller
{
    public function NotCompleted(){

        $docId = Auth::user()->id;
        $invoices = Invoice::where('doctor_id',$docId)->where('status',0)->get();
        return view('Dashboard.doctorDashboard.statement.NotCompleted',compact('invoices'));
    }

    public function Completed(){

        $docId = Auth::user()->id;
        $invoices = Invoice::where('doctor_id',$docId)->where('status',1)->get();
        return view('Dashboard.doctorDashboard.statement.Completed',compact('invoices'));
    }
    public function statusUpdate(Request $request ,$id){

        $invoices = Invoice::find($id);
        $invoices->status = $request->status;
        $invoices->save();
        return redirect()->back()->with('edit','msg');
    }
}
