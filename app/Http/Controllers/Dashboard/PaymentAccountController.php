<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\PaymentAccount;
use Illuminate\Http\Request;

class PaymentAccountController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $payments = PaymentAccount::all();
        return view('Dashboard.paymentAccount.index', compact('payments'));
    }


    // Show the form for creating a new resource.
    public function create()
    {
        $patients = Patient::all();
        return view('Dashboard.paymentAccount.add', compact('patients'));
    }

    // Display the specified resource.
    public function show($id)
    {
        $payment = PaymentAccount::find($id);
        return view('Dashboard.paymentAccount.print', compact('payment'));
    }

    // Store a newly created resource in storage.
    public function store(StorePaymentRequest $request)
    {
        $payment = new PaymentAccount();
        $payment->date = date('Y-m-d');
        $payment->patient_id = $request->patient_id;
        $payment->amount = $request->amount;
        $payment->description = $request->description;
        $payment->save();

        $fundAccount = new FundAccount();
        $fundAccount->date = date('Y-m-d');
        $fundAccount->payment_id = $payment->id;
        $fundAccount->debit = 0.00;
        $fundAccount->credit = $request->amount;
        $fundAccount->save();

        $patientAccount = new PatientAccount();
        $patientAccount->date = date('Y-m-d');
        $patientAccount->patient_id = $request->patient_id;
        $patientAccount->payment_id  = $payment->id;
        $patientAccount->debit = $request->amount;
        $patientAccount->credit = 0.00;
        $patientAccount->save();

        return redirect()->back()->with('add', 'msg');
    }


    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $payment = PaymentAccount::find($id);
        $patients = Patient::all();
        return view('Dashboard.paymentAccount.edit', compact('payment', 'patients'));
    }


    // Update the specified resource in storage.
    public function update(StorePaymentRequest $request, $id)
    {
        $payment = PaymentAccount::find($id);
        $payment->date = date('Y-m-d');
        $payment->patient_id = $request->patient_id;
        $payment->amount = $request->amount;
        $payment->description = $request->description;
        $payment->save();

        $fundAccount =  FundAccount::where('payment_id', $id)->first();
        $fundAccount->date = date('Y-m-d');
        $fundAccount->payment_id  = $payment->id;
        $fundAccount->debit = 0.00;
        $fundAccount->credit = $request->amount;
        $fundAccount->save();

        $patientAccount = PatientAccount::where('payment_id', $id)->first();
        $patientAccount->date = date('Y-m-d');
        $patientAccount->patient_id = $request->patient_id;
        $patientAccount->payment_id  = $payment->id;
        $patientAccount->debit = $request->amount;
        $patientAccount->credit = 0.00;
        $patientAccount->save();

        return redirect()->route('paymentAccount.index')->with('edit', 'msg');
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $payment = PaymentAccount::find($id);
        $payment->delete();
        return redirect()->route('paymentAccount.index')->with('delete', 'msg');
    }
}
