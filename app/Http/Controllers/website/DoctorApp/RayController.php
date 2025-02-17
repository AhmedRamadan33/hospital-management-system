<?php

namespace App\Http\Controllers\website\DoctorApp;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRayRequest;
use App\Models\Image;
use App\Models\Ray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RayController extends Controller
{
    public function store(StoreRayRequest $request) {
        $docId = Auth::user()->id;
        $ray = new Ray();
        $ray->description = $request->description;
        $ray->invoice_id = $request->invoice_id;
        $ray->patient_id = $request->patient_id;
        $ray->doctor_id = $docId;
        $ray->save();
        return redirect()->back()->with('add', 'msg');
    }

    public function update(StoreRayRequest $request ,$id) {
        $ray = Ray::where('id',$id)->where('doctor_id',Auth::user()->id)->first();
        $ray->description = $request->description;
        $ray->save();
        return redirect()->back()->with('edit', 'msg');
    }

    public function destroy($id) {

        $ray = Ray::where('id',$id)->where('doctor_id',Auth::user()->id)->first();
        $ray->delete();
        return redirect()->back()->with('delete', 'msg');
    }

    public function show($id) {

        $ray = Ray::where('id',$id)->where('doctor_id',Auth::user()->id)->first();
        return view('Dashboard.doctorDashboard.ray.view_ray',compact('ray'));
    }
}
