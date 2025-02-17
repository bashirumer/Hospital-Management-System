<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Doctor;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Validator;
use App\Models\Patient;
use App\Models\MedicalReport;

class PatientController extends Controller
{
    //Patient Delete Account Function
    public function patientDeleteAccount(): RedirectResponse
        {
            $patient = Auth::guard('patient')->user();

            if ($patient) {

                $patient->delete();
                Auth::guard('patient')->logout();

                return redirect()->route('login')->with('success', 'Your account has been deleted successfully.');
                }
                return redirect()->route('login')->with('error', 'Unable to delete the account. Please try again.');
        }


    //Request Appointment Function
    public function requestAppointment(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',
            'receptionist_id' => 'required|integer|exists:receptionists,ReceptionistID',
            'doctor_id' => 'required|integer|exists:doctors,DoctorID',
        ]);

        if ($validator->fails()) {
            return redirect()->route('patient.requestAppointmentForm')
                ->withErrors($validator)
                ->withInput();
        }


        // Get the authenticated patient
        $patient = Auth::guard('patient')->user();
        if (!$patient) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Create the appointment entry
        Appointment::create([
            'PatientID' => $patient->PatientID,
            'ReceptionistID' => $request->receptionist_id,
            'DoctorID' => $request->doctor_id,
            'Date' => $request->appointment_date,
            'Time' => $request->appointment_time,
            'Status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Appointment request submitted successfully.');
    }

//Show Appointment Request Form
    public function showRequestAppointmentForm()
{

    $doctors = Doctor::all();
    $receptionists = Receptionist::all();

  
    return view('patient.requestAppointment', compact('doctors', 'receptionists'));
}


//View Appointment Requests Function
public function viewAppointmentRequests(){
    $patientId = Auth::guard('patient')->user()->PatientID;
    
    $appointments = Appointment::where('PatientID', $patientId)->get();
    
    // Pass the appointments to the view
    return view('patient.viewappointmentrequests', compact('appointments'));
}


//View Scheduled Appointments Function
public function viewAppointments(){
    $patientId = Auth::guard('patient')->user()->PatientID;
    
    $appointments = Appointment::where('PatientID', $patientId)->where('status', 'approved')->get();
    
    // Pass the appointments to the view
    return view('patient.viewappointments', compact('appointments'));
}


//Cancel Appointment Request Function

public function cancelAppointment(Request $request,$appointmentId){

    $validator = Validator::make($request->all(), [
        'status'=> 'required|in:approved',
       ]);
   
       if ($validator->fails()) {
           return redirect()->route('patients.viewAppointments')
               ->withErrors($validator)
               ->withInput();
           }
   
       
       $appointment = Appointment::find($appointmentId);
   
       if (!$appointment) {
           return redirect()->back()->with('error', 'Appointment not found.');
       }
   
       $appointment->status = 'rejected';
       $appointment->save();
   
       return redirect()->back()->with('success', 'Appointment has been Canceled successfully.');

}


//View Medical Reports Function
public function viewReports(){
    $patientId = Auth::guard('patient')->user()->PatientID;
    
    $reports = MedicalReport::where('PatientID', $patientId)->get();
    

    return view('patient.viewreports', compact('reports'));
}
}



