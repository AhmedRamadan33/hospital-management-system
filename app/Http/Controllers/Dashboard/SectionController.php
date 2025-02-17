<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionsRequest;
use App\Http\Requests\UpdateSectionsRequest;
use App\Models\Section;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    // Display a listing of the resource.
    public function index()
    {
        $sections = Section::all();
        return view('Dashboard.Sections.index', compact('sections'));
    }


    // Store a newly created resource in storage.
    public function store(StoreSectionsRequest $request)
    {
        $section = new Section();
        $section->create([
            'name' => $request->name,
            'description' => $request->description

        ]);

        return redirect()->back()->with('add','msg');
    }


    // Update the specified resource in storage.
    public function update(UpdateSectionsRequest $request, $id)
    {
        $section = Section::find($id);
        $section->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->back()->with('edit','msg');
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        return redirect()->back()->with('delete','msg');
    }
}
