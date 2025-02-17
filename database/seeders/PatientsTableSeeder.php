<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientsTableSeeder extends Seeder
{
    public function run()
    {
        Patient::create([
            'PatientID' => 1,
            'Name' => 'David Beckham',
            'DateOfBirth' => '1980-05-02',
            'Address' => '123 Soccer St, London, UK',
            'Phone' => '4445556666',
            'Email' => 'david.beckham@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 2,
            'Name' => 'Jessica Alba',
            'DateOfBirth' => '1981-04-28',
            'Address' => '456 Hollywood Blvd, LA, CA',
            'Phone' => '7778889999',
            'Email' => 'jessica.alba@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 3,
            'Name' => 'Chris Evans',
            'DateOfBirth' => '1981-06-13',
            'Address' => '789 Marvel Ave, Boston, MA',
            'Phone' => '1112223333',
            'Email' => 'chris.evans@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 4,
            'Name' => 'Natalie Portman',
            'DateOfBirth' => '1981-06-09',
            'Address' => '321 Galaxy St, Jerusalem, Israel',
            'Phone' => '4443332222',
            'Email' => 'natalie.portman@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 5,
            'Name' => 'Ryan Reynolds',
            'DateOfBirth' => '1976-10-23',
            'Address' => '654 Deadpool Rd, Vancouver, Canada',
            'Phone' => '5554443333',
            'Email' => 'ryan.reynolds@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 6,
            'Name' => 'Emma Watson',
            'DateOfBirth' => '1990-04-15',
            'Address' => '123 Wizard Way, Paris, France',
            'Phone' => '6665554444',
            'Email' => 'emma.watson@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 7,
            'Name' => 'Leonardo DiCaprio',
            'DateOfBirth' => '1974-11-11',
            'Address' => '987 Ocean Dr, LA, CA',
            'Phone' => '7776665555',
            'Email' => 'leonardo.dicaprio@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 8,
            'Name' => 'Scarlett Johansson',
            'DateOfBirth' => '1984-11-22',
            'Address' => '123 Avengers St, NYC, NY',
            'Phone' => '8887776666',
            'Email' => 'scarlett.johansson@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 9,
            'Name' => 'Will Smith',
            'DateOfBirth' => '1968-09-25',
            'Address' => '456 Hollywood Blvd, LA, CA',
            'Phone' => '9998887777',
            'Email' => 'will.smith@example.com',
            'Password' => bcrypt('password'),
        ]);

        Patient::create([
            'PatientID' => 10,
            'Name' => 'Taylor Swift',
            'DateOfBirth' => '1989-12-13',
            'Address' => '321 Music Ln, Nashville, TN',
            'Phone' => '0001112222',
            'Email' => 'taylor.swift@example.com',
            'Password' => bcrypt('password'),
        ]);
    }
}
