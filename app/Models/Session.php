<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';
    protected $primaryKey = 'SessionID';

    protected $fillable = [
        'SessionDate',
        'SessionTime',
        'DoctorID',
        'PatientID',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }
}
