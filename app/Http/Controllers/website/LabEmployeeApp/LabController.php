<?php

namespace App\Http\Controllers\website\LabEmployeeApp;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLabEmpRequest;
use App\Models\Image;
use App\Models\Lab;
use App\Traits\UploadFilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    use UploadFilesTrait;
    public function index()
    {
        $labs = Lab::where('status', 0)->get();
        return view('Dashboard.labEmployeesDashboard.lab.index', compact('labs'));
    }

    public function edit($id)
    {
        $lab = Lab::find($id);
        return view('Dashboard.labEmployeesDashboard.lab.edit', compact('lab'));
    }

    public function update(UpdateLabEmpRequest $request, $id)
    {
        $lab = Lab::find($id);
        $lab->employee_id = Auth::user()->id;
        $lab->description_employee = $request->description_employee;
        $lab->status = 1;

        $this->storeMultipleImage($request, 'photos', $id, 'App\Models\Lab','lab');
        $lab->save();
        return redirect()->route('labEmp.index')->with('edit', 'msg');
    }
    public function rayCompleted()
    {
        $labs = Lab::where('status', 1)->get();
        return view('Dashboard.labEmployeesDashboard.lab.completed_lab', compact('labs'));
    }
    public function show($id)
    {
        $lab = Lab::where('id',$id)->where('employee_id',Auth::user()->id)->first();
        return view('Dashboard.labEmployeesDashboard.lab.show',compact('lab'));
    }
}
