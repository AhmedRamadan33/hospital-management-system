<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\OfferedServices;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function service(){
        $services = Service::where('status',1)->get();
        $offeredServices = OfferedServices::all();
        return view('WebSite.service',compact('services','offeredServices'));
    }

    public function section(){
        $sections = Section::all();
        return view('WebSite.section',compact('sections'));
    }

    public function doctor(){
        $doctors = Doctor::all();
        return view('WebSite.doctor',compact('doctors'));
    }

    public function appointments(){
        return view('WebSite.appointments');
    }


}
