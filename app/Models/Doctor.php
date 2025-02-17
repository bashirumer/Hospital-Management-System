<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Extend from Authenticatable
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Doctor extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'doctors';
    protected $primaryKey = 'DoctorID';

    protected $fillable = [
        'Name',
        'Specialization',
        'Phone',
        'email',
        'password',
        'SectionID',
    ];

    // Specify any hidden fields to protect sensitive data
    protected $hidden = [
        'password',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'SectionID');
    }

    public function assistants()
    {
        return $this->hasMany(Assistant::class, 'DoctorID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'DoctorID');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'DoctorID');
    }

    public function medicalReports()
    {
        return $this->hasMany(MedicalReport::class, 'DoctorID');
    }
}
