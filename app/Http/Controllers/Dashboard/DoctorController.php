<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\CreateDoctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorsRequest;
use App\Http\Requests\UpdateDoctorsRequest;
use App\Http\Requests\UpdatePasswordDoctorsRequest;
use App\Models\Appointment;
use App\Models\AppointmentDoctor;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Notification;
use App\Models\Section;
use App\Traits\UploadFilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    use UploadFilesTrait; // : can use it to upload image in doctors table

    // Display a listing of the resource.
    public function index()
    {
        $doctors =  Doctor::all();
        return view('Dashboard.Doctors.index', compact('doctors'));
    }


    // Show the form for creating a new resource.
    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        return view('Dashboard.Doctors.add', compact('sections','appointments'));
    }


    // Store a newly created resource in storage.
    public function store(StoreDoctorsRequest $request)
    {
        $doctors = new Doctor();
        $doctors->name = $request->name;
        $doctors->email = $request->email;
        $doctors->password = Hash::make($request->password);
        $doctors->phone = $request->phone;
        $doctors->sectionId = $request->sectionId;
        $doctors->save();
        $this->storeImage($request, 'photo', $doctors->id, 'App\Models\Doctor', 'doctors'); // insert Doctor image
        $doctors->doctorAppointments()->sync($request->appointments); // insert array of appointments in doctor Appointments (many to many relation)

        $nonification = new Notification();
        $nonification->user_id = Auth::user()->id ;
        $nonification->message = 'A new doctor has been added to the hospital, his name is '.$doctors->name;
        $nonification->save();

        $docId = $doctors->id;
        event(new CreateDoctor($docId));
        return redirect()->back()->with('add','msg');

    }


    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $appointments = Appointment::all();
        $sections = Section::all();
        $doctor = Doctor::find($id);
        return view('Dashboard.Doctors.edit',compact('doctor','sections','appointments'));
    }


    // Update the specified resource in storage.
    public function update(UpdateDoctorsRequest $request, $id)
    {
        $doctors = Doctor::find($id);
        $doctors->name = $request->name;
        $doctors->email = $request->email;
        $doctors->phone = $request->phone;
        $doctors->status = $request->status;
        $doctors->sectionId = $request->sectionId;
        $doctors->save();
        $this->updateImage($request, 'photo', $doctors->id, 'App\Models\Doctor', 'doctors'); // update doctor image
        $doctors->doctorAppointments()->sync($request->appointments); // insert array of appointments in doctor Appointments (many to many relation)
        return redirect()->route('doctor.index')->with('edit','msg');
    }


    // update Password  in storage.
    public function updatePassword(UpdatePasswordDoctorsRequest $request, $id)
     {

        $doctor = Doctor::find($id);

        $password = $request->password;
        $confirmedPassword = $request->confirmedPassword;

        if ($password == $confirmedPassword){
            $doctor->update([
                'password' => Hash::make($confirmedPassword),
            ]);
        }

        return redirect()->back()->with('edit','msg');
     }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $this->deleteImage($doctor->id , 'doctors','App\Models\Doctor');

        $doctor->delete();
        return redirect()->back()->with('delete','msg');
    }
}
