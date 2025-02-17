<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser; // Import the RegisterUser request
use App\Models\Doctor;
use App\Models\Assistant;
use App\Models\Receptionist;
use App\Models\Patient;
use App\Models\Section;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $sections = Section::distinct()->get(['SectionID', 'Name']);
        $doctors = Doctor::distinct()->get(['DoctorID', 'Name']);
        return view('auth.register', compact('sections', 'doctors'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUser $request)
    {
        // Determine which model to use based on the role
        $userModel = $this->getModelClass($request->role);

        // Additional fields based on role
        switch ($request->role) {
            case 'doctor':
                $user = $userModel::create([
                    'Name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'Specialization' => $request->specialization,
                    'Phone' => $request->doctor_phone,
                    'SectionID' => $request->doctor_section_name
                ]);
                break;

            case 'patient':
                $user = $userModel::create([
                    'Name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'DateOfBirth' => $request->date_of_birth,
                    'Address' => $request->address,
                    'Phone' => $request->patient_phone
                ]);
                break;

            case 'assistant':
                $user = $userModel::create([
                    'Name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'Phone' => $request->assistant_phone,
                    'SectionID' => $request->assistant_section_name,
                    'DoctorID' => $request->doctor_name,
                ]);
                break;

            case 'receptionist':
                $user = $userModel::create([
                    'Name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'Phone' => $request->receptionist_phone,
                ]);
                break;
        }

        // Save additional fields to the database
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        if ($request->role =='doctor'){
            return redirect()->intended('/doctordashboard');
        }
        else if($request->role =='patient'){
            return redirect()->intended('/patientdashboard');
        }
        else if($request->role =='receptionist'){
            return redirect()->intended('/receptionistdashboard');
        }
        else{
            return redirect()->intended('/assistantdashboard');
        }

    }

    /**
     * Get the model class based on the role.
     *
     * @param string $role
     * @return string
     */
    private function getModelClass(string $role): string
    {
        switch ($role) {
            case 'doctor':
                return Doctor::class;
            case 'assistant':
                return Assistant::class;
            case 'receptionist':
                return Receptionist::class;
            case 'patient':
                return Patient::class;
            default:
                throw new \InvalidArgumentException("Invalid role: $role");
        }
    }
}
