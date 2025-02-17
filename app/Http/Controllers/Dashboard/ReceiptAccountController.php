<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReceiptRequest;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use Illuminate\Http\Request;

class ReceiptAccountController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $receipts = ReceiptAccount::all();
        return view('Dashboard.receiptAccount.index', compact('receipts'));
    }


    // Show the form for creating a new resource.
    public function create()
    {
        $patients = Patient::all();
        return view('Dashboard.receiptAccount.add', compact('patients'));
    }

    // Display the specified resource.
    public function show($id)
    {
        $receipt = ReceiptAccount::find($id);
        return view('Dashboard.receiptAccount.print',compact('receipt'));
    }

    // Store a newly created resource in storage.
    public function store(StoreReceiptRequest $request)
    {
        $receipt = new ReceiptAccount();
        $receipt->date = date('Y-m-d');
        $receipt->patient_id = $request->patient_id;
        $receipt->amount = $request->amount;
        $receipt->description = $request->description;
        $receipt->save();

        $fundAccount = new FundAccount();
        $fundAccount->date = date('Y-m-d');
        $fundAccount->receipt_id  = $receipt->id;
        $fundAccount->debit = $request->amount;
        $fundAccount->credit = 0.00;
        $fundAccount->save();

        $patientAccount = new PatientAccount();
        $patientAccount->date = date('Y-m-d');
        $patientAccount->patient_id = $request->patient_id;
        $patientAccount->receipt_id  = $receipt->id;
        $patientAccount->debit = 0.00;
        $patientAccount->credit = $request->amount;
        $patientAccount->save();

        return redirect()->back()->with('add', 'msg');
    }


    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $receipt = ReceiptAccount::find($id);
        $patients = Patient::all();
        return view('Dashboard.receiptAccount.edit', compact('receipt', 'patients'));
    }


    // Update the specified resource in storage.
    public function update(StoreReceiptRequest $request, $id)
    {
        $receipt = ReceiptAccount::find($id);
        $receipt->date = date('Y-m-d');
        $receipt->patient_id = $request->patient_id;
        $receipt->amount = $request->amount;
        $receipt->description = $request->description;
        $receipt->save();

        $fundAccount =  FundAccount::where('receipt_id', $id)->first();
        $fundAccount->date = date('Y-m-d');
        $fundAccount->receipt_id  = $receipt->id;
        $fundAccount->debit = $request->amount;
        $fundAccount->credit = 0.00;
        $fundAccount->save();

        $patientAccount = PatientAccount::where('receipt_id', $id)->first();
        $patientAccount->date = date('Y-m-d');
        $patientAccount->patient_id = $request->patient_id;
        $patientAccount->receipt_id  = $receipt->id;
        $patientAccount->debit = 0.00;
        $patientAccount->credit = $request->amount;
        $patientAccount->save();

        return redirect()->route('receiptAccount.index')->with('edit', 'msg');
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $receipt = ReceiptAccount::find($id);
        $receipt->delete();
        return redirect()->route('receiptAccount.index')->with('delete', 'msg');
    }
}
