<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'PaymentID';

    protected $fillable = [
        'PaymentDate',
        'Amount',
        'PaymentMethod',
        'PatientID',
        'ReceptionistID',
        'AppointmentID',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }

    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class, 'ReceptionistID');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'AppointmentID');
    }
}
