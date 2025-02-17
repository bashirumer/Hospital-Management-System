<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;


// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route with authentication middleware
Route::get('/receptionistdashboard', function () {
    return view('dashboard');
})->middleware(['auth:receptionist', 'verified'])->name('receptionist.dashboard');

Route::get('/doctordashboard', function () {
    return view('dashboard');
})->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');

Route::get('/patientdashboard', function () {
    return view('dashboard');
})->middleware(['auth:patient', 'verified'])->name('patient.dashboard');

Route::get('/assistantdashboard', function () {
    return view('dashboard');
})->middleware(['auth:assistant', 'verified'])->name('assistant.dashboard');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'view'])->name('dashboard');

// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['not_authed'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

// Route for logout
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
->middleware(['any_authed'])->name('logout');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
->middleware(['any_authed'])->name('logout');
//Delete Account Routes

Route::get('/receptionist/deleteaccount', [ReceptionistController::class, 'receptionistDeleteAccount'])->name('receptionist.deleteAccount');
Route::get('/doctor/deleteaccount', [DoctorController::class, 'doctorDeleteAccount'])->name('doctor.deleteAccount');
Route::get('/assistant/deleteaccount', [AssistantController::class, 'assistantDeleteAccount'])->name('assistant.deleteAccount');
Route::get('/patient/deleteaccount', [PatientController::class, 'patientDeleteAccount'])->name('patient.deleteAccount');



//PATIENT ROUTES------------------------------------------------------------------------------
//Patient Request Appointment Route

Route::middleware('auth:patient')->group(function () {
    Route::get('/patient/requestappointment', [PatientController::class, 'showRequestAppointmentForm'])->name('patient.requestAppointmentForm');
    Route::post('/patient/requestappointment', [PatientController::class, 'requestAppointment'])->name('patient.requestAppointment');
});

//Patient View Appointment Requests
Route::middleware('auth:patient')->group(function () {
    Route::get('/patient/viewappointmentrequests', [PatientController::class, 'viewAppointmentRequests'])->name('patients.viewAppointmentRequests');
});

//Patient View Scheduled Appointments
Route::middleware('auth:patient')->group(function () {
    Route::get('/patient/viewappointments', [PatientController::class, 'viewAppointments'])->name('patients.viewAppointments');
});

//Cancel Appointment for Patient
Route::middleware('auth:patient')->group(function () {
    Route::post('/patient/cancel/{appointmentId}', [PatientController::class, 'cancelAppointment'])->name('patients.cancel');
});

//Patient View Meidcal Reports
Route::middleware('auth:patient')->group(function () {
    Route::get('/patient/viewreports', [PatientController::class, 'viewReports'])->name('patients.viewReports');
});


// external routes/web.php for html for patient side 

Route::get('/mypage', function () {
    return view('patient.mypage');  // Points to resources/views/patient/mypage.blade.php
})->name('mypage');  // You can name the route as 'mypage'

Route::get('/doctors', function () {
    return view('patient.doctors');  // Points to resources/views/patient/mypage.blade.php
})->name('doctors');  // You can name the route as 'mypage'

Route::get('/services', function () {
    return view('patient.services');  // Points to resources/views/patient/mypage.blade.php
})->name('services');  // You can name the route as 'mypage'

Route::get('/contact', function () {
    return view('patient.contact');  // Points to resources/views/patient/mypage.blade.php
})->name('contact');  // You can name the route as 'mypage'




//RECEPTIONIST ROUTES-------------------------------------------------------------------------

// Respond to Appointment Request
Route::middleware('auth:receptionist')->group(function () {
    Route::post('/receptionist/respond/{appointmentId}', [ReceptionistController::class, 'respondToAppointmentRequest'])->name('receptionists.respond');
});

//View Appointment Requests for the Receptionist

Route::middleware('auth:receptionist')->group(function () {
    Route::get('/receptionist/appointmentrequests', [ReceptionistController::class, 'viewAppointmentRequests'])->name('receptionists.viewAppointments');
});
//View Scheduled Appointments for the Receptionist
Route::middleware('auth:receptionist')->group(function () {
    Route::get('/receptionist/appointments', [ReceptionistController::class, 'viewAppointments'])->name('receptionists.viewAllAppointments');
});



//ASSISTANT ROUTES---------------------------------------------------------------------------------

//View Doctor's Scheduled Appointments for the Assistant
Route::middleware('auth:assistant')->group(function () {
    Route::get('/assistant/appointments', [AssistantController::class, 'viewAppointments'])->name('assistant.viewAllAppointments');
});


//View Doctor's Sessions for the Assistant
Route::middleware('auth:assistant')->group(function () {
    Route::get('/assistant/sessions', [AssistantController::class, 'viewSessions'])->name('assistant.viewSessions');
});


//Change the Supervising Doctor

Route::middleware('auth:assistant')->group(function () {
    Route::get('/assistant/changedoctor', [AssistantController::class, 'showChangeDoctorForm'])->name('assistant.changeDoctorForm');
    Route::post('/assistant/changedoctor', [AssistantController::class, 'changeDoctor'])->name('assistant.changeDoctor');
});



//DOCTOR ROUTES----------------------------------------------------------------------------------
//View Scheduled Appointments for the Doctor
Route::middleware('auth:doctor')->group(function () {
    Route::get('/doctor/appointments', [DoctorController::class, 'viewAppointments'])->name('doctor.viewAllAppointments');
});

//View Doctor's Sessions for the Doctor
Route::middleware('auth:doctor')->group(function () {
    Route::get('/doctor/sessions', [DoctorController::class, 'viewSessions'])->name('doctor.viewSessions');
});

//Doctor View Meidcal Reports
Route::middleware('auth:doctor')->group(function () {
    Route::get('/doctor/viewreports', [DoctorController::class, 'viewReports'])->name('doctor.viewReports');
});


//Doctor View Patients
Route::middleware('auth:doctor')->group(function () {
    Route::get('/doctor/viewpatients', [DoctorController::class, 'viewPatients'])->name('doctor.viewPatients');
});

//Doctor View Assistants
Route::middleware('auth:doctor')->group(function () {
    Route::get('/doctor/viewassistants', [DoctorController::class, 'viewAssistants'])->name('doctor.viewAssistants');
});

//Doctor Conduct Session
Route::middleware('auth:doctor')->group(function () {
    Route::get('/doctor/operate', [DoctorController::class, 'showOperateForm'])->name('doctor.showOperateForm');
    Route::post('/doctor/operate', [DoctorController::class, 'operate'])->name('doctor.operate');
});


//Doctor Issue Medical Report
Route::middleware('auth:doctor')->group(function () {
    Route::get('/doctor/createreport', [DoctorController::class, 'showCreateReportForm'])->name('doctor.showCreateReportForm');
    Route::post('/doctor/createreport', [DoctorController::class, 'createReport'])->name('doctor.createReport');
});