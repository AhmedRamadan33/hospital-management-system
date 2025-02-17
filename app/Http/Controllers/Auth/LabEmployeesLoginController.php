<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LabEmployeesLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabEmployeesLoginController extends Controller
{
       // Go to Dashboard rayEmployees.
       public function index()
       {
           return view('Dashboard.labEmployeesDashboard.index');
       }

       // Handle an incoming authentication(guard=rayEmployees) request  => (Login rayEmployees)
       public function store(LabEmployeesLoginRequest $request)
       {
           $request->authenticate();
           $request->session()->regenerate();
           return redirect()->intended(RouteServiceProvider::LABEMPLOYEES);
       }


       // Destroy an authenticated(guard=rayEmployees) session  => (Logout rayEmployees)
       public function destroy(Request $request)
       {
           Auth::guard('labEmployees')->logout();
           $request->session()->invalidate();
           $request->session()->regenerateToken();
           return redirect('/');
       }


}
