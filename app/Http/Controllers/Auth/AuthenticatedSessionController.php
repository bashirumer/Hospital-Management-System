<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginUser $request): RedirectResponse
    {

        if(Auth::guard('doctor')->check() || Auth::guard('patient')->check() || Auth::guard('assistant')->check() || Auth::guard('receptionist')->check()){
            return redirect()->route('dashboard');
        }

        // Get the credentials and role
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $role = $request->role;

        // Ensure the role is valid and exists in the guards
        if (!in_array($role, ['doctor', 'assistant', 'receptionist', 'patient'])) {
            return back()->withErrors([
                'role' => 'Invalid role selected.',
            ])->onlyInput('email');
        }

        // Attempt to authenticate using the appropriate guard
        if (Auth::guard($role)->attempt($credentials)) {
            $request->session()->regenerate();

        if ($role=='doctor'){
            return redirect()->intended('doctordashboard');
        }
        else if($role =='patient'){
            return redirect()->intended('patientdashboard');
        }
        else if($role =='receptionist'){
            return redirect()->intended('receptionistdashboard');
        }
        else{
            return redirect()->intended('assistantdashboard');
        }

        }

        // If authentication fails, return with error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('doctor')->logout();
        Auth::guard('assistant')->logout();
        Auth::guard('patient')->logout();
        Auth::guard('receptionist')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
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
                return \App\Models\Doctor::class;
            case 'assistant':
                return \App\Models\Assistant::class;
            case 'receptionist':
                return \App\Models\Receptionist::class;
            case 'patient':
                return \App\Models\Patient::class;
            default:
                throw new \InvalidArgumentException("Invalid role: $role");
        }
    }
}
