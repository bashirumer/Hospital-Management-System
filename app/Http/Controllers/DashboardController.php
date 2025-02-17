<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function view(){
        if (Auth::guard('doctor')->check()){

            return redirect()->intended('doctordashboard');
        }
        else if(Auth::guard('patient')->check()){
            return redirect()->intended('patientdashboard');
        }
        else if(Auth::guard('receptionist')->check()){
            return redirect()->intended('receptionistdashboard');
        }
        else{
            return redirect()->intended('assistantdashboard');
        }
    }
}
