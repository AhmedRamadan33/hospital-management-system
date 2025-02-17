<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $sections = Section::all();
        $services = Service::orderBy('sectionId','DESC')->get();
        return view('Dashboard.Services.SingleService.index', compact('services','sections'));
    }



    // Store a newly created resource in storage.

    public function store(StoreServicesRequest $request)
    {
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'sectionId' => $request->sectionId,

        ]);
        return redirect()->back()->with('add','msg');
    }




    // Update the specified resource in storage.
    public function update(UpdateServicesRequest $request, $id)
    {
        $service = Service::find($id);
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'sectionId' => $request->sectionId,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('edit','msg');
    }



    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->back()->with('delete','msg');
    }

}
