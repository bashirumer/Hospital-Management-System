<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentsTableSeeder extends Seeder
{
    public function run()
    {
        Appointment::create([
            'AppointmentID' => 1,
            'Date' => '2024-11-15',
            'Time' => '09:00:00',
            'PatientID' => 1,
            'DoctorID' => 1,
            'ReceptionistID' => 1,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 2,
            'Date' => '2024-11-16',
            'Time' => '10:00:00',
            'PatientID' => 2,
            'DoctorID' => 2,
            'ReceptionistID' => 2,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 3,
            'Date' => '2024-11-17',
            'Time' => '11:00:00',
            'PatientID' => 3,
            'DoctorID' => 1,
            'ReceptionistID' => 1,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 4,
            'Date' => '2024-11-18',
            'Time' => '12:00:00',
            'PatientID' => 4,
            'DoctorID' => 3,
            'ReceptionistID' => 1,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 5,
            'Date' => '2024-11-19',
            'Time' => '13:00:00',
            'PatientID' => 5,
            'DoctorID' => 2,
            'ReceptionistID' => 2,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 6,
            'Date' => '2024-11-20',
            'Time' => '14:00:00',
            'PatientID' => 6,
            'DoctorID' => 1,
            'ReceptionistID' => 3,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 7,
            'Date' => '2024-11-21',
            'Time' => '15:00:00',
            'PatientID' => 7,
            'DoctorID' => 4,
            'ReceptionistID' => 1,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 8,
            'Date' => '2024-11-22',
            'Time' => '16:00:00',
            'PatientID' => 8,
            'DoctorID' => 2,
            'ReceptionistID' => 2,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 9,
            'Date' => '2024-11-23',
            'Time' => '17:00:00',
            'PatientID' => 9,
            'DoctorID' => 3,
            'ReceptionistID' => 3,
            'Status' => 'pending',
        ]);

        Appointment::create([
            'AppointmentID' => 10,
            'Date' => '2024-11-24',
            'Time' => '18:00:00',
            'PatientID' => 10,
            'DoctorID' => 1,
            'ReceptionistID' => 1,
            'Status' => 'pending',
        ]);
    }
}
