<?php

namespace App\Http\Controllers\website\RayEmployeeApp;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRayEmpRequest;
use App\Models\Image;
use App\Models\Ray;
use App\Traits\UploadFilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RayController extends Controller
{
    use UploadFilesTrait;
    public function index()
    {
        $rays = Ray::where('status', 0)->get();
        return view('Dashboard.RayEmployeesDashboard.ray.index', compact('rays'));
    }

    public function edit($id)
    {
        $ray = Ray::find($id);
        return view('Dashboard.RayEmployeesDashboard.ray.edit', compact('ray'));
    }

    public function update(UpdateRayEmpRequest $request, $id)
    {
        $ray = Ray::find($id);
        $ray->employee_id = Auth::user()->id;
        $ray->description_employee = $request->description_employee;
        $ray->status = 1;

        $this->storeMultipleImage($request, 'photos', $id, 'App\Models\Ray', 'rays');
        $ray->save();
        return redirect()->route('rayEmp.index')->with('edit', 'msg');
    }
    public function rayCompleted()
    {
        $rays = Ray::where('status', 1)->get();
        return view('Dashboard.RayEmployeesDashboard.ray.completed_ray', compact('rays'));
    }
    public function show($id)
    {
        $ray = Ray::where('id',$id)->where('employee_id',Auth::user()->id)->first();
        return view('Dashboard.RayEmployeesDashboard.ray.show',compact('ray'));
    }
}
