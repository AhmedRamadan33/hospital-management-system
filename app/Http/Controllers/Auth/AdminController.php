<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // Go to Dashboard Admin.
    public function index()
    {
        return view('Dashboard.Admin.index');
    }

    // Handle an incoming authentication(guard=admin) request  => (Login Admin)
    public function store(AdminLoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::ADMIN);
    }


    // Destroy an authenticated(guard=admin) session  => (Logout Admin)
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
