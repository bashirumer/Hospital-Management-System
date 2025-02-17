<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assistant;

class AssistantsTableSeeder extends Seeder
{
    public function run()
    {
        Assistant::create([
            'AssistantID' => 1,
            'Name' => 'Alice Cooper',
            'Phone' => '2223334444',
            'Email' => 'alice.cooper@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 1,
            'DoctorID' => 1,
        ]);

        Assistant::create([
            'AssistantID' => 2,
            'Name' => 'Bob Marley',
            'Phone' => '5556667777',
            'Email' => 'bob.marley@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 2,
            'DoctorID' => 2,
        ]);

        Assistant::create([
            'AssistantID' => 3,
            'Name' => 'Charlie Brown',
            'Phone' => '8889990000',
            'Email' => 'charlie.brown@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 1,
            'DoctorID' => 3,
        ]);

        Assistant::create([
            'AssistantID' => 4,
            'Name' => 'Diana Prince',
            'Phone' => '1112223333',
            'Email' => 'diana.prince@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 3,
            'DoctorID' => 1,
        ]);

        Assistant::create([
            'AssistantID' => 5,
            'Name' => 'Ethan Hunt',
            'Phone' => '4445556666',
            'Email' => 'ethan.hunt@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 2,
            'DoctorID' => 2,
        ]);

        Assistant::create([
            'AssistantID' => 6,
            'Name' => 'Fiona Apple',
            'Phone' => '7778889999',
            'Email' => 'fiona.apple@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 1,
            'DoctorID' => 3,
        ]);

        Assistant::create([
            'AssistantID' => 7,
            'Name' => 'George Clooney',
            'Phone' => '1234567890',
            'Email' => 'george.clooney@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 3,
            'DoctorID' => 2,
        ]);

        Assistant::create([
            'AssistantID' => 8,
            'Name' => 'Hannah Montana',
            'Phone' => '0987654321',
            'Email' => 'hannah.montana@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 2,
            'DoctorID' => 1,
        ]);

        Assistant::create([
            'AssistantID' => 9,
            'Name' => 'Ian Malcolm',
            'Phone' => '6543219870',
            'Email' => 'ian.malcolm@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 1,
            'DoctorID' => 3,
        ]);

        Assistant::create([
            'AssistantID' => 10,
            'Name' => 'Julia Roberts',
            'Phone' => '3216549870',
            'Email' => 'julia.roberts@example.com',
            'Password' => bcrypt('password'),
            'SectionID' => 3,
            'DoctorID' => 2,
        ]);
    }
}
