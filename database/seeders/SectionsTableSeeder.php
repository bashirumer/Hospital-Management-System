<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        Section::create([
            'SectionID' => 1,
            'Name' => 'Cardiology',
            'Location' => 'Building A',
        ]);

        Section::create([
            'SectionID' => 2,
            'Name' => 'Neurology',
            'Location' => 'Building B',
        ]);

        Section::create([
            'SectionID' => 3,
            'Name' => 'Pediatrics',
            'Location' => 'Building C',
        ]);

        Section::create([
            'SectionID' => 4,
            'Name' => 'Orthopedics',
            'Location' => 'Building D',
        ]);

        Section::create([
            'SectionID' => 5,
            'Name' => 'Dermatology',
            'Location' => 'Building E',
        ]);

        Section::create([
            'SectionID' => 6,
            'Name' => 'Oncology',
            'Location' => 'Building F',
        ]);

        Section::create([
            'SectionID' => 7,
            'Name' => 'Radiology',
            'Location' => 'Building G',
        ]);

        Section::create([
            'SectionID' => 8,
            'Name' => 'Endocrinology',
            'Location' => 'Building H',
        ]);

        Section::create([
            'SectionID' => 9,
            'Name' => 'Gastroenterology',
            'Location' => 'Building I',
        ]);

        Section::create([
            'SectionID' => 10,
            'Name' => 'Urology',
            'Location' => 'Building J',
        ]);
    }
}
