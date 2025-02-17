<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalReport extends Model
{
    use HasFactory;

    protected $table = 'medical_reports';
    protected $primaryKey = 'ReportID';

    protected $fillable = [
        'ReportDate',
        'Content',
        'DoctorID',
        'PatientID',
        'SessionID',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'DoctorID');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'SessionID');
    }
}
