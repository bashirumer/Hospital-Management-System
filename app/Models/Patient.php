<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Extend from Authenticatable
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Patient extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'patients';
    protected $primaryKey = 'PatientID';

    protected $fillable = [
        'Name',
        'DateOfBirth',
        'Address',
        'Phone',
        'email',
        'password',
    ];

    // Hide password field for security
    protected $hidden = [
        'password',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'PatientID');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'PatientID');
    }

    public function medicalReports()
    {
        return $this->hasMany(MedicalReport::class, 'PatientID');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'PatientID');
    }
}
