<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    public function run()
    {
        Doctor::create([
            'DoctorID' => 1,
            'Name' => 'Dr. John Smith',
            'Specialization' => 'Cardiology',
            'Phone' => '1234567890',
            'Email' => 'john.smith@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 1,
        ]);

        Doctor::create([
            'DoctorID' => 2,
            'Name' => 'Dr. Emily Johnson',
            'Specialization' => 'Neurology',
            'Phone' => '0987654321',
            'Email' => 'emily.johnson@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 2,
        ]);

        Doctor::create([
            'DoctorID' => 3,
            'Name' => 'Dr. Sarah Brown',
            'Specialization' => 'Pediatrics',
            'Phone' => '1122334455',
            'Email' => 'sarah.brown@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 3,
        ]);

        Doctor::create([
            'DoctorID' => 4,
            'Name' => 'Dr. Michael Wilson',
            'Specialization' => 'Orthopedics',
            'Phone' => '2233445566',
            'Email' => 'michael.wilson@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 1,
        ]);

        Doctor::create([
            'DoctorID' => 5,
            'Name' => 'Dr. Lisa Taylor',
            'Specialization' => 'Gynecology',
            'Phone' => '3344556677',
            'Email' => 'lisa.taylor@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 2,
        ]);

        Doctor::create([
            'DoctorID' => 6,
            'Name' => 'Dr. James Lee',
            'Specialization' => 'Dermatology',
            'Phone' => '4455667788',
            'Email' => 'james.lee@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 3,
        ]);

        Doctor::create([
            'DoctorID' => 7,
            'Name' => 'Dr. Jessica Parker',
            'Specialization' => 'Ophthalmology',
            'Phone' => '5566778899',
            'Email' => 'jessica.parker@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 1,
        ]);

        Doctor::create([
            'DoctorID' => 8,
            'Name' => 'Dr. Daniel Kim',
            'Specialization' => 'Psychiatry',
            'Phone' => '6677889900',
            'Email' => 'daniel.kim@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 2,
        ]);

        Doctor::create([
            'DoctorID' => 9,
            'Name' => 'Dr. Sophia Martinez',
            'Specialization' => 'Endocrinology',
            'Phone' => '7788990011',
            'Email' => 'sophia.martinez@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 3,
        ]);

        Doctor::create([
            'DoctorID' => 10,
            'Name' => 'Dr. Robert Brown',
            'Specialization' => 'Gastroenterology',
            'Phone' => '8899001122',
            'Email' => 'robert.brown@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 1,
        ]);
    }
}
