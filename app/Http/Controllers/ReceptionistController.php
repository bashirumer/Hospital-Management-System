<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Validator;
class ReceptionistController extends Controller
{

    //Receptionist Delete Account Function
    public function receptionistDeleteAccount(): RedirectResponse
    {  
        $receptionist = Auth::guard('receptionist')->user();

        if ($receptionist) {

            $receptionist->delete();
            Auth::guard('receptionist')->logout();

            return redirect()->route('login')->with('success', 'Your account has been deleted successfully.');
        }
        return redirect()->route('login')->with('error', 'Unable to delete the account. Please try again.');
    }


    //Respond to Appointment Request Function
    public function respondToAppointmentRequest(Request $request, $appointmentId) 
{

    $validator = Validator::make($request->all(), [
     'status'=> 'required|in:approved,rejected',
    ]);

    if ($validator->fails()) {
        return redirect()->route('patient.requestAppointmentForm')
            ->withErrors($validator)
            ->withInput();
        }

    
    $appointment = Appointment::find($appointmentId);

    if (!$appointment) {
        return redirect()->back()->with('error', 'Appointment not found.');
    }

    $appointment->status = $request->status;
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment status updated successfully.');
}

    //View Appointment Requests
    public function viewAppointmentRequests()
    {
        
        $receptionistId = Auth::guard('receptionist')->user()->ReceptionistID;
        // Fetch appointments assigned to this receptionist with status "pending"
        $appointments = Appointment::where('ReceptionistID', $receptionistId)
            ->where('status', 'pending')
            ->get();
    
        // Pass the appointments to the view
        return view('receptionist.viewappointments', compact('appointments'));
    }


    // View  Scheduled Appointments

    public function viewAppointments(){
        $receptionistId = Auth::guard('receptionist')->user()->ReceptionistID;
        // Fetch appointments assigned to this receptionist with status "pending"
        $appointments = Appointment::where('ReceptionistID', $receptionistId)
            ->where('status', 'approved')
            ->get();
    
        // Pass the appointments to the view
        return view('receptionist.viewallappointments', compact('appointments'));
    }

}
