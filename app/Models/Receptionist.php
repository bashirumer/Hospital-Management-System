<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Receptionist extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'receptionists';
    protected $primaryKey = 'ReceptionistID';

    protected $fillable = [
        'Name',
        'Phone',
        'email',
        'password',
    ];

    // Hide password field for security
    protected $hidden = [
        'password',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'ReceptionistID'); // Updated foreign key for payments
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'ReceptionistID'); // Updated foreign key for appointments
    }
}
