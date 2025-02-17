<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Assistant extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'assistants';
    protected $primaryKey = 'AssistantID';

    protected $fillable = [
        'Name',
        'Phone',
        'email',
        'password',
        'SectionID',
        'DoctorID',
    ];

    // Hide password field for security
    protected $hidden = [
        'password',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'SectionID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }
}
