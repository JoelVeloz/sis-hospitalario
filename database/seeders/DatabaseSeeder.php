<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Record;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Joel',
            'email' => 'joel.edu.v@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        Patient::factory(10)->create();
        Appointment::factory(20)->create();
        Record::factory(30)->create();


        // \App\Models\User::factory(10)->create();


    }
}
