<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentMail;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function notConfirmed()
    {
        $appointments = Reservation::where('type', 'notConfirmed')->get();
        return view('Dashboard.Appointments.notConfirmed', compact('appointments'));
    }

    public function confirmed()
    {
        $appointments = Reservation::where('type', 'confirmed')->get();
        return view('Dashboard.Appointments.confirmed', compact('appointments'));
    }

    public function finished()
    {
        $appointments = Reservation::where('type', 'finished')->get();
        return view('Dashboard.Appointments.finished', compact('appointments'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Reservation::find($id);
        $appointment->type = 'confirmed';
        $appointment->appointment = $request->appointment;
        $appointment->save();
        Mail::to($appointment->email)->send(new AppointmentMail($appointment->name,$appointment->appointment));
        return redirect()->back()->with('edit', 'msg');
    }

    public function destroy($id)
    {
        $appointment = Reservation::find($id);
        $appointment->delete();
        return redirect()->back()->with('delete', 'msg');
    }

}
