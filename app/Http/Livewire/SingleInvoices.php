<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Invoice;
use App\Models\Lab;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Ray;
use App\Models\Reservation;
use App\Models\Service;
use App\Traits\UploadFilesTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class SingleInvoices extends Component
{
    use UploadFilesTrait;
    public $show_table = true;
    public $patient_id, $doctor_id, $section_id, $service_id, $type, $price, $invoiceId, $show_form;
    public $updateMode = false;

    // validation Form
    public function rules()
    {
        if (is_null($this->invoiceId)) {
            return [
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:doctors,id',
                'service_id' => 'required|exists:services,id',
                'type' => 'required|in:1,2',

            ];
        } else {
            return [
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:doctors,id',
                'service_id' => 'required|exists:services,id',
                'type' => 'required|in:1,2',
            ];
        }
    }
    public function render()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $services = Service::orderBy('sectionId', 'DESC')->get();
        $invoices = Invoice::where('invoice_class', 1)->get();

        return view('livewire.singleInvoices.create', [
            'patients' => $patients,
            'doctors' => $doctors,
            'services' => $services,
            'invoices' => $invoices,
        ]);
    }
    public function get_section()
    {
        $doctor = Doctor::where('id', $this->doctor_id)->get()->first();
        if ($doctor) {
            $this->section_id = $doctor->section->name;
        }
    }
    public function get_price()
    {
        $serviceId = Service::where('id', $this->service_id)->get()->first();
        if ($serviceId) {
            $this->price = $serviceId->price;
        }
    }

    public function show_form()
    {
        $this->show_table = false;
    }

    public function store()
    {
        if ($this->doctor_id && $this->service_id) {
            $sectionId = DB::table('doctors')->where('id', $this->doctor_id)->first()->sectionId;
            $servicePrice = DB::table('services')->where('id', $this->service_id)->first()->price;
        }

        // update
        if ($this->updateMode) {
            $this->validate();
            $invoice = Invoice::find($this->invoiceId);
            $invoice->patient_id = $this->patient_id;
            $invoice->doctor_id = $this->doctor_id;
            $invoice->section_id = $sectionId;
            $invoice->service_id = $this->service_id;
            $invoice->price = $servicePrice;
            $invoice->save();

            if ($invoice->type == 1) {
                $fundAccount = FundAccount::where('invoice_id', $this->invoiceId)->first();
                $fundAccount->date = date('Y-m-d');
                $fundAccount->invoice_id = $invoice->id;
                $fundAccount->debit = $servicePrice;
                $fundAccount->credit = 0.00;
                $fundAccount->save();
            } else {
                $patientAccount = PatientAccount::where('invoice_id', $this->invoiceId)->first();
                $patientAccount->date = date('Y-m-d');
                $patientAccount->patient_id = $this->patient_id;
                $patientAccount->invoice_id = $invoice->id;
                $patientAccount->debit = $servicePrice;
                $patientAccount->credit = 0.00;
                $patientAccount->save();
            }
            return redirect()->route('singleInvoices.index')->with('edit', 'msg');
        } else {
            // insert
            $this->validate();
            $invoice = new Invoice();
            $invoice->invoice_class = 1;
            $invoice->date = date('Y-m-d');
            $invoice->patient_id = $this->patient_id;
            $invoice->doctor_id = $this->doctor_id;
            $invoice->section_id = $sectionId;
            $invoice->service_id = $this->service_id;
            $invoice->price = $servicePrice;
            $invoice->type = $this->type;
            $invoice->save();

            if ($this->type == 1) {
                $fundAccount = new FundAccount();
                $fundAccount->date = date('Y-m-d');
                $fundAccount->invoice_id = $invoice->id;
                $fundAccount->debit = $servicePrice;
                $fundAccount->credit = 0.00;
                $fundAccount->save();
            } else {
                $patientAccount = new PatientAccount();
                $patientAccount->date = date('Y-m-d');
                $patientAccount->patient_id = $this->patient_id;
                $patientAccount->invoice_id = $invoice->id;
                $patientAccount->debit = $servicePrice;
                $patientAccount->credit = 0.00;
                $patientAccount->save();
            }

            $appointment =Reservation::where('email', $invoice->patient->email)->where('doctor_id', $this->doctor_id)->where('type', 'confirmed')->first();
            if($appointment){
                $appointment->update(['type' => 'finished']);
            }
            return redirect()->route('singleInvoices.index')->with('add', 'msg');
        }
        $this->show_table = true;
    }

    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $invoice = Invoice::find($id);
        $this->invoiceId = $invoice->id;
        $this->patient_id = $invoice->patient_id;
        $this->doctor_id = $invoice->doctor_id;
        $this->section_id = $invoice->section->name;
        $this->service_id = $invoice->service_id;
        $this->price = $invoice->price;
        $this->type = $invoice->type;
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $ray = Ray::where('invoice_id', $id)->first()->id;
        $lab = Lab::where('invoice_id', $id)->first()->id;
        if ($ray) {
            $this->deleteImage($ray, 'rays','App\Models\Ray');
        }
        if ($lab) {
            $this->deleteImage($lab, 'lab','App\Models\Lab');
        }

        $invoice->delete();
        return redirect()->route('singleInvoices.index')->with('delete', 'msg');
    }

    public function print($id)
    {
        $singleInvoice = Invoice::findorfail($id);
        return Redirect::route('singleInvoices.print', [
            'date' => $singleInvoice->date,
            'doctorName' => $singleInvoice->doctor->name,
            'sectionName' => $singleInvoice->section->name,
            'serviceName' => $singleInvoice->service->name,
            'type' => $singleInvoice->type,
            'price' => $singleInvoice->price,
        ]);
    }
}
