<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Validator;
use App\Models\Patient;
use App\Models\MedicalReport;
use App\Models\Session;
use App\Models\Assistant;
use App\Models\Section;

class DoctorController extends Controller
{
    
    //Doctor Delete Account Function
    public function doctorDeleteAccount(): RedirectResponse
    {  
        $doctor = Auth::guard('doctor')->user();

        if ($doctor) {

            $doctor->delete();
            Auth::guard('doctor')->logout();

            return redirect()->route('login')->with('success', 'Your account has been deleted successfully.');
        }
        return redirect()->route('login')->with('error', 'Unable to delete the account. Please try again.');
    }

    //View Scheduled Appointments for Doctor

    public function viewAppointments(){
        $doctorId = Auth::guard('doctor')->user()->DoctorID;
            
        $appointments = Appointment::where('DoctorID', $doctorId)->where('status', 'approved')->get();
        
        // Pass the appointments to the view
        return view('doctor.viewappointments', compact('appointments'));
    }

    //View Conducted Sessions for Doctor
    public function viewSessions(){
                   
    $doctorId = Auth::guard('doctor')->user()->DoctorID;
                        
    $sessions = Session::where('DoctorID', $doctorId)->get();
                        
    // Pass the sessions to the view
    return view('doctor.viewsessions', compact('sessions'));
    }


    //View Medical Reports Function
    public function viewReports(){
    $doctorId = Auth::guard('doctor')->user()->DoctorID;
    
    $reports = MedicalReport::where('DoctorID', $doctorId)->get();
    

    return view('doctor.viewreports', compact('reports'));
}


    //View Doctor's Patients Function
    public function viewPatients(){
        $doctorId = Auth::guard('doctor')->user()->DoctorID;
        
        $patientIds = Session::where('DoctorID', $doctorId)->pluck('PatientID');
        $patients = Patient::whereIn('PatientID', $patientIds)->distinct()->get();
        
    
        return view('doctor.viewpatients', compact('patients'));
    }

    //View Assistants for Doctor
    public function viewAssistants(){
    $doctorId = Auth::guard('doctor')->user()->DoctorID;
    
    
    $assistants = Assistant::where('DoctorID', $doctorId)
    ->with(['Section', 'Doctor']) ->get();// Eager load relationships

    return view('doctor.viewassistants', compact('assistants'));
    }



    //Conduct Session
            public function operate(Request $request)
            {
                // Validate the incoming request
                $validator = Validator::make($request->all(), [
                    'patient_id' => 'required|integer|exists:patients,PatientID',
                    'session_date' => 'required|date|after_or_equal:today',
                    'session_time' => 'required|date_format:H:i',
                   

                ]);
        
                if ($validator->fails()) {
                    return redirect()->route('doctor.showOperateForm')
                        ->withErrors($validator)
                        ->withInput();
                }
        
        
                // Get the authenticated Doctor
                $doctor = Auth::guard('doctor')->user();
                if (!$doctor) {
                    return redirect()->back()->with('error', 'Unauthorized action.');
                }
        
        // Create the session entry
        Session::create([
            'SessionDate' => $request->session_date,
            'SessionTime' => $request->session_time,
            'DoctorID' => $doctor->DoctorID,
            'PatientID' => $request->patient_id,


        ]);
        
                return redirect()->back()->with('success', 'Session has been created successfully.');
            }
        
            //Show Patients Form (Only Shows Patients that have booked appointments with the doctor)
            public function showOperateForm()
        {
            $doctorId = Auth::guard('doctor')->user()->DoctorID;  //get doctor id
            $appointments = Appointment::where('DoctorID', $doctorId)->where('status', 'approved')->get(); //get the SCHEDULED appointments with this doctor
            $patientIds = $appointments->pluck('PatientID')->unique(); // get the patient ids that exist in these appointment entries (unique)
            $patients = Patient::whereIn('PatientID', $patientIds)->get(); //get the patients using the previously-retrieved ids
        
          
            return view('doctor.operate', compact('patients'));
        }
        


        //Issue Medical Report For Doctor Function

        public function createReport(Request $request)
        {
            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'session_id' => 'required|integer|exists:sessions,SessionID',
                'report_date' => 'required|date|after_or_equal:today',
                'content' => 'required|string',
                'patient_id' => 'required|integer|exists:patients,PatientID',
               

            ]);
    
            if ($validator->fails()) {
                return redirect()->route('doctor.showCreateReportForm')
                    ->withErrors($validator)
                    ->withInput();
            }
    
    
            // Get the authenticated Doctor
            $doctor = Auth::guard('doctor')->user();
            if (!$doctor) {
                return redirect()->back()->with('error', 'Unauthorized action.');
            }
    
    // Create the Medical Report entry
    MedicalReport::create([
        'ReportDate' => $request->report_date,
        'Content' => $request->content,
        'DoctorID' => $doctor->DoctorID,
        'PatientID' => $request->patient_id,
        'SessionID' =>$request->session_id,

    ]);
    
            return redirect()->back()->with('success', 'Medical Report has been issued successfully.');
        }
    
        //Show sessions that this doctor conducted so he can attach(issue) a medical report for this session
        public function showCreateReportForm()
    {
        $doctorId = Auth::guard('doctor')->user()->DoctorID;  //get doctor id
        $sessions = Session::where('DoctorID', $doctorId)->get(); //get the sessions conducted by this doctor

        return view('doctor.createreport', compact('sessions'));
    }
    
}