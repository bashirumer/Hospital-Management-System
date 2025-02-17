<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalReport;

class MedicalReportsTableSeeder extends Seeder
{
    public function run()
    {
        MedicalReport::create([
            'ReportID' => 1,
            'ReportDate' => '2024-11-15',
            'Content' => 'Routine checkup, all clear.',
            'DoctorID' => 1,
            'PatientID' => 1,
            'SessionID' => 1,
        ]);

        MedicalReport::create([
            'ReportID' => 2,
            'ReportDate' => '2024-11-16',
            'Content' => 'Consultation for headache, prescribed medication.',
            'DoctorID' => 2,
            'PatientID' => 2,
            'SessionID' => 2,
        ]);

        MedicalReport::create([
            'ReportID' => 3,
            'ReportDate' => '2024-11-17',
            'Content' => 'Follow-up on blood pressure, recommended lifestyle changes.',
            'DoctorID' => 1,
            'PatientID' => 3,
            'SessionID' => 3,
        ]);

        MedicalReport::create([
            'ReportID' => 4,
            'ReportDate' => '2024-11-18',
            'Content' => 'Consultation for stomach pain, further tests required.',
            'DoctorID' => 2,
            'PatientID' => 4,
            'SessionID' => 4,
        ]);

        MedicalReport::create([
            'ReportID' => 5,
            'ReportDate' => '2024-11-19',
            'Content' => 'Routine checkup, vaccinations updated.',
            'DoctorID' => 3,
            'PatientID' => 5,
            'SessionID' => 5,
        ]);

        MedicalReport::create([
            'ReportID' => 6,
            'ReportDate' => '2024-11-20',
            'Content' => 'Consultation for fatigue, blood tests ordered.',
            'DoctorID' => 1,
            'PatientID' => 6,
            'SessionID' => 6,
        ]);

        MedicalReport::create([
            'ReportID' => 7,
            'ReportDate' => '2024-11-21',
            'Content' => 'Annual checkup, overall health good.',
            'DoctorID' => 3,
            'PatientID' => 7,
            'SessionID' => 7,
        ]);

        MedicalReport::create([
            'ReportID' => 8,
            'ReportDate' => '2024-11-22',
            'Content' => 'Consultation for allergies, prescribed antihistamines.',
            'DoctorID' => 2,
            'PatientID' => 8,
            'SessionID' => 8,
        ]);

        MedicalReport::create([
            'ReportID' => 9,
            'ReportDate' => '2024-11-23',
            'Content' => 'Post-surgery follow-up, healing well.',
            'DoctorID' => 1,
            'PatientID' => 9,
            'SessionID' => 9,
        ]);

        MedicalReport::create([
            'ReportID' => 10,
            'ReportDate' => '2024-11-24',
            'Content' => 'Consultation for skin rash, topical treatment advised.',
            'DoctorID' => 3,
            'PatientID' => 10,
            'SessionID' => 10,
        ]);
    }
}
