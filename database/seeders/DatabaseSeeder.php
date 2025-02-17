<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SectionsTableSeeder::class,
            DoctorsTableSeeder::class,
            AssistantsTableSeeder::class,
            ReceptionistsTableSeeder::class,
            PatientsTableSeeder::class,
            AppointmentsTableSeeder::class,
            SessionsTableSeeder::class,
            MedicalReportsTableSeeder::class,
            PaymentsTableSeeder::class,
        ]);
    }
}


