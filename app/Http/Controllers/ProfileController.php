<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilePasswordRequest;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\LabEmployees;
use App\Models\Patient;
use App\Models\RayEmployees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile');
    }

    public function update(UpdateProfilePasswordRequest $request, $id)
    {
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;
        $confirmPassword = $request->confirmPassword;

        if (!Hash::check($currentPassword, Auth::user()->password)) {
            return redirect()->back()->with('passwordInvalid', 'msg');
        } else {

            if ($newPassword == $confirmPassword) {
                if (Auth::guard('admin')->check()) {
                    Admin::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                } elseif (Auth::guard('doctor')->check()) {
                    Doctor::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                } elseif (Auth::guard('labEmployees')->check()) {
                    LabEmployees::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                } elseif (Auth::guard('rayEmployees')->check()) {
                    RayEmployees::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                } else {
                    Patient::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                }
            }

            return redirect()->back()->with('edit', 'msg');
        }
    }
}
