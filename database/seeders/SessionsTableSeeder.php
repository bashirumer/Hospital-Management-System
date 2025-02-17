<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionsTableSeeder extends Seeder
{
    public function run()
    {
        Session::create([
            'SessionID' => 1,
            'SessionDate' => '2024-11-15',
            'SessionTime' => '09:00:00',
            'DoctorID' => 1,
            'PatientID' => 1,
        ]);

        Session::create([
            'SessionID' => 2,
            'SessionDate' => '2024-11-16',
            'SessionTime' => '10:00:00',
            'DoctorID' => 2,
            'PatientID' => 2,
        ]);

        Session::create([
            'SessionID' => 3,
            'SessionDate' => '2024-11-17',
            'SessionTime' => '11:00:00',
            'DoctorID' => 1,
            'PatientID' => 3,
        ]);

        Session::create([
            'SessionID' => 4,
            'SessionDate' => '2024-11-18',
            'SessionTime' => '12:00:00',
            'DoctorID' => 3,
            'PatientID' => 4,
        ]);

        Session::create([
            'SessionID' => 5,
            'SessionDate' => '2024-11-19',
            'SessionTime' => '13:00:00',
            'DoctorID' => 2,
            'PatientID' => 5,
        ]);

        Session::create([
            'SessionID' => 6,
            'SessionDate' => '2024-11-20',
            'SessionTime' => '14:00:00',
            'DoctorID' => 1,
            'PatientID' => 6,
        ]);

        Session::create([
            'SessionID' => 7,
            'SessionDate' => '2024-11-21',
            'SessionTime' => '15:00:00',
            'DoctorID' => 3,
            'PatientID' => 7,
        ]);

        Session::create([
            'SessionID' => 8,
            'SessionDate' => '2024-11-22',
            'SessionTime' => '16:00:00',
            'DoctorID' => 2,
            'PatientID' => 8,
        ]);

        Session::create([
            'SessionID' => 9,
            'SessionDate' => '2024-11-23',
            'SessionTime' => '09:30:00',
            'DoctorID' => 1,
            'PatientID' => 9,
        ]);

        Session::create([
            'SessionID' => 10,
            'SessionDate' => '2024-11-24',
            'SessionTime' => '10:30:00',
            'DoctorID' => 3,
            'PatientID' => 10,
        ]);
    }
}
