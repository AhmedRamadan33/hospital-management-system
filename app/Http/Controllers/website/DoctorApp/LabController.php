<?php

namespace App\Http\Controllers\website\DoctorApp;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLabRequest;
use App\Http\Requests\StoreRayRequest;
use App\Models\Image;
use App\Models\Lab;
use App\Traits\UploadFilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    use UploadFilesTrait;
    public function store(StoreLabRequest $request) {
        $docId = Auth::user()->id;
        $lab = new Lab();
        $lab->description = $request->description;
        $lab->invoice_id = $request->invoice_id;
        $lab->patient_id = $request->patient_id;
        $lab->doctor_id = $docId;
        $lab->save();
        return redirect()->back()->with('add', 'msg');
    }

    public function update(StoreLabRequest $request ,$id) {
        $lab = Lab::where('id',$id)->where('doctor_id',Auth::user()->id)->first();
        $lab->description = $request->description;
        $lab->save();
        return redirect()->back()->with('edit', 'msg');
    }

    public function destroy($id) {

        $lab = Lab::where('id',$id)->where('doctor_id',Auth::user()->id)->first();
        $lab->delete();
        return redirect()->back()->with('delete', 'msg');
    }

    public function show($id) {

        $lab = Lab::where('id',$id)->where('doctor_id',Auth::user()->id)->first();
        return view('Dashboard.doctorDashboard.lab.view_lab',compact('lab'));
    }
}

