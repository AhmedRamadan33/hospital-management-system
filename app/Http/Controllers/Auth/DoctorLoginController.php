<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\DoctorLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
{
       // Go to Dashboard Doctor.
       public function index()
       {
           return view('Dashboard.doctorDashboard.index');
       }

       // Handle an incoming authentication(guard=doctor) request  => (Login Doctor)
       public function store(DoctorLoginRequest $request)
       {
           $request->authenticate();
           $request->session()->regenerate();
           return redirect()->intended(RouteServiceProvider::DOCTOR);
       }


       // Destroy an authenticated(guard=doctor) session  => (Logout Doctor)
       public function destroy(Request $request)
       {
           Auth::guard('doctor')->logout();
           $request->session()->invalidate();
           $request->session()->regenerateToken();
           return redirect('/');
       }


}
