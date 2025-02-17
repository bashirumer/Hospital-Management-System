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


class AssistantController extends Controller
{
        //Assistant Delete Account Function
        public function assistantDeleteAccount(): RedirectResponse
        {  
            $assistant = Auth::guard('assistant')->user();
    
            if ($assistant) {
    
                $assistant->delete();
                Auth::guard('assistant')->logout();
    
                return redirect()->route('login')->with('success', 'Your account has been deleted successfully.');
            }
            return redirect()->route('login')->with('error', 'Unable to delete the account. Please try again.');
        }


        //View doctor's scheduled appointments function

        public function viewAppointments(){
          
            $doctorId = Auth::guard('assistant')->user()->DoctorID;
            
            $appointments = Appointment::where('DoctorID', $doctorId)->where('status', 'approved')->get();
            
            // Pass the appointments to the view
            return view('assistant.viewappointments', compact('appointments'));
        }


                //View doctor's sessions function

                public function viewSessions(){
                   
                    $doctorId = Auth::guard('assistant')->user()->DoctorID;
                    
                    $sessions = Session::where('DoctorID', $doctorId)->get();
                    
                    // Pass the sessions to the view
                    return view('assistant.viewsessions', compact('sessions'));
                }


        //Change Supervising Doctor Functions
        public function changeDoctor(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|integer|exists:doctors,DoctorID',
        ]);

        if ($validator->fails()) {
            return redirect()->route('assistant.changeDoctorForm')
                ->withErrors($validator)
                ->withInput();
        }


        // Get the authenticated Assistant
        $assistant = Auth::guard('assistant')->user();
        if (!$assistant) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Update the DoctorID field in Assistant entry
        $assistant->DoctorID = $request->doctor_id;
        $assistant->save();


        return redirect()->back()->with('success', 'Supervising Doctor has been changed successfully.');
    }

    //Show Doctor Change Form
    public function showChangeDoctorForm()
{

    $doctors = Doctor::all();

  
    return view('assistant.changeDoctor', compact('doctors'));
}

}
