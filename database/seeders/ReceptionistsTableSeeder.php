<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Receptionist;

class ReceptionistsTableSeeder extends Seeder
{
    public function run()
    {
        Receptionist::create([
            'ReceptionistID' => 1,
            'Name' => 'Rachel Green',
            'Phone' => '1234567890',
            'Email' => 'rachel.green@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 2,
            'Name' => 'Monica Geller',
            'Phone' => '9876543210',
            'Email' => 'monica.geller@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 3,
            'Name' => 'Phoebe Buffay',
            'Phone' => '2223334444',
            'Email' => 'phoebe.buffay@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 4,
            'Name' => 'Joey Tribbiani',
            'Phone' => '5556667777',
            'Email' => 'joey.tribbiani@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 5,
            'Name' => 'Chandler Bing',
            'Phone' => '8889990000',
            'Email' => 'chandler.bing@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 6,
            'Name' => 'Ross Geller',
            'Phone' => '4445556666',
            'Email' => 'ross.geller@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 7,
            'Name' => 'Janice Hosenstein',
            'Phone' => '7778889999',
            'Email' => 'janice.hosenstein@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 8,
            'Name' => 'Carol Willick',
            'Phone' => '3334445555',
            'Email' => 'carol.willick@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 9,
            'Name' => 'Emily Waltham',
            'Phone' => '1112223333',
            'Email' => 'emily.waltham@example.com',
            'Password' => bcrypt('password'),
        ]);

        Receptionist::create([
            'ReceptionistID' => 10,
            'Name' => 'Susan Bunch',
            'Phone' => '6667778888',
            'Email' => 'susan.bunch@example.com',
            'Password' => bcrypt('password'),
        ]);
    }
}
