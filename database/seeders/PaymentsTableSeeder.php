<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'PaymentID' => 1,
            'PaymentDate' => '2024-11-15',
            'Amount' => 150.00,
            'PaymentMethod' => 'Credit Card',
            'PatientID' => 1,
            'ReceptionistID' => 1,
            'AppointmentID' => 1,
        ]);

        Payment::create([
            'PaymentID' => 2,
            'PaymentDate' => '2024-11-16',
            'Amount' => 200.00,
            'PaymentMethod' => 'Cash',
            'PatientID' => 2,
            'ReceptionistID' => 2,
            'AppointmentID' => 2,
        ]);

        Payment::create([
            'PaymentID' => 3,
            'PaymentDate' => '2024-11-17',
            'Amount' => 120.00,
            'PaymentMethod' => 'Debit Card',
            'PatientID' => 3,
            'ReceptionistID' => 1,
            'AppointmentID' => 3,
        ]);

        Payment::create([
            'PaymentID' => 4,
            'PaymentDate' => '2024-11-18',
            'Amount' => 250.00,
            'PaymentMethod' => 'Cash',
            'PatientID' => 4,
            'ReceptionistID' => 2,
            'AppointmentID' => 4,
        ]);

        Payment::create([
            'PaymentID' => 5,
            'PaymentDate' => '2024-11-19',
            'Amount' => 300.00,
            'PaymentMethod' => 'Credit Card',
            'PatientID' => 5,
            'ReceptionistID' => 1,
            'AppointmentID' => 5,
        ]);

        Payment::create([
            'PaymentID' => 6,
            'PaymentDate' => '2024-11-20',
            'Amount' => 180.00,
            'PaymentMethod' => 'Cash',
            'PatientID' => 6,
            'ReceptionistID' => 2,
            'AppointmentID' => 6,
        ]);

        Payment::create([
            'PaymentID' => 7,
            'PaymentDate' => '2024-11-21',
            'Amount' => 220.00,
            'PaymentMethod' => 'Debit Card',
            'PatientID' => 7,
            'ReceptionistID' => 1,
            'AppointmentID' => 7,
        ]);

        Payment::create([
            'PaymentID' => 8,
            'PaymentDate' => '2024-11-22',
            'Amount' => 160.00,
            'PaymentMethod' => 'Credit Card',
            'PatientID' => 8,
            'ReceptionistID' => 2,
            'AppointmentID' => 8,
        ]);

        Payment::create([
            'PaymentID' => 9,
            'PaymentDate' => '2024-11-23',
            'Amount' => 140.00,
            'PaymentMethod' => 'Cash',
            'PatientID' => 9,
            'ReceptionistID' => 1,
            'AppointmentID' => 9,
        ]);

        Payment::create([
            'PaymentID' => 10,
            'PaymentDate' => '2024-11-24',
            'Amount' => 350.00,
            'PaymentMethod' => 'Credit Card',
            'PatientID' => 10,
            'ReceptionistID' => 2,
            'AppointmentID' => 10,
        ]);
    }
}
